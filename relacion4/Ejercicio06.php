<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 06</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<?php

// =======================================================================================
// EJERCICIO 06: PROPIEDADES AVANZADAS Y MIEMBROS ESTÁTICOS
// =======================================================================================

/**
 * Clase Restaurante (Versión Mejorada)
 * ------------------------------------
 * En este ejercicio introducimos conceptos más modernos y avanzados de PHP:
 * 1. Promoción de Propiedades (PHP 8+): Una forma más corta de escribir el constructor.
 * 2. Encapsulamiento Estricto: Uso de Getters y Setters.
 * 3. Miembros Estáticos: Propiedades y métodos que pertenecen a la CLASE, no al objeto.
 */
class Restaurante
{
    // PROPIEDAD ESTÁTICA (static)
    // Esta variable NO pertenece a un objeto concreto (como $nombre), sino a la clase Restaurante en general.
    // Es compartida por TODOS los restaurantes. Si uno la cambia, cambia para todos.
    // La usaremos para contar cuántos restaurantes hemos creado en total.
    private static int $numeroRest = 0;

    // Propiedad normal (no estática)
    // Esta sí es única para cada objeto.
    private array $ratings = [];

    /**
     * CONSTRUCTOR CON PROMOCIÓN DE PROPIEDADES
     * ----------------------------------------
     * Fíjate que aquí NO hemos declarado $nombre y $tipoCocina arriba como propiedades.
     * Al poner 'private string' DIRECTAMENTE en los parámetros del constructor, PHP hace 3 cosas por nosotros:
     * 1. Crea la propiedad privada.
     * 2. Recibe el argumento.
     * 3. Asigna el argumento a la propiedad ($this->nombre = $nombre).
     * ¡Ahorra mucho código!
     */
    public function __construct(
        private string $nombre,
        private string $tipoCocina
    ) {
        // Accedemos a la propiedad estática con self:: (self significa "esta clase")
        // Cada vez que creamos un restaurante, sumamos 1 al contador global.
        self::$numeroRest++;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        echo "El restaurante '{$this->nombre}' ha sido destruido.<br>";
    }

    // ===================================================================================
    // MÉTODOS ESTÁTICOS
    // ===================================================================================

    /**
     * totalRests
     * Método estático para leer la propiedad estática.
     * Se llama así: Restaurante::totalRests() (sin instanciar la clase).
     * @return int
     */
    public static function totalRests(): int
    {
        return self::$numeroRest;
    }

    // ===================================================================================
    // GETTERS Y SETTERS (Encapsulamiento)
    // ===================================================================================
    // Como las propiedades son 'private', nadie desde fuera puede tocarlas directamente ($r1->nombre = "X" daría error).
    // Para permitir leer o modificar de forma controlada, creamos estos métodos.

    /**
     * GETTER: Para LEER el nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * SETTER: Para MODIFICAR el nombre
     * Aquí podríamos poner validaciones (ej: que el nombre no esté vacío).
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getTipoCocina(): string
    {
        return $this->tipoCocina;
    }

    public function setTipoCocina(string $tipoCocina): void
    {
        $this->tipoCocina = $tipoCocina;
    }

    public function getRatings(): array
    {
        return $this->ratings;
    }

    public function setRatings(array $ratings): void
    {
        $this->ratings = $ratings;
    }

    // ===================================================================================
    // OTROS MÉTODOS
    // ===================================================================================

    public function toString(): string
    {
        $ratingsStr = empty($this->ratings) ? "Sin valoraciones" : implode(", ", $this->ratings);
        return "<div class='card mb-3 shadow-sm'>" .
            "<div class='card-header bg-success text-white'>" .
            "<h2 class='card-title h5 m-0'>Restaurante: {$this->nombre}</h2>" .
            "</div>" .
            "<div class='card-body'>" .
            "<p class='card-text'><strong>Tipo de Cocina:</strong> <span class='badge bg-warning text-dark'>{$this->tipoCocina}</span></p>" .
            "<p class='card-text'><strong>Ratings:</strong> {$ratingsStr}</p>" .
            "</div></div>";
    }

    public function anadirRating(int $rating): void
    {
        if ($rating >= 1 && $rating <= 5) {
            $this->ratings[] = $rating;
        } else {
            echo "Error: El rating debe ser un entero entre 1 y 5.<br>";
        }
    }

    public function calcularRatingMedio(): float
    {
        if (empty($this->ratings)) {
            return 0.0;
        }
        return array_sum($this->ratings) / count($this->ratings);
    }
}

// =======================================================================================
// PRUEBAS
// =======================================================================================

echo "<body class='bg-light'><div class='container mt-5'>";
echo "<h1 class='mb-4 text-center text-success'>Pruebas Ejercicio 06 (Promoción de Propiedades y Estáticos)</h1>";

// 1. Verificar contador inicial (MÉTODO ESTÁTICO)
// Fíjate que no hemos hecho "new Restaurante" todavía.
echo "<div class='alert alert-info'>Restaurantes creados al inicio: <strong>" . Restaurante::totalRests() . "</strong></div>";

// 2. Crear instancias
$r1 = new Restaurante("La Tagliatella", "Italiana");
$r2 = new Restaurante("Sushi Bar", "Japonesa");

echo "<div class='row'><div class='col-md-6'>";
echo $r1->toString();
echo "</div><div class='col-md-6'>";
echo $r2->toString();
echo "</div></div>";

// 3. Verificar contador tras creación
// Ahora debería decir 2, porque el constructor se ejecutó 2 veces.
echo "<div class='alert alert-info'><strong>Restaurantes creados tras instanciar 2 objetos: " . Restaurante::totalRests() . "</strong></div>";

// 4. Probar Getters y Setters
echo "<h3 class='mt-4'>Prueba de Getters y Setters</h3>";
echo "<div class='card p-3 mb-3'>";
// Leemos con getNombre()
echo "Nombre original R1: " . $r1->getNombre() . "<br>";
// Modificamos con setNombre()
$r1->setNombre("La Tagliatella Premium");
echo "Nombre modificado R1: " . $r1->getNombre() . "<br>";
echo "</div>";

// 5. Añadir ratings
$r1->anadirRating(5);
$r1->anadirRating(4);
echo $r1->toString();

echo "</div></body>";
?>