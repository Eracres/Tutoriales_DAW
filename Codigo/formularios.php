<?php

function isValidData($data){
    return (isset($data)  && $data != "") ? true : false;
}

function catchDateError(&$errors_array, $error_key, $name_input){
    $fecha_actual = date('Y-m-d H:i:s', time());
    if ($_POST[$name_input] < $fecha_actual && $_POST[$name_input] !== "") {
        $errors_array[$error_key] = "La fecha debe ser posterior a hoy.";
    }
}

/**
 * Funcion para mostrar todos los errores que se generen en un formulario
 * @
 * @return void
 */
function showErrors($array_errors, $error_name = null): void{
    if (!empty($array_errors)) {
        if ($error_name == null) {
            foreach ($array_errors as $error) {
                echo "<span class='error'>" . $error . "</span>";
            }
        } else {
            echo "<span class='error'>" . $array_errors[$error_name] . "</span>";
        }
    }
}


/**
 * MOSTRAR ERRORES EN UN INPUT
 * 
 * Imprime el texto del error en un span con la clase error.
 * 
 * @param array $errors_array array de errores
 * @param string $error_key nombre del error
 * 
 * @return void
 */
function showError($errors_array, $error_key){
    $errors_array;
    if (isset($errors_array[$error_key])) {
        echo "<span class='error'>{$errors_array[$error_key]}</span>";
    }
}

/**
 * GENERAR OPCIONES DE UNA ETIQUETA SELECT
 * 
 * Recorre el array que se le pasa como primer parámetro y guarda la cadena selected de cada opción para indicar si
 * está seleccionada. Después imprime la etiqueta option y
 * concatena la variable $selected dentro de ésta.
 * 
 * @param array $array Es un array bidimensional
 * @param string $assoc_name Nombre de la columna de la BDD
 * @param string $select_name Nombre de la etiqueta select
 * @return void
 */
function generateSelectOptions($array, $assocc_name, $select_name){
    foreach ($array as $value) {
        $selected = showSelected($select_name, $value[$assocc_name]);
        echo "<option value='{$value[$assocc_name]}' $selected>{$value[$assocc_name]}</option>";
    }
}

/**
 * GENERAR OPCIONES DE CHECKBOX
 * 
 * Recorre el array que se le pasa como primer parámetro,
 * y guarda la cadena checked de cada opción para indicar si
 * está seleccionada. Después imprime la etiqueta input y
 * concatena la variable $checked dentro de ésta.
 * 
 * @param array $array Es un array bidimensional
 * @param string $assoc_name Nombre de la columna de la BDD
 * @param string $input_name Nombre de la propia etiqueta input
 * @return void
 */
function generateCheckboxOptions($array, $assocc_name, $input_name){
    echo '<ul>';
    foreach ($array as $value) {
        $checked = showCheckedOption($input_name, $value[$assocc_name]);

        echo '<li>';
        echo "<label for='{$value[$assocc_name]}-input'>{$value[$assocc_name]}:</label>";
        echo "<input type='checkbox' name='{$input_name}[]' id='{$value[$assocc_name]}-input' value='{$value[$assocc_name]}' $checked>";
        echo '</li>';
    }
    echo '</ul>';
}


/**
 * PERSISTENCIA DE INPUTS DE TEXTO, NUMÉRICOS Y DE FECHA
 * 
 * Si la función post está declarada y es distinto de null imprime
 * su valor al usarse esta función dentro de la etiqueta value
 * del input. Si no está declarada o es null, imprime una cadena vacía.
 * 
 * @param string $name Nombre del input
 * @return void
 * 
 */
function showValue($name){
    echo isset($_POST[$name]) ? "value='$_POST[$name]'" : "";
}

/**
     * PERSISTENCIA EN ETIQUETAS SELECT
     * 
     * Si está declarada la función post y es distinto de null, y
     * además el valor de la función post es igual al valor que se
     * le pasa como segundo parámetro, devuelve la cadena selected, si no,
     * devuelve una cadena vacía.
     * 
     * @param string $name
     * @param string $value
     * 
     * @return string
     */
    function showSelected($name, $value) {
        return isset($_POST[$name]) && $_POST[$name] == $value ? "selected" : "";
    }

    /**
     * PERSISTENCIA EN INPUTS CHECKBOX
     * 
     * Si está declarada la función post y es distinto de null, y
     * además el valor se encuentra en el array, devuelve la cadena
     * 'ckecked', si no, devuelve una cadena vacía.
     * 
     * @param string $name
     * @param string $value
     * @return string
     */
    function showCheckedOption($name, $value) {
        return isset($_POST[$name]) && in_array($value, $_POST[$name]) ? "checked" : "";
    }