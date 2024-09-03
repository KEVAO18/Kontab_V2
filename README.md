<p align="center">
  <img src="assets/img/banner.png" />
</p>

<p align="center">
  <img alt="Static Badge" src="https://img.shields.io/badge/Javascript-343131?logo=javascript">
  <img alt="Static Badge" src="https://img.shields.io/badge/Bootstrap-8A2BE2?style=plastic&logo=bootstrap&logoColor=white">
  <img alt="Static Badge" src="https://img.shields.io/badge/PHP_version_8.2-55679C?style=plastic&logo=php&logoColor=white">
  <img alt="Static Badge" src="https://img.shields.io/badge/CSS-3FA2F6?logo=css3">
  <img alt="Static Badge" src="https://img.shields.io/badge/MySQL-FF9100?style=plastic&logo=mysql&logoColor=white">
  <img alt="Static Badge" src="https://img.shields.io/badge/HTML-FFF5E4?style=plastic&logo=html5">

</p>

# KONTAB 2

Sistema contable creado para empresas pequeñas y medianas que necesitan mantener sus cuentas en orden

## Menú

- [Manual de Uso](#manual-de-uso)
  - [Configuraciones Iniciales](#configuraciones-iniciales)
  - [Primeros Pasos](#primeros-pasos-en-kontab-2)
    - [Administracion de caja mayor](#administracion-de-caja-mayor)
    - [Facturación](#facturación)
    - [Registro de Clientes](#registro-de-clientes)
    - [Control de Stock](#control-de-stock)
- [SQL](#sql)
  - [Base de datos](#base-de-datos)
  - [Modelos graficos](#modelos-graficos)
  
## Manual de Uso

### Configuraciones Iniciales

Para comenzar descarga nuestra ultima version para poder manipularlo y cambiarlo, seguido de esto entraremos a nuestra copia y iniciamos con la configuración:

- ingresaremos al archivo .env en el cual se encuentran los principales campos a configurar

  1. En este cambiaremos los campos con información acerca de tu negocio

     - **NEGOCIO_NAME** (Nombre de tu negocio)

     - **NEGOCIO_EMAIL** (Correo de contacto de tu negocio)

     - **NEGOCIO_NIT** (N° de registro de tu negocio)

     - **NEGOCIO_DIRECCION** (Dirección física o localización de tu negocio)

     - **NEGOCIO_TELEFONO** (N° de Teléfono o Celular de tu negocio)

     - **NEGOCIO_REGIMEN** (Tipo de regimen de la empresa)

  2. Lo siguiente es cambiar la ubicación de tu proyecto en tu servidor, en el campo **PAGE_SERVE** debes cambiar el contenido por la tuya la cual por defecto puede ser **tudominio.com/**

  3. Por ultimo la configuración de la **BD**, para esta tenemos que cambiar los siguientes campos:
     - **DB_NAME** (Nombre de la BD por defecto es "**kontabapi**")
     - **DB_USER** (Nombre del usuario de la BD por defecto es "**root**")
     - **DB_PASS** (Contraseña del usuario que usa la BD no tiene una por defecto)
     - **DB_HOST** (Nombre o localización el host de la BD este es "**localhost**" por defecto)
     - **DB_CHARSET** (La codificación de la base de datos es "**utf8mb4** "por defecto)

### Primeros pasos en Kontab 2

Kontab es un sistema contable que pone la organización en tu negocio de una forma mas sencilla, de esta manera el comenzar será mas sencillo, para iniciar tenemos la distribución de

#### Administracion de caja mayor

- Tabla de Ingresos

- Tabla de egresos

- Tabla de totales, Esta tabla es la unión de las tablas: ingresos y egresos

- ingreso nuevo, es un nuevo ingreso o egreso (tipo, Concepto o asunto, monto)

#### Facturación

- Facturas
- Ventas Diarias

#### Registro de Clientes

- Tabla de Clientes
- Nuevo Cliente
  - El documento
  - Nombre
  - Dirección
  - Ciudad
  - Teléfono
  - Correo
  - Estado

#### Control de Stock

- Tabla de Productos Ingresados
- Tabla de Stock
- Nuevo Producto
  - Código ó Id del producto
  - Nombre del producto
  - precio del producto
- Ingreso de productos
  - Id
  - Cantidad

Lo primero será ingresar los clientes al sistema, del cual necesitáremos los datos anteriormente nombrados (Documento, Nombre, Dirección, Ciudad, Teléfono, Correo, Estado), luego los productos que posee la tienda, para este necesitas el id ó código del producto, Nombre del producto y precio del producto y por ultimo ingresar la cantidad que posee la tienda de cada producto (Id o código y cantidad)

Luego de esto ya podrás usar el sistema contable con normalidad ya que sin estos datos el no puede facturar o generar ninguna compra y felicidades, tu sistema contable integrado Kontab versión 2 ya esta funcionando

### Base de Datos

- #### SQL

    ```sql
    -------------------------------------------
    --     creacion de la base de datos      --
    -------------------------------------------

    CREATE DATABASE kontabapi;
    USE kontabapi;

    -------------------------------------------
    --        creacion de las tablas         --
    -------------------------------------------

    create table totales(

        -- campos: id, tipo, fecha, concepto, monto
        id int(11) auto_increment not null,
        tipo tinyint(1) not null,
        fecha timestamp not null 
        DEFAULT current_timestamp() 
        ON UPDATE current_timestamp(),
        concepto varchar(100) not null,
        monto double not null,

        -- primarias, foraneas e indices
        CONSTRAINT pk_totales PRIMARY KEY (id),

        INDEX (fecha)
    );

    create table productos(

        -- campos: id, nombre, precio, stock,
        id varchar(10) NOT NULL,
        nombre varchar(100) NOT NULL,
        precio int(8) NOT NULL,
        stock int(11) NOT NULL,

        -- primarias, foraneas e indices
        CONSTRAINT pk_productos PRIMARY KEY (id),

        INDEX (nombre)
    );

    create table entradas(

        -- campos: id, indice, nombre, fecha, cantidad
        id int(11) auto_increment not null,
        indice varchar(10) not null,
        nombre varchar(100) not null,
        fecha TIMESTAMP NOT NULL 
        DEFAULT current_timestamp() 
        ON UPDATE current_timestamp(),
        cantidad int(11) NOT NULL,

        -- primarias, foraneas e indices
        CONSTRAINT pk_entradas PRIMARY KEY (id),

        CONSTRAINT fk_nombre_de_producto_entrada
        FOREIGN KEY (`nombre`) 
        REFERENCES `productos` (`nombre`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE,

        CONSTRAINT fk_indice_de_producto_entrada
        FOREIGN KEY (`indice`) 
        REFERENCES `productos` (`id`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE,

        INDEX (nombre),
        INDEX (indice)
    );

    create table clientes(

        -- campos: id, documento, nombre, 
        -- direccion, ciudad, telefono, 
        -- correo, estado
        id int(11) auto_increment NOT NULL,
        documento varchar(13) NOT NULL,
        nombre varchar(100) NOT NULL,
        direccion varchar(100) NOT NULL,
        ciudad varchar(80) NOT NULL,
        telefono varchar(50) NOT NULL,
        correo varchar(100) NOT NULL,
        estado tinyint(1) NOT NULL,

        -- primarias, foraneas e indices
        constraint pk_clientes primary key (id),

        INDEX documento (documento),
        INDEX nombre (nombre),
        INDEX correo (correo),
        INDEX estado (estado)
    );

    create table facturas(

        -- campos: id, cliente, fechaEntrega, 
        -- fechaVencimiento, tipoPago, subtotal, 
        -- total, observaciones, estado
        id varchar(6) NOT NULL,
        cliente varchar(13) NOT NULL,
        fechaEntrega datetime NOT NULL,
        fechaVencimiento date NOT NULL,
        tipoPago tinyint(4) NOT NULL,
        subtotal double NOT NULL,
        total double NOT NULL,
        observaciones text NOT NULL,
        estado tinyint(1) NOT NULL,

        -- primarias, foraneas e indices
        constraint pk_facturas primary key(id),

        CONSTRAINT fk_documento_de_clientes_facturas
        FOREIGN KEY (`cliente`) 
        REFERENCES `clientes` (`documento`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE,

        INDEX (cliente)
    );

    create table cobros(

        -- campos: id, codigoF, cliente, recaudo, fechaCobro
        id int(11) auto_increment NOT NULL,
        codigoF varchar(6) NOT NULL,
        cliente varchar(13) NOT NULL,
        recaudo double NOT NULL,
        fechaCobro timestamp NOT NULL 
        DEFAULT current_timestamp() 
        ON UPDATE current_timestamp(),

        -- primarias, foraneas e indices
        constraint pk_cobros primary key(id),

        CONSTRAINT  fk_id_factura_cobro
        FOREIGN KEY (`codigoF`) 
        REFERENCES `facturas` (`id`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE,

        INDEX (codigoF)
    );

    create table ventas(

        -- campos: id, codigoF, codigoP, producto, unidades
        id int(11) auto_increment NOT NULL,
        codigoF varchar(6) NOT NULL,
        codigoP varchar(10) NOT NULL,
        producto varchar(100) NOT NULL,
        unidades int(6) NOT NULL,

        -- primarias, foraneas e indices
        constraint pk_ventas primary key (id),

        CONSTRAINT fk_codigo_de_fcatura_ventas
        FOREIGN KEY (`codigoF`) 
        REFERENCES `facturas` (`id`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE,

        CONSTRAINT fk_nombre_de_producto_ventas
        FOREIGN KEY (`producto`) 
        REFERENCES `productos` (`nombre`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE,

        CONSTRAINT fk_codigo_de_producto_ventas
        FOREIGN KEY (`codigoP`) 
        REFERENCES `productos` (`id`) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE,

        INDEX (codigoF),
        INDEX (codigoP),
        INDEX (producto)
    );
    ```

- #### Modelos Graficos

  - Totales DB

  | Id (Primaria) | Tipo | Fecha (Índice) | Concepto | Monto |
  | :---: | :------: | :--------: | :------: | :-----: |
  | int  | tinyInt | timestamp | varchar | double |
  | 11  | 1 | - | 100 | - |

  - Entradas DB

  | Id (Primaria) | Índice (Índice) | Nombre (Índice) | Fecha | Cantidad |
  | :---: | :------: | :--------: | :------: | :-----: |
  | int  | varchar | varchar | timestamp | int |
  | 11  | 10 | 100 | - | 11 |

  - Productos DB

  | Id (Primaria) | Nombre (Índice) | Precio | Stock |
  | :-----------: | :-------------: | :----: | :---: |
  |    varchar    |     varchar     | double |  int  |
  |      10       |       100       |   8    |  11   |

  - Clientes DB

  | Id (Primaria) | Documento (Índice) | Nombre (Índice) | Dirección | Ciudad  | Teléfono | Correo  | Estado  |
  | :-----------: | :----------------: | :-------------: | :-------: | :-----: | :------: | :-----: | :-----: |
  |      int      |      varchar       |     varchar     |  varchar  | varchar | varchar  | varchar | tinyInt |
  |      11       |         13         |       100       |    100    |   80    |    50    |   100   |    1    |

  - Cobros DB

  | Id (Primaria) | CodigoF (Índice) | Cliente | Recaudo | fechaCobro |
  | :-----------: | :--------------: | :-----: | :-----: | :--------: |
  |      int      |     varchar      | varchar | double  | timestamp  |
  |      11       |        6         |   13    |    -    |     -      |

  - Venta DB

  | Id (Primaria) | CodigoF (Índice) | CodigoP (Índice) | Productos (Índice) | Unidades |
  | :-----------: | :--------------: | :--------------: | :----------------: | :------: |
  |      int      |     varchar      |     varchar      |      varchar       |   int    |
  |      11       |        6         |        10        |        100         |    6     |

  - Facturas DB

  | Id (Primaria) | Cliente (Índice) | FechaEntrega | FechaVencimiento | TipoPago | Subtotal | Total  | Observaciones | Estado  |
  | :-----------: | :--------------: | :----------: | :--------------: | :------: | :------: | :----: | :-----------: | :-----: |
  |    varchar    |     varchar      |   datetime   |       date       | tinyInt  |  double  | double |     text      | tinyInt |
  |       6       |        13        |      -       |        -         |    4     |    -     |   -    |       -       |    1    |
