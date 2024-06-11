<?php
    //LOGICA BASE DE DATOS

    /**
     * OBTENER EL NÚMERO DE FILAS DE UNA TABLA
     * 
     * Devuelve un int del número de elementos totales
     * en la tabla.
     * 
     * @param string $table_name Nombre de la tabla
     * @return int
    */
    function getRowsNumber($table_name) {
        global $db;
        $query = "SELECT COUNT(*) FROM $table_name";
        $db->ejecuta($query);
        return $db->obtenDatos()['COUNT(*)'];
    }

    /**
     * SABER SI UNA TABLA ESTÁ VACÍA
     * 
     * Devuelve True si la tabla está vacía,
     * y false si tiene alguna fila.
     * 
     * @param string $table_name Nombre de la tabla
     * @return boolean
     */
    function tableIsEmpty($table_name) {
        return getRowsNumber($table_name) === 0 ? true : false;
    }

    /**
     * OBTENER FILA DE UNA TABLA
     * 
     * Devuelve un array con los valores de la fila
     * 
     * @param string $table_name Nombre de la tabla
     * @param string $x_name Nombre de la condicion para filtrar
     * @param int $X Valor del x
     * @return array
     */
    function getRowForX($table_name, $X_name, $X) {
        global $db;
        $query = "SELECT * FROM $table_name WHERE $X_name = :X";
        $db->ejecuta($query, $X);
        return $db->obtenDatos();
    }

    /**
     * OBTIENE LOS DATOS DE UNA CONSULTA
     * 
     * @param string $query La consulta a ejecutar
     * 
     * @param mixed $params Los parametros asociados a la consulta
     * 
     * @return array Devuelve un array con los datos obtenidos de la BDD
     */
    function obtainQuery($query, ...$params) {
        global $db;
        if(count($params) === 0) {
            $db->ejecuta($query);
        } else {
            $db->ejecuta($query, $params);
        }
        return $db->obtenDatos();
    }

    /**
     * OBTENER TODAS LAS FILAS DE UNA TABLA
     * 
     * Devuelve un array con todas las filas de la tabla
     * 
     * @param string $table_name Nombre de la tabla
     * @return array
     */
    function getAllRows($table_name) {
        global $db;
        $query = "SELECT * FROM $table_name";
        $db->ejecuta($query);
        return $db->obtenDatos();
    }

    /**
     * DEVUELVE LA PAGINA ACTUAL
     * 
     * Busca en la url un parametro page, si existe de vuelve su valor y si no, lo inicializa a 1
     * 
     * @return int Devuelve el numero de la pagina actual
     */
    function page(){
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    /**
 * PAGINACION PARA TODA LA TABLA
 * 
 * Construye la paginacion en funcion de los datos que se obtienen de la BDD y calcula el numero de paginas con el numero de elementos por pagina
 * 
 * @params $table_name Nombre de la tabla
 * @params $rows_per_page Numero de elementos por pagina
 */
function show_pages_all($table_name, $rows_per_page){

    $current_page = page();
    
    $pages_number = getRowsNumber($table_name) / $rows_per_page;
    
    echo "<a href='?page=" . (1) . "'><<</a> "; 
    echo "<a href='?page=" . ($current_page == 1 ? $pages_number : $current_page - 1) . "'><</a>";

    for($i = 1; $i <= $pages_number; $i++) {
        echo "<a href='?page=$i'>$i</a>";
    }

    echo "<a href='?page=" . ($current_page == $pages_number ? 1 : $current_page + 1) . "'>></a> ";
    echo "<a href='?page=" . ($pages_number) . "'>>></a>";
}

/**
 * PAGINACION CON QUERY
 * 
 * Construye cuna paginacion en funcion del numero de paginas que se le pasen para crear
 * 
 * @param $pages_number Numero de paginas a crear
 * 
 */
function show_pages_query($rows_per_page, $query){
    global $db;
    $current_page = page();
    $num_elementos = $db->obtenDatos($db->ejecuta($query));
    $pages_number = $num_elementos["COUNT(*)"]/$rows_per_page;

    if($pages_number > 1){
    echo "<a href='?page=" . (1) . "'><<</a> "; 
    echo "<a href='?page=" . ($current_page == 1 ? $pages_number : $current_page - 1) . "'><</a>";

    for($i = 1; $i <= $pages_number; $i++) {
        echo "<a href='?page=$i'>$i</a>";
    }

    echo "<a href='?page=" . ($current_page == $pages_number ? 1 : $current_page + 1) . "'>></a> ";
    echo "<a href='?page=" . ($pages_number) . "'>>></a>";
}
}

/**
 * PAGINACION SIMPLE
 * 
 * Funcion que obtiene la pagina actual en la que estas para mostrar los datos de esa pagina y con el numero de paginas que le pases construye la paginacion.
 * 
 * @param $pages_number
 * 
 */
function show_pages($pages_number){
    $current_page = page();
    echo "<a href='?page=" . (1) . "'><<</a> "; 
    echo "<a href='?page=" . ($current_page == 1 ? $pages_number : $current_page - 1) . "'><</a>";

    for($i = 1; $i <= $pages_number; $i++) {
        echo "<a href='?page=$i'>$i</a>";
    }

    echo "<a href='?page=" . ($current_page == $pages_number ? 1 : $current_page + 1) . "'>></a> ";
    echo "<a href='?page=" . ($pages_number) . "'>>></a>";
}
?>