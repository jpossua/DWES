<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 07</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<?php

// =======================================================================================
// EJERCICIO 07: LÓGICA DE NEGOCIO Y COMPARACIÓN DE OBJETOS
// =======================================================================================

/**
 * Clase BanderaFranjas
 * --------------------
 * Este ejercicio se centra en manipular el estado interno del objeto (invertir colores, orientación)
 * y en comparar un objeto con otro (¿Son iguales? ¿Se parecen?).
 */
class BanderaFranjas
{
    private string $orientacion; // Puede ser 'horizontal' o 'vertical'
    private array $franjas;      // Lista de colores (ej: ["rojo", "amarillo", "rojo"])
    private string $nombre;      // Nombre de la bandera (ej: "España")

    /**
     * Constructor
     * Inicializa la bandera.
     * @param string $nombre
     * @param string $orientacion
     * @param array $franjas
     */
    public function __construct(string $nombre = "sin adscripción", string $orientacion = "horizontal", array $franjas = [])
    {
        $this->nombre = $nombre;
        // strtolower convierte a minúsculas para evitar problemas (Horizontal vs horizontal)
        $this->orientacion = strtolower($orientacion);
        $this->franjas = $franjas;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        // Opcional
    }

    // --- GETTERS ---
    // Necesarios para que un objeto pueda ver las propiedades de OTRO objeto al compararse.
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getOrientacion(): string
    {
        return $this->orientacion;
    }
    public function getFranjas(): array
    {
        return $this->franjas;
    }

    /**
     * mostrar
     * Genera el HTML para dibujar la bandera.
     * No te preocupes demasiado por el CSS complejo aquí, lo importante es la lógica de PHP.
     */
    public function mostrar(): string
    {
        $html = "<div class='card d-inline-block m-3 shadow-sm align-top' style='width: fit-content;'>";
        $html .= "<div class='card-header text-center fw-bold bg-light'>{$this->nombre}</div>";
        $html .= "<div class='card-body p-2'>";

        // LÓGICA VISUAL:
        // Si la orientación es vertical, las franjas van en fila (row).
        // Si es horizontal, van en columna (column).
        $flexDir = ($this->orientacion === 'vertical') ? 'row' : 'column';

        $boxWidth = "300px";
        $boxHeight = "200px";

        $html .= "<div style='display: flex; flex-direction: {$flexDir}; width: {$boxWidth}; height: {$boxHeight}; border: 1px solid #ccc;'>";

        $numFranjas = count($this->franjas);
        if ($numFranjas > 0) {
            $basis = 100 / $numFranjas; // Calculamos cuánto ocupa cada franja (ej: 3 franjas -> 33.3%)
            foreach ($this->franjas as $color) {
                // Decidimos si el texto debe ser blanco o negro según el fondo
                $textColor = (in_array(strtolower($color), ['black', 'blue', 'red', 'green', 'purple'])) ? 'white' : 'black';

                $html .= "<div style='background-color: {$color}; flex-basis: {$basis}%; display: flex; align-items: center; justify-content: center; color: {$textColor}; font-weight: bold; text-shadow: 0px 0px 2px rgba(0,0,0,0.5);'>";
                $html .= ucfirst($color);
                $html .= "</div>";
            }
        } else {
            $html .= "<div style='width: 100%; display: flex; align-items: center; justify-content: center;'>Sin franjas</div>";
        }

        $html .= "</div>";
        $html .= "</div>";
        $html .= "<div class='card-footer text-muted text-center small'>Orientación: <span class='badge bg-info text-dark'>{$this->orientacion}</span></div>";
        $html .= "</div>";

        return $html;
    }

    // ===================================================================================
    // MÉTODOS DE COMPARACIÓN
    // ===================================================================================

    /**
     * esIdentica
     * Compara ESTA bandera ($this) con OTRA bandera ($otra).
     * @param BanderaFranjas $otra El otro objeto a comparar
     * @return bool True si son iguales en todo
     */
    public function esIdentica(BanderaFranjas $otra): bool
    {
        // Para que sean idénticas, deben coincidir nombre, orientación y colores.
        // Usamos los getters de $otra para ver sus valores.
        return $this->nombre === $otra->getNombre() &&
            $this->orientacion === $otra->getOrientacion() &&
            $this->franjas === $otra->getFranjas(); // PHP sabe comparar arrays automáticamente
    }

    /**
     * mismasFranjasDiferenteOrientacion
     * Comprueba una condición específica.
     */
    public function mismasFranjasDiferenteOrientacion(BanderaFranjas $otra): bool
    {
        // 1. Las franjas deben ser iguales
        // 2. PERO la orientación debe ser distinta
        return $this->franjas === $otra->getFranjas() &&
            $this->orientacion !== $otra->getOrientacion();
    }

    // ===================================================================================
    // MÉTODOS DE MANIPULACIÓN
    // ===================================================================================

    /**
     * invertirColores
     * Cambia el orden del array de franjas.
     */
    public function invertirColores(): void
    {
        // array_reverse devuelve el array al revés
        $this->franjas = array_reverse($this->franjas);
    }

    /**
     * invertirOrientacion
     * Cambia de horizontal a vertical y viceversa.
     */
    public function invertirOrientacion(): void
    {
        // Operador ternario: Si es horizontal, ponlo vertical. Si no, ponlo horizontal.
        $this->orientacion = ($this->orientacion === 'horizontal') ? 'vertical' : 'horizontal';
    }
}

// =======================================================================================
// PRUEBAS
// =======================================================================================

echo "<body class='bg-light'><div class='container mt-5'>";
echo "<h1 class='mb-4 text-center text-primary'>Pruebas Ejercicio 07: Banderas</h1>";

// 1. Crear banderas
$espana = new BanderaFranjas("España", "horizontal", ["red", "yellow", "red"]);
$francia = new BanderaFranjas("Francia", "vertical", ["blue", "white", "red"]);
$alemania = new BanderaFranjas("Alemania", "horizontal", ["black", "red", "gold"]);

echo "<div class='text-center'>";
echo $espana->mostrar();
echo $francia->mostrar();
echo $alemania->mostrar();
echo "</div>";

// 2. Probar inversión de colores
echo "<h3 class='mt-4'>Invertir colores de Alemania</h3>";
$alemania->invertirColores(); // Modificamos el objeto
echo "<div class='text-center'>" . $alemania->mostrar() . "</div>";

// 3. Probar inversión de orientación
echo "<h3 class='mt-4'>Invertir orientación de Francia</h3>";
$francia->invertirOrientacion(); // Modificamos el objeto
echo "<div class='text-center'>" . $francia->mostrar() . "</div>";

// 4. Comparaciones
// Creamos objetos nuevos para comparar
$copiaEspana = new BanderaFranjas("España", "horizontal", ["red", "yellow", "red"]);
$espanaVertical = new BanderaFranjas("España Vertical", "vertical", ["red", "yellow", "red"]);

echo "<h3 class='mt-4'>Comparaciones</h3>";
echo "<ul class='list-group'>";

// Probamos esIdentica
echo "<li class='list-group-item'>¿España es idéntica a su copia? " .
    ($espana->esIdentica($copiaEspana) ? "<span class='badge bg-success'>SÍ</span>" : "<span class='badge bg-danger'>NO</span>") . "</li>";

echo "<li class='list-group-item'>¿España es idéntica a Francia? " .
    ($espana->esIdentica($francia) ? "<span class='badge bg-success'>SÍ</span>" : "<span class='badge bg-danger'>NO</span>") . "</li>";

// Probamos mismasFranjasDiferenteOrientacion
echo "<li class='list-group-item'>¿España tiene mismas franjas que España Vertical pero distinta orientación? " .
    ($espana->mismasFranjasDiferenteOrientacion($espanaVertical) ? "<span class='badge bg-success'>SÍ</span>" : "<span class='badge bg-danger'>NO</span>") . "</li>";
echo "</ul>";

echo "</div></body>";
?>

</html>