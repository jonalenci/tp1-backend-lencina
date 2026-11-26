TP1 – FICHA 1: TIENDA Estudiante: Lencina Carrera: Programador y
Diseñador Web Profesional (IAC Paraná)

DESCRIPCIÓN DEL DOMINIO Y ALCANCE

El sistema representa una tienda que administra sus clientes,
proveedores y productos.

Cada proveedor puede suministrar muchos productos, mientras que cada
producto pertenece a un único proveedor. Los clientes tienen distintos
tipos y, según su clasificación, reciben descuentos sobre el precio de
los productos.

El proyecto se divide en dos partes: - Frontend: desarrollado con HTML,
CSS y JavaScript. - Backend: desarrollado con PHP y programación
orientada a objetos.

CRITERIOS TÉCNICOS APLICADOS

-   Programación orientada a objetos (POO): se utilizan clases, objetos,
    constructores, métodos y atributos.
-   Herencia: las clases Proveedor y Cliente heredan de la clase base
    Persona.
-   Encapsulamiento: los atributos utilizan los niveles de visibilidad
    indicados en el diagrama UML.
-   Getters y setters: cada atributo cuenta con métodos de acceso y
    modificación.
-   Validaciones: los datos se controlan en el frontend mediante
    JavaScript y en el backend mediante PHP.
-   Consistencia de nombres: las clases, atributos y métodos respetan
    los nombres definidos en la ficha, sin tildes ni eñes.

MODELO DE CLASES Y RELACIONES

1.  PERSONA (clases/Persona.php)

Es la clase base del sistema. Contiene los atributos protegidos: -
nombre - apellido - email

Incluye constructor, getters, setters y el método describir(): string.

Los setters validan que el nombre y apellido no estén vacíos y que el
email tenga un formato válido. Las clases hijas heredan sus atributos y
métodos.

2.  PROVEEDOR (clases/Proveedor.php)

Hereda de Persona mediante extends Persona.

Atributos propios: - proveedor_id - empresa - rubro

Incluye constructor, getters, setters y sobrescribe el método
describir().

Representa a los proveedores que suministran productos a la tienda.

3.  CLIENTE (clases/Cliente.php)

Hereda de Persona.

Atributos propios: - cliente_id - tipoCliente - ciudad

Incluye constructor, getters, setters y sobrescribe describir().

También contiene el método calcularPrecioFinal(float precio): float, que
aplica automáticamente el descuento correspondiente según el tipo de
cliente.

4.  PRODUCTO (clases/Producto.php)

Es una clase independiente.

Atributos: - producto_id - nombre - categoria - precio - stock -
proveedor_id

Incluye constructor, getters y setters para todos sus atributos.

El atributo proveedor_id permite relacionar cada producto con su
proveedor correspondiente.

RELACIONES ENTRE LAS CLASES

-   Herencia: Proveedor y Cliente heredan de Persona.
-   Agregación: un Proveedor suministra uno o muchos Producto.
-   Asociación: cada Producto guarda el identificador de su proveedor
    mediante proveedor_id.

REGLA DE NEGOCIO: DESCUENTOS

El sistema calcula el precio final de acuerdo con el tipo de cliente:

-   minorista: 0 % de descuento.
-   mayorista: 10 % de descuento.
-   vip: 15 % de descuento.

Ejemplo con un producto de $10.000: - Cliente minorista: $10.000. -
Cliente mayorista: $9.000. - Cliente VIP: $8.500.

El cálculo se realiza en el método Cliente::calcularPrecioFinal(float
precio) del backend.

VALIDACIONES IMPLEMENTADAS

-   Nombre del producto: no puede estar vacío.
-   Precio: debe ser mayor a 0.
-   Stock: debe ser un número entero mayor o igual a 0.
-   Tipo de cliente: únicamente puede ser minorista, mayorista o vip.
-   Email: debe tener un formato válido.
-   Nombre y apellido: no pueden estar vacíos.
-   Identificadores: deben respetar el tipo de dato entero
    correspondiente.

Las validaciones se realizan en el formulario del frontend mediante
JavaScript y en los setters del backend mediante PHP. Los datos
inválidos generan errores o excepciones.

VISTAS Y FUNCIONAMIENTO

FRONTEND

El frontend utiliza HTML, CSS y JavaScript. Incluye: - Listado de
productos, mostrando el nombre de su proveedor mediante proveedor_id. -
Buscador de productos por nombre. - Filtro de productos por categoría. -
Listado de proveedores. - Filtro de proveedores por rubro. - Formulario
de alta de productos con validaciones.

Los arreglos de objetos JavaScript utilizan los mismos nombres de
atributos definidos en el diagrama de clases, con al menos 8 registros
por arreglo.

BACKEND

El backend utiliza PHP y programación orientada a objetos.

index.php: - Incluye las clases del proyecto. - Instancia al menos 4
objetos de la clase independiente Producto. - Instancia al menos 3
objetos de cada clase hija: Proveedor y Cliente. - Muestra los listados
de objetos. - Ejecuta los métodos describir(). - Presenta ejemplos del
cálculo de descuentos para los distintos tipos de clientes.

formulario.php: - Recibe los datos del formulario mediante el método
POST. - Valida los datos recibidos. - Utiliza los setters para controlar
los valores. - Crea un nuevo objeto de la clase independiente
Producto. - Muestra el resultado del alta o los errores
correspondientes.

ESTRUCTURA DEL PROYECTO

Repositorio Frontend: tp1-frontend-lencina/ frontend.html estilos.css
app.js

Repositorio Backend: tp1-backend-lencina/ clases/ Persona.php
Proveedor.php Cliente.php Producto.php index.php formulario.php
README.md

EJECUCIÓN EN LOCAL

OPCIÓN 1: SERVIDOR INTEGRADO DE PHP

Ubicar una terminal dentro de la carpeta raíz del proyecto backend y
ejecutar:

php -S localhost:8000

Luego abrir en el navegador: - Listado y pruebas de negocio:
http://localhost:8000/index.php - Formulario de alta (POST):
http://localhost:8000/formulario.php

Para visualizar el frontend, abrir frontend.html en el navegador o
utilizar Live Server desde Visual Studio Code.

OPCIÓN 2: XAMPP

1.  Copiar la carpeta tp1-backend-lencina dentro de C:.
2.  Iniciar el módulo Apache desde el panel de control de XAMPP.
3.  Ingresar en el navegador:
    http://localhost/tp1-backend-lencina/index.php
    http://localhost/tp1-backend-lencina/formulario.php
4.  Abrir el frontend desde su carpeta correspondiente.

CONCLUSIÓN

Este trabajo permite aplicar los conocimientos de HTML, CSS, JavaScript,
PHP y programación orientada a objetos mediante el desarrollo de un
sistema de gestión de una tienda.

Se implementan clases relacionadas mediante herencia, agregación y
asociación, validaciones de datos, formularios y reglas de negocio.

El proyecto constituye la primera etapa del desarrollo y deja organizada
la estructura necesaria para integrar el frontend y el backend en el
TP2.
