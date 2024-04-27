<?php

function intercalarCadenas($cadena1, $cadena2) {
    $resultado = '';
    $longitudMax = max(strlen($cadena1), strlen($cadena2));
    for ($i = 0; $i < $longitudMax; $i++) {
        if ($i < strlen($cadena1)) {
            $resultado .= $cadena1[$i];
        }
        if ($i < strlen($cadena2)) {
            $resultado .= $cadena2[$i];
        }
    }
    return $resultado;
}

// Ejemplo de uso
echo intercalarCadenas("abc", "1234"); // a1b2c34

function cifradoCesar($cadena, $desplazamiento) {
    $resultado = '';
    $longitud = strlen($cadena);
    for ($i = 0; $i < $longitud; $i++) {
        $caracterActual = $cadena[$i];
        if (ctype_lower($caracterActual)) { // Verifica si el carácter es una letra minúscula
            // Calcula el desplazamiento manteniendo los caracteres dentro del alfabeto (a-z)
            $caracterCodificado = chr((ord($caracterActual) - 97 + $desplazamiento) % 26 + 97);
            $resultado .= $caracterCodificado;
        } else {
            // Si no es una letra minúscula, simplemente añade el carácter sin modificar
            $resultado .= $caracterActual;
        }
    }
    return $resultado;
}

// Ejemplo de uso
echo cifradoCesar("abcdef", 3); // defghi