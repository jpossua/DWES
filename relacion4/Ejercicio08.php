<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 08</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<?php

// =======================================================================================
// EJERCICIO 08: GESTIÓN DE ESTADO Y LÓGICA CONDICIONAL
// =======================================================================================

/**
 * Clase CuentaBancaria
 * --------------------
 * Este ejercicio simula una cuenta bancaria simple.
 * Aquí aprendemos a:
 * 1. Modificar el estado interno (saldo) mediante métodos (depositar, extraer).
 * 2. Usar lógica condicional (if/else) para validar operaciones (¿Hay saldo suficiente?).
 * 3. Interactuar entre objetos (transferir dinero de una cuenta a otra).
 */
class CuentaBancaria
{
    // Atributos privados: Solo la propia cuenta puede ver/tocar su dinero directamente.
    private string $numeroCuenta;
    private string $nombreTitular;
    private float $saldo;
    private int $numeroOperaciones;

    /**
     * Constructor
     * Inicializa la cuenta.
     * Fíjate que el saldo y las operaciones empiezan siempre en 0, no se pasan como parámetro.
     */
    public function __construct(string $numeroCuenta, string $nombreTitular)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->nombreTitular = $nombreTitular;
        $this->saldo = 0.0;          // Nadie empieza con dinero gratis :(
        $this->numeroOperaciones = 0; // Contador a cero
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        echo "La cuenta '{$this->numeroCuenta}' de {$this->nombreTitular} ha sido cerrada.<br>";
    }

    /**
     * toString
     * Muestra el estado actual de la cuenta.
     */
    public function toString(): string
    {
        return "<div class='card mb-3 border-success shadow-sm'>" .
            "<div class='card-header bg-success text-white fw-bold'>Cuenta Bancaria</div>" .
            "<div class='card-body'>" .
            "<ul class='list-group list-group-flush'>" .
            "<li class='list-group-item'><strong>Número:</strong> {$this->numeroCuenta}</li>" .
            "<li class='list-group-item'><strong>Titular:</strong> {$this->nombreTitular}</li>" .
            // number_format nos ayuda a mostrar el dinero con 2 decimales bonitos
            "<li class='list-group-item'><strong>Saldo:</strong> <span class='badge bg-success fs-6'>" . number_format($this->saldo, 2) . " €</span></li>" .
            "<li class='list-group-item'><strong>Operaciones:</strong> <span class='badge bg-secondary'>{$this->numeroOperaciones}</span></li>" .
            "</ul>" .
            "</div></div>";
    }

    // ===================================================================================
    // MÉTODOS DE OPERACIÓN (La lógica del banco)
    // ===================================================================================

    /**
     * depositar
     * Añade dinero a la cuenta.
     * @param float $cantidad Cuánto queremos meter
     */
    public function depositar(float $cantidad): void
    {
        // 1. Validamos: No se puede ingresar dinero negativo
        if ($cantidad > 0) {
            $this->saldo += $cantidad; // Sumamos al saldo
            $this->numeroOperaciones++; // Contamos la operación
            echo "<div class='alert alert-success py-2'>Depósito de <strong>" . number_format($cantidad, 2) . " €</strong> realizado en cuenta {$this->numeroCuenta}.</div>";
        } else {
            echo "<div class='alert alert-danger py-2'>Error: La cantidad a depositar debe ser positiva.</div>";
        }
    }

    /**
     * extraer
     * Saca dinero de la cuenta.
     * @param float $cantidad Cuánto queremos sacar
     * @return bool Devuelve true si se pudo sacar, false si no (importante para saber si la operación tuvo éxito)
     */
    public function extraer(float $cantidad): bool
    {
        // 1. Validamos cantidad positiva
        if ($cantidad <= 0) {
            echo "<div class='alert alert-danger py-2'>Error: La cantidad a extraer debe ser positiva.</div>";
            return false;
        }

        // 2. Validamos si hay dinero suficiente
        if ($this->saldo >= $cantidad) {
            $this->saldo -= $cantidad; // Restamos
            $this->numeroOperaciones++;
            echo "<div class='alert alert-warning py-2'>Extracción de <strong>" . number_format($cantidad, 2) . " €</strong> realizada en cuenta {$this->numeroCuenta}.</div>";
            return true; // Éxito
        } else {
            // Si no hay saldo, mostramos error y NO restamos nada
            echo "<div class='alert alert-danger py-2'>Error: Saldo insuficiente en cuenta {$this->numeroCuenta} para extraer " . number_format($cantidad, 2) . " €.</div>";
            return false; // Fallo
        }
    }

    /**
     * transferir
     * Mueve dinero de ESTA cuenta a OTRA cuenta.
     * @param float $cantidad Cuánto mover
     * @param CuentaBancaria $otraCuenta EL OTRO OBJETO cuenta
     */
    public function transferir(float $cantidad, CuentaBancaria $otraCuenta): void
    {
        echo "<div class='alert alert-info py-2'>Iniciando transferencia de <strong>" . number_format($cantidad, 2) . " €</strong> a cuenta {$otraCuenta->numeroCuenta}...</div>";

        // Lógica inteligente:
        // 1. Intentamos extraer de ESTA cuenta ($this).
        // 2. SOLO SI la extracción funcionó (devolvió true), depositamos en la OTRA ($otraCuenta).
        if ($this->extraer($cantidad)) {
            $otraCuenta->depositar($cantidad);
            echo "<div class='alert alert-success py-2'>Transferencia completada con éxito.</div>";
        } else {
            echo "<div class='alert alert-danger py-2'>Transferencia fallida.</div>";
        }
    }
}

// =======================================================================================
// PRUEBAS
// =======================================================================================

echo "<body class='bg-light'><div class='container mt-5'>";
echo "<h1 class='mb-4 text-center text-success'>Pruebas Ejercicio 08: Cuenta Bancaria</h1>";

// 1. Crear cuentas
$cuenta1 = new CuentaBancaria("ES01-1234-5678-90", "Juan Pérez");
$cuenta2 = new CuentaBancaria("ES02-9876-5432-10", "Ana García");

echo "<div class='row'><div class='col-md-6'>";
echo $cuenta1->toString();
echo "</div><div class='col-md-6'>";
echo $cuenta2->toString();
echo "</div></div>";

// 2. Depositar
echo "<h3 class='mt-4'>Operaciones de Depósito</h3>";
$cuenta1->depositar(1000); // Juan ingresa 1000
$cuenta1->depositar(500);  // Juan ingresa 500 más
echo $cuenta1->toString();

// 3. Extraer
echo "<h3 class='mt-4'>Operaciones de Extracción</h3>";
$cuenta1->extraer(200); // Juan saca 200
echo $cuenta1->toString();

// 4. Transferir
echo "<h3 class='mt-4'>Operaciones de Transferencia</h3>";
// Juan le pasa 300 a Ana
$cuenta1->transferir(300, $cuenta2);

echo "<h3 class='mt-4'>Estado final de las cuentas:</h3>";
echo "<div class='row'><div class='col-md-6'>";
echo $cuenta1->toString(); // Juan debería tener menos dinero
echo "</div><div class='col-md-6'>";
echo $cuenta2->toString(); // Ana debería tener sus 300 euros
echo "</div></div>";

echo "</div></body>";
?>