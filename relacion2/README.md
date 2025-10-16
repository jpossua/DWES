<center>

# EJERCICIOS PHP
</center>

-----

<center> 

## RELACIÓN II - FORMULARIOS, ESTILO Y VALIDACIÓN
</center>

-----

**1- Crea un formulario de entrada para una calculadora en PHP a partir de dos números enteros y un operador. Para la introducción de datos, utilizaremos dos campos de texto y un select que contenga como opción diferentes operadores : +,-,*,/,%. Probaremos el envío mediante los métodos GET y POST y apreciaremos las diferencias.**

**Repasa en w3schools el formato de un formulario en html y de los campos más habituales.**

[Ir a `Ejercicio01.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio01.php)

-----

**2-Vamos a introducir el uso de un framework de CSS, concretamente, de Bootstrap 5, para formatear el frontend. Retoma el archivo index.html de la relación 1, y aplica un estilo personalizado a tu gusto con Bootstrap 5.**

[Ir a `Ejercicio02`](https://github.com/jpossua/DWES/blob/main/relacion1/index.html)

-----

**3-  Vamos a realizar lo propio con esta relación, y un super-index para todas las relaciones que vamos a realizar. El “super-index” tendrá una barra de navegación, una card por cada relación y un footer. Formatea con Bootstrap a tu gusto, experimentando diversas posibilidades hasta dar con tu preferida.**

[Ir a `Ejercicio03`](https://github.com/jpossua/DWES/blob/main/index.html)

-----

**4- Retoma el ejercicio 4 de la relación anterior y aplícale estilos con clases de Bootstrap 5 (experimentaremos así las listas numeradas)**

[Ir a `Ejercicio04.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio04.php)

-----

 **5- Haz lo propio con el ejercicio 5 de la relación anterior, y el formato tabla.**

**Añade posteriormente, y solo a modo de prueba, algunos components como buttons, spinners, lists, etc...**

[Ir a `Ejercicio05.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio05.php)

-----

 **6- Crea una tabla de datos, simulando un listado de personas (nombre, apellido, correo, teléfono, etc…) en PHP con formateo de Bootstrap 5. Experimenta con varios de ellos y quédate con el que prefieras**

**Se recomienda utilizar la herramienta [Mockaroo](https://www.mockaroo.com/) para generar los datos de prueba**

[Ir a `Ejercicio06.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio06.php)

-----

**7- Monta en un documento PHP un formulario para introducir 2 números formateado con el framework Bootstrap 5**

[Ir a `Ejercicio07.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio07.php)

-----

**8- Retoma el ejercicio 1 de esta relación y aplícale un formateo más estético con Bootstrap 5**

**Experimenta la de validación html. Explora sus funcionalidades, defectos y característica**

[Ir a `Ejercicio08.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio08.php)

-----

 **9- Ahora vamos a añadir el cálculo en el propio documento, para lo que habrá que incluir un control de si ingresamos en él para rellenar los datos, o como resultado del envío del formulario.**

[Ir a `Ejercicio09.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio09.php)

-----

**10- Haz otra versión que separe en un documento html la captación de datos, y en otro, el cálculo y la edición de resultados. Hazlo así en los siguientes ejercicios hasta que se indique otra cosa.**

**Validaremos los datos solo con controles html en el formulario.**

[Ir a `Ejercicio10.html`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio10.html)
[Ir a `Ejercicio10.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio10.php)

-----

**11- Re-formatea con Bootstrap el ejercicio 7 de la relación anterior y experimenta validaciones de los datos de entrada con html.**

[Ir a `Ejercicio11.html`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio11.html)
[Ir a `Ejercicio11.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio11.php)

-----

**12-  Retoma el ejercicio 9 de la relación anterior y añade el nombre y el correo de la persona a la cual se le va a calcular la calificación. Cambia las notas por datos de entrada (inicial, primera, segunda y tercera).**

**Formatea con Bootstrap y valida los datos de entrada con html. Prueba con datos de entrada erróneos.¿crees que es suficiente con este control?**

*No, la validación únicamente con HTML5 no es suficiente.*

*Aunque los atributos como `required`, `type="email"`, `min`, `max`, `step` y `pattern` (en campos de texto) mejoran la experiencia del usuario y evitan errores comunes, esta validación se realiza solo en el navegador y puede ser fácilmente omitida. Por ejemplo:*

- *Un usuario puede desactivar JavaScript (aunque la validación HTML5 no depende de JS, sí se puede saltar modificando el DOM o usando herramientas como Postman).*
- *Los navegadores ignoran el atributo pattern en `<input type="email">`, por lo que no se aplica una expresión regular personalizada.*
- *No se valida la lógica del negocio (por ejemplo, que la nota final no sea negativa o que el correo pertenezca a un dominio permitido).*

*Por seguridad y robustez, siempre debe complementarse con validación en el lado del servidor (por ejemplo, en PHP), que nunca puede ser evitada por el cliente.*

[Ir a `Ejercicio12.html`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio12.html)
[Ir a `Ejercicio12.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio12.php)

-----

**13- - Vuelve a versionar el ejercicio 9 de la relación anterior, pero en este caso, valida utilizando técnicas de Vanilla JavaScript.**

[Ir a `Ejercicio13.html`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio13.html)
[Ir a `Ejercicio13.js`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio13.js)
[Ir a `Ejercicio13.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio13.php)

-----

**14- Haremos lo mismo que en el caso anterior pero con el ejercicio 12 de la relación 1, y acompañaremos la salida numérica con una salida gráfica utilizando una progress bar**

[Ir a `Ejercicio14.html`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio14.html)
[Ir a `Ejercicio14.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio14.php)

-----

**15- Retomamos el ejercicio 13 de la relación anterior, formateamos la entrada con Bootstrap, la validamos con JavaScript, pero utilizaremos un mismo documento para el formulario, el cálculo y la visualización de resultados (juntaremos, por tanto, funcionalidades propias del front y del back). ¿Te parece recomendable hacerlo así?**

*No, no es recomendable hacerlo así en aplicaciones reales o medianamente complejas, aunque sí puede ser aceptable en contextos educativos o ejercicios simples.*

***<u>Ventajas</u>***
- ***Sencillez***: *todo en un solo archivo, fácil de entender para principiantes.*
- ***Rapidez***: *ideal para prototipos, ejercicios académicos o scripts pequeños.*
- ***Sin redirecciones***: *el usuario ve el formulario y el resultado en la misma página.*

***<u>Desventajas</u>***
- ***Mezcla de responsabilidades***: *El mismo archivo maneja presentación (HTML/CSS), lógica de cliente (JavaScript) y lógica de servidor (PHP). Esto viola principios como la separación de concernimientos.*
- ***Dificultad de mantenimiento***: *Si el proyecto crece, el archivo se vuelve largo, confuso y difícil de depurar o modificar.*
- ***Problemas de seguridad***: *Es más fácil cometer errores (como inyecciones XSS) si no separamos claramente la entrada, el procesamiento y la salida.*
- ***Reutilización limitada***: *No puedes reutilizar la lógica de cálculo en otra parte (por ejemplo, en una API) sin duplicar código.*
- ***Experiencia de usuario pobre***: *Cada cálculo requiere recargar la página completa, mientras que con una arquitectura moderna (frontend + backend separados) podrías usar AJAX y evitar recargas.*

[Ir a `Ejercicio15.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio15.php)

-----

**16- Lo mismo con el 15 y 16 de la relación anterior unificándolos en un único programa, pero separando la captación de datos del proceso. En el formulario de entrada se nos pedirá qué queremos, si dictaminar únicamente si el número de entrada es primo o no ó por el contrario, mostrar los divisores (solo podremos elegir una de las dos opciones)**

[Ir a `Ejercicio16.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio16.php)

-----

**17- Lo mismo con el 17, pero incluiremos dos casillas de verificación, para que se pueda elegir si se desea calcular el cociente, el resto, o el cociente y el resto (ambas opciones)**

[Ir a `Ejercicio17.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio17.php)

-----

 **18- Repetiremos el ejercicio 19 de la relación anterior, pero con formulario formateado en Bootstrap**


[Ir a `Ejercicio18.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio18.php)

-----

**19- Igual con el 20, pero como el programa podrá convertir a binario, octal o hexadecimal, se incluirá en el formulario un campo select. Utiliza match en lugar de switch para la bifurcación múltiple. ¿puedes observar alguna ventaja del uso de match?**

*Sí varias:*
1. *Más conciso y legible: no necesitas `break`.*
2. *Devuelve un valor: se puede asignar directamente a una variable.* 
3. *Menos propenso a errores: evita caídas accidentales (`fall-through`).*
4. *Moderno y funcional: se integra mejor con expresiones.*

[Ir a `Ejercicio19.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio19.php)

-----

**20- Retocamos el ejercicio anterior, incluyendo en el campo select una indicación de “Selecciona operación” para asegurarnos que se despliega y elige opción conscientemente. Hacer lo mismo en el ejercicio de la calculadora**

[Ir a `Ejercicio20.php`](https://github.com/jpossua/DWES/blob/main/relacion2/Ejercicio20.php)
