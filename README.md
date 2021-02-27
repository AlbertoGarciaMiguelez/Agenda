# Agenda Alberto García Miguélez

_El proyecto es una agenda donde puedes ver tus contactos personales, profesionales o ambos también da la opción de agregar, editar, ver y borrar los contactos que se almacenan en una base de datos._

## Instrucciones

El proyecto tiene un uso sencillo y intuitivo, primero tendremos que hacer la base de datos, colocar en el xampp/htdocs la carpeta que iniciar el servidor con el CMD(symfony server:start).

Luego colocar en el navegador localhost:8000/ que es lo que suele venir como predeterminado y ir navegando en la interfaz cada botón pone lo que hace.

El botón agregar añadirá datos a la base de datos.
El botón editar te permitirá cambiar los datos.
El botón borrar borrara los datos.
El botón ver te permitirá ver con mas detalles los datos.
Si pulsamos en alguna de las agendas nos dejara observar las mismas que dice cada titulo.



### Pre-requisitos

| XAMPP  | Symfony | CMD|
| -- | -- | -- |
| Carpeta en ruta de xampp | php bin/console doctrine:database:create(poner nombre contacto) | Ruta del proyecto|
| C:/xampp/htdocs | php bin/console doctrine:schema:update –force | symfony server:start |

### Instalación


_Colocar en la carpeta el proyecto en la ruta:_

```
C:/xampp/htdocs
```
_Crear la base de datos(poner nombre contacto)_

```
php bin/console doctrine:database:create
```

_Actualizarla_

```
php bin/console doctrine:schema:update –force
```
_Iniciar servidor(en la ruta al proyecto)_

```
symfony server:start
```
_Entrar(numero que salga por pantalla en el cmd por defecto 8000)_

```
localhost:8000/
```


_Con el botón agregar puedes crear los contactos en la base de datos para ir observando el funcionamiento del proyecto_

## Ejecutando las pruebas

_Si agregamos un contacto debería poder observarse en las agendas pertinentes y si editamos observaremos los cambios y al borrar deberia desaparecer._

## Tecnologías utilizadas:

* [Symfony](https://symfony.com/)
* PHP - Tipo de lenguaje utilizado mayoritariamente.
* [Visual Studio](https://visualstudio.microsoft.com/es/) - Aplicación para programar
* [XAMPP](https://www.apachefriends.org/es/index.html) - Usado para generar la base de datos

## Autor

* **Alberto García Miguélez** - *Trabajo Inicial*

## Licencia

Este proyecto está bajo la Licencia Apache 2.0

## Cómo contribuir al proyecto.

* Espero que os sirve de referencia a otros proyectos.
* No os olvidéis de compartir o acordaos de donde sacasteis la base.
* Si queréis contribuir podéis intentar ayudar a mejorar el código.
