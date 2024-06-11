<?php

require_once 'utils/init.php';

define('TAMAÑO_TOKEN', 64);
define('DURACION_TOKEN', 60 * 60 * 24 * 7);


/**
 * funcion para generar un token
 * 
 * @param int $tamaño
 * @return string
 */
function generateToken($tamaño): string{
    return bin2hex(openssl_random_pseudo_bytes($tamaño));
}

/**
 * funcion para guardar un token en la base de datos
 * 
 * @param string $token
 * @param int $user_id
 * @param int $expiration
 * @return void
 */
function saveToken($token, $user_id, $expiration, $table_name){
    global $db;
    $query = "INSERT INTO $table_name (token, user_id, expiration) VALUES (:token, :user_id, :expiration)";
    $db->ejecuta($query, $token, $user_id, $expiration);
}

/**
 * funcion para buscar un token en la base de datos por el token de la sesion
 * 
 * @return array
 */
function getSesionToken($token_cookie_name, $table_name): array{
    global $db;
    $token = $_COOKIE[$token_cookie_name];
    $select = "SELECT * FROM $table_name WHERE token = :token";
    $db->ejecuta($select, $token);
    $token = $db->obtenDatos();

    return $token;
}

/**
 * funcion para comprobar si la sesion está activa o debe ser creada en funcion de valor de la coockie
 * 
 * @return void
 */
function setSesion($sesion_name, $cookie_name, $table_name): void{
    global $db;
    if(!isset($_SESSION[$sesion_name])){
        if(isset($_COOKIE[$cookie_name])){
            $token = getSesionToken($cookie_name, $table_name);

            $time = date('Y-m-d H:i:s', time());
            if($token['expiration'] > $time && !$token['consumed']){
                $select = "SELECT * FROM users WHERE id = :id";
                $db->ejecuta($select, $token['user_id']);
                $user = $db->obtenDatos();

                $_SESSION[$sesion_name] = $user;
            }
        } else {
            header('Location: login.php');
            die();
        }
    }
}

/**
 * funcion para consumir un token
 * 
 * @param string $token
 * @return void
 */
function consumeToken($table_name, $token_string): void{
    global $db;
    $query = "UPDATE $table_name SET consumed = 1 WHERE token = :token";
    $db->ejecuta($query, $token_string);
}

/**
 * funcion para destruir una cookie
 * 
 * @param string $name
 * @return void
 */
function cookie_destroy($name){
    setcookie($name, '', time() - 3600, '/');
    unset($_COOKIE[$name]);
}

/**
 * funcion para cerrar sesion
 * 
 * @return void
 */
function logout($cookie_name, $table_name){
    global $db;
    
    if(isset($_COOKIE[$cookie_name])){
        $token = getSesionToken($cookie_name, $table_name);
        consumeToken($token['token']);
        cookie_destroy($cookie_name);
    }
    session_destroy();
    header('Location: login.php');
    die();
}