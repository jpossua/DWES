<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 4 - Ejercicio 09</title>
    <link rel="shortcut icon" href="img/playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<?php

// =======================================================================================
// EJERCICIO 09: HERENCIA Y CLASES ABSTRACTAS
// =======================================================================================

/**
 * Clase Abstracta CuentaBancaria
 * ------------------------------
 * Una clase "abstracta" es una clase base que NO se puede instanciar directamente.
 * (No puedes hacer "new CuentaBancaria()").
 * Sirve como plantilla para otras clases (Hijas) que heredarán de ella.
 * 
 * Define lo que TODAS las cuentas bancarias tienen en común (número, titular, saldo...).
 */
abstract class CuentaBancaria
{
    // Usamos 'protected' en lugar de 'private'.
    // 'protected' significa: "Visible para mí Y para mis clases hijas".
    // Si fuera 'private', las clases hijas (Debito/Credito) no podrían ver el saldo directamente.
    protected string $numeroCuenta;
    protected string $nombreTitular;
    protected float $saldo;
    protected int $numeroOperaciones;

    public function __construct(string $numeroCuenta, string $nombreTitular)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->nombreTitular = $nombreTitular;
        $this->saldo = 0.0;
        $this->numeroOperaciones = 0;
    }

    public function __destruct()
    {
        // Mensaje opcional al destruir
    }

    // Getters comunes para todas las cuentas
    public function getNumeroCuenta(): string
    {
        return $this->numeroCuenta;
    }
    public function getNombreTitular(): string
    {
        return $this->nombreTitular;
    }
    public function getSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * MÉTODO ABSTRACTO: extraer
     * -------------------------
     * Al poner "abstract", estamos OBLIGANDO a las clases hijas a implementar este método.
     * La clase padre dice: "Todas las cuentas deben saber extraer dinero, pero no sé cómo lo hace cada una".
     * - La de débito mirará si hay saldo.
     * - La de crédito mirará si hay límite.
     */
    abstract public function extraer(float $cantidad): bool;

    /**
     * depositar
     * Este método NO es abstracto. Es igual para todas las cuentas.
     * Las clases hijas lo heredan tal cual y funciona igual para todas.
     */
    public function depositar(float $cantidad): void
    {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            $this->numeroOperaciones++;
            echo "<div class='alert alert-success py-2'>Depósito de <strong>" . number_format($cantidad, 2) . " €</strong> realizado en cuenta {$this->numeroCuenta}.</div>";
        } else {
            echo "<div class='alert alert-danger py-2'>Error: La cantidad a depositar debe ser positiva.</div>";
        }
    }

    /**
     * transferir
     * También es común. Usa el método 'extraer' (que será diferente según la hija) y 'depositar'.
     * Esto es POLIMORFISMO: $this->extraer() ejecutará el código de la hija correspondiente.
     */
    public function transferir(float $cantidad, CuentaBancaria $otraCuenta): void
    {
        echo "<div class='alert alert-info py-2'>Iniciando transferencia de <strong>" . number_format($cantidad, 2) . " €</strong> a cuenta {$otraCuenta->numeroCuenta}...</div>";

        if ($this->extraer($cantidad)) {
            $otraCuenta->depositar($cantidad);
            echo "<div class='alert alert-success py-2'>Transferencia completada con éxito.</div>";
        } else {
            echo "<div class='alert alert-danger py-2'>Transferencia fallida.</div>";
        }
    }

    /**
     * toString
     * Método base para mostrar información.
     */
    public function toString(): string
    {
        return "<div class='card mb-3 shadow-sm'>" .
            "<div class='card-header bg-primary text-white fw-bold'>Cuenta Bancaria</div>" .
            "<div class='card-body'>" .
            "<ul class='list-group list-group-flush'>" .
            "<li class='list-group-item'><strong>Número:</strong> {$this->numeroCuenta}</li>" .
            "<li class='list-group-item'><strong>Titular:</strong> {$this->nombreTitular}</li>" .
            "<li class='list-group-item'><strong>Saldo:</strong> " . number_format($this->saldo, 2) . " €</li>" .
            "<li class='list-group-item'><strong>Operaciones:</strong> {$this->numeroOperaciones}</li>" .
            "</ul>" .
            "</div></div>";
    }
}

// =======================================================================================
// CLASES HIJAS (Herencia)
// =======================================================================================

/**
 * Clase CuentaDebito
 * ------------------
 * "extends CuentaBancaria" significa que COPIA todo lo que tiene CuentaBancaria.
 * Solo tenemos que añadir o cambiar lo específico.
 */
class CuentaDebito extends CuentaBancaria
{
    /**
     * Implementación de extraer para DÉBITO.
     * Regla: No puedes sacar más de lo que tienes.
     */
    public function extraer(float $cantidad): bool
    {
        if ($cantidad <= 0) {
            echo "<div class='alert alert-danger py-2'>Error: Cantidad inválida.</div>";
            return false;
        }

        // Validación estricta: Saldo debe ser mayor o igual a cantidad
        if ($this->saldo >= $cantidad) {
            $this->saldo -= $cantidad;
            $this->numeroOperaciones++;
            echo "<div class='alert alert-warning py-2'>Extracción (Débito) de <strong>" . number_format($cantidad, 2) . " €</strong> realizada.</div>";
            return true;
        } else {
            echo "<div class='alert alert-danger py-2'>Error (Débito): Saldo insuficiente ({$this->saldo} €) para extraer {$cantidad} €.</div>";
            return false;
        }
    }

    /**
     * Sobrescribimos toString para cambiar el color y el título.
     * Usamos parent::toString() para aprovechar el código del padre y luego le añadimos cosas.
     */
    public function toString(): string
    {
        // Cambiamos el color azul (primary) por verde (success)
        return str_replace("bg-primary", "bg-success", parent::toString()) .
            "<div class='text-center text-muted small mb-2'>Tipo: Cuenta de Débito (Sin descubierto)</div>";
    }
}

/**
 * Clase CuentaCredito
 * -------------------
 * Esta cuenta permite tener saldo negativo hasta cierto límite.
 */
class CuentaCredito extends CuentaBancaria
{
    private float $limiteCredito; // Atributo extra solo para Crédito

    /**
     * Constructor propio
     * Necesitamos recibir el límite de crédito, además de lo normal.
     */
    public function __construct(string $numeroCuenta, string $nombreTitular, float $limiteCredito = 500.0)
    {
        // Llamamos al constructor del padre para que inicialice lo básico
        parent::__construct($numeroCuenta, $nombreTitular);
        $this->limiteCredito = $limiteCredito; // Inicializamos lo nuestro
    }

    /**
     * Implementación de extraer para CRÉDITO.
     * Regla: Puedes sacar hasta (Saldo + Límite).
     */
    public function extraer(float $cantidad): bool
    {
        if ($cantidad <= 0) {
            echo "<div class='alert alert-danger py-2'>Error: Cantidad inválida.</div>";
            return false;
        }

        // El dinero real disponible es lo que tienes MÁS lo que el banco te presta.
        // Ejemplo: Tienes 0€, Límite 500€. Puedes sacar 500€. (Saldo final -500€).
        if (($this->saldo + $this->limiteCredito) >= $cantidad) {
            $this->saldo -= $cantidad;
            $this->numeroOperaciones++;
            echo "<div class='alert alert-warning py-2'>Extracción (Crédito) de <strong>" . number_format($cantidad, 2) . " €</strong> realizada.</div>";
            return true;
        } else {
            echo "<div class='alert alert-danger py-2'>Error (Crédito): Límite de crédito excedido. Saldo: {$this->saldo} €, Límite: {$this->limiteCredito} €.</div>";
            return false;
        }
    }

    public function toString(): string
    {
        // Personalizamos para mostrar el límite
        $html = parent::toString();
        // Añadimos una línea extra con el límite
        $limiteHtml = "<li class='list-group-item'><strong>Límite Crédito:</strong> " . number_format($this->limiteCredito, 2) . " €</li>";
        $html = str_replace("</ul>", $limiteHtml . "</ul>", $html);
        $html = str_replace("bg-primary", "bg-warning text-dark", $html); // Color amarillo
        return $html . "<div class='text-center text-muted small mb-2'>Tipo: Cuenta de Crédito</div>";
    }
}

// =======================================================================================
// PRUEBAS
// =======================================================================================

echo "<body class='bg-light'><div class='container mt-5'>";
echo "<h1 class='mb-4 text-center text-primary'>Pruebas Ejercicio 09: Herencia y Abstracción</h1>";

// 1. Crear Cuentas (Polimorfismo: Ambas son CuentasBancarias)
$cDebito = new CuentaDebito("ES-DEBITO-001", "Usuario Débito");
$cCredito = new CuentaCredito("ES-CREDITO-001", "Usuario Crédito", 300); // Límite 300

echo "<div class='row'><div class='col-md-6'>";
echo $cDebito->toString();
echo "</div><div class='col-md-6'>";
echo $cCredito->toString();
echo "</div></div>";

// 2. Ingresos iniciales
echo "<h3 class='mt-4'>Ingresos Iniciales</h3>";
$cDebito->depositar(100);
$cCredito->depositar(100);

// 3. Pruebas de Extracción
echo "<h3 class='mt-4'>Pruebas de Extracción</h3>";

echo "<div class='card p-3 mb-3 bg-white'>";
echo "<h5>Caso 1: Extracción válida</h5>";
$cDebito->extraer(50); // Queda 50
$cCredito->extraer(50); // Queda 50
echo "</div>";

echo "<div class='card p-3 mb-3 bg-white'>";
echo "<h5>Caso 2: Extracción que supera saldo pero no límite (Solo Crédito)</h5>";
// Débito tiene 50. Intentamos sacar 100. Debe fallar.
$cDebito->extraer(100);
// Crédito tiene 50. Límite 300. Intentamos sacar 100. Debe dejar (Saldo -50).
$cCredito->extraer(100);
echo "</div>";

echo "<div class='card p-3 mb-3 bg-white'>";
echo "<h5>Caso 3: Extracción que supera límite (Crédito)</h5>";
// Crédito tiene -50. Límite 300. Disponible real: 250. Intentamos sacar 300. Debe fallar.
$cCredito->extraer(300);
echo "</div>";

// 4. Transferencias
echo "<h3 class='mt-4'>Pruebas de Transferencia</h3>";
// Transferir de Crédito (Saldo -50) a Débito (Saldo 50).
// Crédito puede endeudarse más hasta -300.
$cCredito->transferir(100, $cDebito);

echo "<h3 class='mt-4'>Estado Final</h3>";
echo "<div class='row'><div class='col-md-6'>";
echo $cDebito->toString();
echo "</div><div class='col-md-6'>";
echo $cCredito->toString();
echo "</div></div>";

echo "</div></body>";
?>

</html>