<?php 

require_once 'init.php';

define('TAMAÑO_TOKEN', 64);
define('DURACION_TOKEN', 60 * 60 * 24 * 7);


/**
 * comprobar si un campo de texto esta vacio
 * 
 * @param mixed $data
 * @return bool
 */
function isValid($data){
    return (isset($data)  && $data != "") ? true : false;
}

/**
 * Funcion para mostrar todos los errores que se generen en un formulario
 * @
 * @return void
 */
function showAllErrors($array_errors): void{
    if(!empty($array_errors)){
        foreach ($array_errors as $error) {
            echo "<span class='error'>" . $error . "</span>";
        }
    }
}

/**
 * Funcion para mostrar errores en los campos de texto de un formulario
 * 
 * @param string $error_name
 * @return void
 */
function showInputError($error_name): void{
    global $array_errors;
    if(isset($array_errors[$error_name])){
        echo "<span class='error'>" . $array_errors[$error_name] . "</span>";
    }
}

/**
 * Funcion para persistencia de datos en los campos de texto de un formulario
 * 
 * @param string $data_name
 * @return void
 */
function showInput ($data_name): void{
    if(isValid($_POST[$data_name])){
        echo $_POST[$data_name];
    }
}

/**
 * Funcion para persistencia de datos en los campos select de un formulario
 * 
 * @param string $data_name
 * @param string $value
 * @return void
 */
function showSelected($data_name, $value): void{
    if(isValid($_POST[$data_name]) && $_POST[$data_name] == $value){
        echo "selected";
    }
}

/**
 * Funcion para persistencia de datos en los campos checkbox de un formulario
 * 
 * @param string $data_name
 * @return void
 */
function showcheckbox($data_name): void{
    if(isValid($_POST[$data_name])){
        echo "checked";
    }
}


/**
 * Funcion para mostrar las paginas de la tabla
 *   
 * @param int $page
 * @param int $num_paginas
 * @return void
 */ 
function showPages($page, $num_paginas){
    echo "<a href='?pagina=" . ($page == 1 ? $num_paginas : $page - 1) . "'><</a>";

    for ($i = 1; $i <= $num_paginas; $i++) {
        echo "<a href='?pagina=" . $i . "'>" . $i . "</a>";
    }

    echo "<a href='?pagina=" . ($page == $num_paginas ? 1 : $page + 1) . "'>></a>";
}

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
function saveToken($token, $user_id, $expiration){
    global $db;
    $query = "INSERT INTO tokens (token, user_id, expiration) VALUES (:token, :user_id, :expiration)";
    $db->ejecuta($query, $token, $user_id, $expiration);
}

/**
 * funcion para buscar un token en la base de datos por el token de la sesion
 * 
 * @return array
 */
function getSesionToken(): array{
    global $db;
    $token = $_COOKIE['remember_me'];
    $select = "SELECT * FROM tokens WHERE token = :token";
    $db->ejecuta($select, $token);
    $token = $db->obtenDatos();

    return $token;
}

/**
 * funcion para comprobar si el recuerdame esta activado
 * si no hay sesion activa ni token activo redirige a login
 * 
 * @return void
 */
function setSesion(): void{
    global $db;
    if(!isset($_SESSION['user'])){
        if(isset($_COOKIE['remember_me'])){
            $token = getSesionToken();

            $time = date('Y-m-d H:i:s', time());
            if($token['expiration'] > $time && !$token['consumed']){
                $select = "SELECT * FROM users WHERE id = :id";
                $db->ejecuta($select, $token['user_id']);
                $user = $db->obtenDatos();

                $_SESSION['user'] = $user;
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
function consumeToken($token): void{
    global $db;
    $query = "UPDATE tokens SET consumed = 1 WHERE token = :token";
    $db->ejecuta($query, $token);
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
function logout(){
    global $db;
    
    if(isset($_COOKIE['remember_me'])){
        $token = getSesionToken();
        consumeToken($token['token']);
        cookie_destroy('remember_me');
    }
    session_destroy();
    header('Location: login.php');
    die();
}

function getTweet($id = null) {
    $db = DWESBaseDatos::obtenerInstancia();
    if ($id == null) {
        $query = "SELECT * FROM tweets JOIN users ON tweets.user_id = users.id";
        $db->ejecuta($query);
    } else {
        $query = "SELECT * FROM tweets JOIN users ON tweets.user_id = users.id WHERE users.id = ?";
        $db->ejecuta($query, [$id]);
    }

    return $db->obtenDatos();
}


?>