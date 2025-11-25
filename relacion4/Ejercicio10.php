<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 10</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary">Pruebas Ejercicio 10: Interfaces</h1>

        <?php

        // =======================================================================================
        // 1. DEFINICIÓN DE LA INTERFAZ
        // =======================================================================================

        /**
         * Interfaz Encendible
         * -------------------
         * Una interfaz es como un "contrato" o una lista de requisitos.
         * Si una clase dice que implementa esta interfaz, ESTÁ OBLIGADA a tener
         * los métodos que aquí se definen.
         * 
         * En este caso, cualquier cosa que sea "Encendible" debe saber cómo:
         * 1. encender()
         * 2. apagar()
         * 
         * Nota: Aquí solo decimos QUÉ debe hacer, no CÓMO lo hace.
         */
        interface Encendible
        {
            public function encender();
            public function apagar();
        }

        // =======================================================================================
        // 2. CLASE BOMBILLA (Implementa la interfaz)
        // =======================================================================================

        /**
         * Clase Bombilla
         * --------------
         * Esta clase representa una bombilla real.
         * Al poner "implements Encendible", nos comprometemos a escribir el código
         * para encender() y apagar().
         */
        class Bombilla implements Encendible
        {
            // ATRIBUTOS: Las características de la bombilla
            private string $tipoBombilla; // Ej: "LED", "Halógena"
            private float $lumenes;       // Potencia de luz
            private bool $encendida;      // Estado: true (encendida) o false (apagada)

            // CONSTRUCTOR: Se ejecuta automáticamente al crear una nueva Bombilla (new Bombilla(...))
            // Sirve para dar los valores iniciales.
            public function __construct(string $tipo, float $lumenes)
            {
                $this->tipoBombilla = $tipo;
                $this->lumenes = $lumenes;
                $this->encendida = false; // Por defecto, la bombilla empieza apagada
            }

            // DESTRUCTOR: Se ejecuta cuando la bombilla se elimina de la memoria (opcional)
            public function __destruct()
            {
                // Aquí podríamos poner código de limpieza si fuera necesario
            }

            // MÉTODO ENCENDER: Cumplimos con el contrato de la interfaz
            public function encender()
            {
                $this->encendida = true; // Cambiamos el estado a encendido
                // Mostramos un mensaje visual
                echo "<div class='alert alert-success'>Bombilla <strong>{$this->tipoBombilla}</strong> encendida. (Potencia: {$this->lumenes} W)</div>";
            }

            // MÉTODO APAGAR: Cumplimos con el contrato de la interfaz
            public function apagar()
            {
                $this->encendida = false; // Cambiamos el estado a apagado
                echo "<div class='alert alert-secondary'>Bombilla <strong>{$this->tipoBombilla}</strong> apagada.</div>";
            }
        }

        // =======================================================================================
        // 3. CLASE MOTOCICLETA (También implementa la interfaz)
        // =======================================================================================

        /**
         * Clase Motocicleta
         * -----------------
         * Una moto es muy diferente a una bombilla, pero TAMBIÉN se puede encender y apagar.
         * Por eso también puede implementar "Encendible".
         */
        class Motocicleta implements Encendible
        {
            // Atributos propios de una moto
            private float $gasolina;
            private float $bateria;
            private string $matricula;
            private bool $encendida; // Estado del motor

            // Constructor: Inicializa la moto
            public function __construct(string $matricula)
            {
                $this->matricula = $matricula;
                $this->gasolina = 0;      // Empieza sin gasolina
                $this->bateria = 2;       // Tiene algo de batería
                $this->encendida = false; // Motor apagado
            }

            // Método propio de la moto (no tiene nada que ver con la interfaz)
            public function cargarGasolina(float $litros)
            {
                $this->gasolina += $litros;
                echo "<div class='alert alert-info'>Cargados <strong>{$litros}</strong> litros de gasolina. Total: {$this->gasolina}L</div>";
            }

            // MÉTODO ENCENDER: Lógica más compleja que la bombilla
            public function encender()
            {
                // 1. Comprobamos si ya está encendida
                if ($this->encendida) {
                    echo "<div class='alert alert-warning'>La moto <strong>{$this->matricula}</strong> ya está encendida.</div>";
                    return; // Salimos de la función
                }

                // 2. Comprobamos batería
                if ($this->bateria <= 0) {
                    echo "<div class='alert alert-danger'>No hay batería suficiente para arrancar la moto <strong>{$this->matricula}</strong>.</div>";
                    return;
                }

                // 3. Comprobamos gasolina
                if ($this->gasolina <= 0) {
                    echo "<div class='alert alert-danger'>No hay gasolina suficiente para arrancar la moto <strong>{$this->matricula}</strong>.</div>";
                    return;
                }

                // Si todo está bien, encendemos
                $this->encendida = true;
                echo "<div class='alert alert-success'>Motocicleta <strong>{$this->matricula}</strong> ARRANCADA. ¡Brum brum!</div>";
            }

            // MÉTODO APAGAR
            public function apagar()
            {
                if (!$this->encendida) {
                    echo "<div class='alert alert-warning'>La moto <strong>{$this->matricula}</strong> ya está apagada.</div>";
                    return;
                }
                $this->encendida = false;
                echo "<div class='alert alert-secondary'>Motocicleta <strong>{$this->matricula}</strong> apagada.</div>";
            }
        }

        // =======================================================================================
        // 4. PRUEBAS Y POLIMORFISMO
        // =======================================================================================

        /**
         * Función enciende_algo
         * ---------------------
         * AQUÍ ESTÁ LA MAGIA DEL POLIMORFISMO.
         * 
         * Esta función recibe un parámetro $algo.
         * No le importa si es una Bombilla, una Moto o un Coche.
         * Solo le importa que sea "Encendible".
         * 
         * Como sabemos que es "Encendible", sabemos seguro que tiene el método encender().
         */
        function enciende_algo(Encendible $algo)
        {
            $algo->encender();
        }

        echo "<div class='card p-4 shadow-sm'>";
        echo "<h3 class='card-title'>Prueba de Polimorfismo</h3>";
        echo "<p class='text-muted'>Usamos la misma función <code>enciende_algo()</code> para encender objetos diferentes.</p>";

        // 1. Creamos los objetos
        $miBombilla = new Bombilla("LED", 12);
        $miMoto = new Motocicleta("3873 NXB");

        // 2. Usamos la función polimórfica con la Bombilla
        echo "<h5 class='mt-3'>1. Encendiendo Bombilla:</h5>";
        enciende_algo($miBombilla); // La función llama a Bombilla->encender()

        // 3. Usamos la función polimórfica con la Moto
        echo "<h5 class='mt-3'>2. Intentando encender Moto (Estado inicial):</h5>";
        enciende_algo($miMoto); // La función llama a Motocicleta->encender() (Fallará por gasolina)

        // 4. Arreglamos la moto y probamos de nuevo
        echo "<h5 class='mt-3'>3. Cargando gasolina y reintentando:</h5>";
        $miMoto->cargarGasolina(5);
        enciende_algo($miMoto); // Ahora funcionará

        // 5. Apagamos manualmente
        echo "<h5 class='mt-3'>4. Apagando objetos:</h5>";
        $miBombilla->apagar();
        $miMoto->apagar();

        echo "</div>";
        ?>
    </div>
</body>

</html>