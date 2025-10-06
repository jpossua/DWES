<center>

# EJERCICIOS PHP
</center>

-----

<center> 

## RELACIÓN I - EJERCICIOS INICIALES
</center>

-----

**1- Haz un programa en PHP que muestre el mensaje “Hello world” de diferentes formas:**

  - Como **texto plano html**.
  - Como un **encabezado de nivel 2** html.
  - Como un párrafo con **estilo**: color, tipografía, alineación, etc.
  - Con un **salto de línea** entre "hello" y "world".
  - Añádele la información sobre la instalación php **`phpversion()`** y **`phpinfo()`**.
  - Investiga en la siguiente dirección como mostrar la **fecha y la hora del sistema** en el momento de la ejecución:
    [https://www.php.net/manual/es/function.date.php](https://www.php.net/manual/es/function.date.php).

[Ir a `Ejercicio01.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio01.php)

-----

**2- Haz un programa PHP que muestre un valor de ejemplo de cada tipo de dato escalar en php con `echo` utilizando la función **`var_dump()`**, y también con **`printf`** formateado. Prueba todas las posibilidades tal y como vienen descritas en: [https://www.w3schools.com/php/func\_string\_printf.asp](https://www.w3schools.com/php/func_string_printf.asp)**

  - `bool`
  - `int`
  - `float`
  - `string`

[Ir a `Ejercicio02.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio02.php)

-----

**3- Investiga qué y cuales son las ***superglobals*** en php ([https://www.php.net/manual/es/language.variables.superglobals.php](https://www.php.net/manual/es/language.variables.superglobals.php)), y haz un programa que muestre, en forma de **lista no numerada**, para `$_SERVER`:**

  - `DOCUMENT_ROOT`
  - `PHP_SELF`
  - `SERVER_NAME`
  - `SERVER_SOFTWARE`
  - `SERVER_PROTOCOL`
  - `HTTP_HOST`
  - `HTTP_USER_AGENT`
  - `REMOTE_ADDR`
  - `REMOTE_PORT`
  - `SCRIPT_FILENAME`
  - `REQUEST_URI`

**Prueba un volcado con **`var_dump($_SERVER)`** y también con **`print_r($_SERVER)`**. ¿Cuál es la diferencia?**

[Ir a `Ejercicio03.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio03.php)

-----

**4- En un programa PHP, declara un **array constante** en el que se almacenarán los días de la semana. Muestra por pantalla:**

  - **el ***primer dia*** de la semana**
  - ***todos los días*** **secuencialmente**
  - **lo mismo que el anterior, pero en formato de** ***lista numerada***

[Ir a `Ejercicio04.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio04.php)

-----

 **5- Crea un **array asociativo constante**, en el que utilices como clave el día de la semana, y como valor, la temperatura máxima de ese día en formato **real** (`float`). A continuación, muestra:**

  - **la ***temperatura del primer dia*** de la semana**
  - **la ***temperatura de todos los días***, secuencialmente**
  - **lo mismo que el anterior, pero en formato de** ***lista numerada***

[Ir a `Ejercicio05.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio05.php)

-----

 **6- Declara en un programa PHP una **clase `fruta`**, con dos atributos: `nombre` y `color`, y dos funciones, `set_name()` y `get_name()`. Declara e inicializa dos instancias: `apple` y `banana`, inicializa los nombres y muéstralos por pantalla.**

[Ir a `Ejercicio06.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio06.php)

-----

**7- Calcula la **nota final** de una persona a partir de la **media de dos notas** numéricas iniciales, y **descontando 0.25 por cada falta sin justificar**. Muestra el resultado por pantalla, indicando si la persona **aprueba o suspende**.**


[Ir a `Ejercicio07.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio07.php)

-----

**8- Crea en un script PHP dos **arrays asociativos paralelos**, uno con la **rúbrica de 4 calificaciones** (inicial, primera, segunda y tercera) y otro con las **notas particulares de una persona**. A continuación, computará la **nota final** de esa persona, y muéstrala por pantalla.**


[Ir a `Ejercicio08.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio08.php)

-----

 **9- En un programa PHP, valora a partir de los **3 lados de un triángulo** si es **equilátero, isósceles o escaleno**, y muestra esa valoración por pantalla.**

[Ir a `Ejercicio09.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio09.php)

-----


**10- Haz un programa PHP que resuelva una **ecuación de segundo grado** siempre que los resultados sean **reales**.**

[Ir a `Ejercicio10.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio10.php)

-----

**11- Mejora el intento anterior para que si alguno de los coeficientes a, b o c fuera 0, el programa gestione el cálculo de resultados de manera más adecuada:**

- **Si `a=0`, la ecuación no es de segundo grado, solo hay una raíz: `x =-c/b`.**

- **Si `b=0`, las raíces se calculan de manera más sencilla: `x1=-sqrt(-c/a)` y `x2=sqrt(-c/a)`.**

- **Si `c=0`, las raíces son, sacando factor común: `x(ax+b)=0`: `x1=0` y `x2=-b/a`.**

**Aparte de esta casuística, hay que evitar dividir por cero…. Resuelve toda estas posibilidades y refactoriza el código para que sea limpio y óptimo.**

[Ir a `Ejercicio11.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio11.php)

-----

**12- Realiza un programa php que, a partir de una nota numérica entera entre 1 y 10 devuelva:**

- **Sobresaliente si es 9 ó 10.**
- **Notable si es 7 u 8.**
- **Bien si es un 6.**
- **Suficiente si es un 5.**
- **Suspenso, si es 1,2,3 ó 4.**

[Ir a `Ejercicio12.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio12.php)

-----

**13- Haz un script PHP que calcule el **factorial** de un número natural.**

[Ir a `Ejercicio13.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio13.php)

-----

**14- Haz un programa PHP que calcule la ***suma de los n primeros números naturales***.**

[Ir a `Ejercicio14.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio14.php)

-----

**15- Haz un programa php que te diga si un número entero y positivo es primo o no**

[Ir a `Ejercicio15.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio15.php)

-----

**16- Haz un programa que muestre todos los divisores de un número entero y positivo. Irá mostrando cada número que se prueba y si resulta ser divisor, aparecerá marcado visiblemente, por ejemplo con otro color. Por ejemplo:**

**Divisores de 10:**
**<span style="color: red;">1</span> <span style="color: red;">2</span> 3 4 <span style="color: red;">5</span> 6 7 8 9 <span style="color: red;">10</span>**


[Ir a `Ejercicio16.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio16.php)

-----

**17- Haz un script en PHP que calcule la ***división de dos números naturales*** utilizando el ***algoritmo de Euclides para la división***.**

[Ir a `Ejercicio17.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio17.php)

-----

 **18- Haz un programa en PHP que calcule el ***máximo común divisor*** de dos números naturales utilizando el ***algoritmo de Euclides***.**


[Ir a `Ejercicio18.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio18.php)

-----

**19- Haz un script PHP en el que conviertas en ***binario*** un número natural.**

[Ir a `Ejercicio19.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio19.php)

-----

**20- Mejora el ejercicio anterior para que se pueda convertir a binario, octal o hexadecimal**

[Ir a `Ejercicio20.php`](https://github.com/jpossua/DWES/blob/main/relacion1/Ejercicio20.php)
