<!--Relacion3-php - Librería con funciones de la Relación 3 (Ejercicios 1 a 3)-->
<?php
/**
 * Ejercicio 1: Determina si un número es primo. 
 */
function numeroPrimo($num)
{
    $esPrimo = true;
    if ($num <= 1) {
        $esPrimo = false;
    } else {
        for ($i = 2; $i < $num && $esPrimo; $i++) {
            if ($num % $i == 0) {
                $esPrimo = false;
            }
        }
    }

    return $esPrimo;
}

/**
 * Ejercicio 2: Calcula el factorial de un número (recursivo).
 */
function calcularFactorial($num)
{
    if ($num < 0) {
        throw new InvalidArgumentException("El factorial no está definido para números negativos.");
    }
    if ($num <= 1) {
        return 1;
    } else {
        return $num * calcularFactorial($num - 1);
    }
}

/**
 * Ejercicio 3: MCD por división (recursivo) - Algoritmo de Euclides.
 */
function mcdDivisionRecursivo($a, $b)
{
    if ($b == 0) {
        return $a;
    }
    return mcdDivisionRecursivo($b, $a % $b);
}

/**
 * Ejercicio 3: MCD por restas sucesivas (recursivo).
 */
function mcdRestaRecursivo($a, $b)
{
    if ($a == $b) {
        return $a;
    } elseif ($a > $b) {
        return mcdRestaRecursivo($a - $b, $b);
    } else {
        return mcdRestaRecursivo($a, $b - $a);
    }
}

// --- FUNCIONES Ejercicio 11 ---

/**
 *  Función que intercambia el valor de dos variables.
 * IMPORTANTE: Se usan referencias (&) para modificar las variables originales.
 */
function swap(&$n1, &$n2)
{
    $temp = $n1;
    $n1 = $n2;
    $n2 = $temp;
}

/**
 *  Función que invierte un array utilizando la función swap.
 * Recibe el array por referencia para modificarlo directamente.
 */
function invertirArray(&$array)
{
    $longitud = count($array);
    // Recorremos solo hasta la mitad del array
    for ($i = 0; $i < $longitud / 2; $i++) {
        // Índice opuesto al actual (del final hacia el principio)
        $indiceOpuesto = $longitud - 1 - $i;

        // Intercambiamos el elemento actual con su opuesto
        swap($array[$i], $array[$indiceOpuesto]);
    }
}
?>