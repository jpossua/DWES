<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 05</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<?php

// =======================================================================================
// EJERCICIO 05: INTRODUCCIÓN A CLASES Y OBJETOS
// =======================================================================================

/**
 * Clase Restaurante
 * -----------------
 * Una "Clase" es como un plano o una plantilla.
 * Define cómo serán los objetos que creemos a partir de ella.
 * 
 * En este caso, definimos qué es un "Restaurante" para nuestro programa.
 */
class Restaurante
{
    // PROPIEDADES (Atributos)
    // Son las variables que pertenecen a la clase. Guardan la información del objeto.
    // 'private' significa que solo se pueden ver/modificar DENTRO de esta clase.
    private $nombre;      // Guardará el nombre del restaurante
    private $tipoCocina;  // Guardará el tipo de comida (Italiana, Japonesa, etc.)
    private $ratings;     // Guardará una lista (array) de puntuaciones

    /**
     * CONSTRUCTOR (__construct)
     * -------------------------
     * Es un método especial que se ejecuta AUTOMÁTICAMENTE cuando hacemos "new Restaurante(...)".
     * Sirve para inicializar el objeto (darle sus valores iniciales).
     * 
     * @param string $nombre El nombre que le queremos dar
     * @param string $tipoCocina El tipo de cocina
     */
    public function __construct($nombre, $tipoCocina)
    {
        // $this se refiere a "ESTE objeto que estamos creando ahora mismo".
        // Asignamos los valores recibidos a las propiedades del objeto.
        $this->nombre = $nombre;
        $this->tipoCocina = $tipoCocina;
        $this->ratings = []; // Inicializamos el array de ratings vacío
    }

    /**
     * DESTRUCTOR (__destruct)
     * -----------------------
     * Es otro método especial que se ejecuta cuando el objeto se elimina de la memoria.
     * (Por ejemplo, cuando termina el script).
     */
    public function __destruct()
    {
        echo "El restaurante '{$this->nombre}' ha sido destruido.<br>";
    }

    /**
     * MÉTODOS (Funciones)
     * -------------------
     * Son las acciones que puede realizar el objeto.
     */

    /**
     * toString
     * Devuelve una representación bonita (HTML) del objeto.
     * @return string
     */
    public function toString()
    {
        // implode une los elementos de un array en un string separados por comas
        $ratingsStr = empty($this->ratings) ? "Sin valoraciones" : implode(", ", $this->ratings);

        // Devolvemos un string con código HTML para mostrar la tarjeta
        return "<div class='card mb-3 shadow-sm'>" .
            "<div class='card-header bg-primary text-white'>" .
            "<h2 class='card-title h5 m-0'>Restaurante: {$this->nombre}</h2>" .
            "</div>" .
            "<div class='card-body'>" .
            "<p class='card-text'><strong>Tipo de Cocina:</strong> <span class='badge bg-secondary'>{$this->tipoCocina}</span></p>" .
            "<p class='card-text'><strong>Ratings:</strong> {$ratingsStr}</p>" .
            "</div></div>";
    }

    /**
     * obtenerNumeroRatings
     * Nos dice cuántas valoraciones tiene el restaurante.
     * @return int
     */
    public function obtenerNumeroRatings()
    {
        return count($this->ratings); // count cuenta los elementos del array
    }

    /**
     * anadirRating
     * Añade una nueva puntuación a la lista.
     * @param int $rating La puntuación (1-5)
     */
    public function anadirRating($rating)
    {
        // Validamos que sea un número entero y esté entre 1 y 5
        if (is_int($rating) && $rating >= 1 && $rating <= 5) {
            $this->ratings[] = $rating; // Añadimos al final del array
        } else {
            echo "Error: El rating debe ser un entero entre 1 y 5.<br>";
        }
    }

    /**
     * anadirOtrosRatings
     * Permite añadir varias puntuaciones a la vez.
     * @param array $ratings Un array de puntuaciones
     */
    public function anadirOtrosRatings($ratings)
    {
        // Recorremos el array recibido y usamos el método anterior para añadir uno a uno
        foreach ($ratings as $rating) {
            $this->anadirRating($rating); // Reutilizamos código (¡Buena práctica!)
        }
    }

    /**
     * calcularRatingMedio
     * Calcula la media de todas las puntuaciones.
     * @return float
     */
    public function calcularRatingMedio()
    {
        if (empty($this->ratings)) {
            return 0.0; // Evitamos dividir por cero
        }
        // array_sum suma todos los valores, count los cuenta
        return array_sum($this->ratings) / count($this->ratings);
    }
}

// =======================================================================================
// PRUEBAS (Instanciación y uso de objetos)
// =======================================================================================

echo "<body class='bg-light'><div class='container mt-5'>";
echo "<h1 class='mb-4 text-center text-primary'>Pruebas de la clase Restaurante</h1>";

// 1. Crear instancia (Objeto)
// "new Restaurante" llama al __construct
$restaurante = new Restaurante("La Bella Italia", "Italiana");
echo $restaurante->toString();

// 2. Usar métodos del objeto
$restaurante->anadirRating(4);
$restaurante->anadirRating(5);
$restaurante->anadirRating(3);
echo "<div class='alert alert-info'>Añadidos ratings: 4, 5, 3</div>";
echo $restaurante->toString(); // Vemos cómo cambia el estado del objeto

// 3. Añadir varios ratings
$nuevosRatings = [5, 2, 4, 10]; // El 10 debería dar error
echo "<div class='alert alert-warning'>Intentando añadir ratings: 5, 2, 4, 10 (error esperado)</div>";
$restaurante->anadirOtrosRatings($nuevosRatings);
echo $restaurante->toString();

// 4. Obtener datos calculados
echo "<div class='alert alert-secondary'>Número total de ratings: <strong>" . $restaurante->obtenerNumeroRatings() . "</strong></div>";

// 5. Calcular media
echo "<div class='alert alert-success'>Rating medio: <strong>" . number_format($restaurante->calcularRatingMedio(), 2) . "</strong></div>";

echo "</div></body>";
// Fin del script (se ejecutará el destructor automáticamente)
?>