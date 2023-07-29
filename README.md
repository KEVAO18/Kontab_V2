# KONTAB 2

Sistema contable creado para empresas pequeñas y medianas que necesitan mantener sus cuentas en orden

## Menú

- [Manual de Uso](#manual-de-uso)
  - [Configuraciones Iniciales](#configuraciones-iniciales)
  - [Primeros Pasos](#primeros-pasos-en-kontab-2)
    - [Contabilidad](#contabilidad)
    - [Facturación](#facturación)
    - [Registro de Clientes](#registro-de-clientes)
    - [Control de Stock](#control-de-stock)
  - [SQL](#sql)
    - [Totales](#totales-db)
    - [Entradas](#entradas-db)
    - [Productos](#productos-db)
    - [Clientes](#clientes-db)
    - [Cobros](#cobros-db)
    - [Venta](#venta-db)
    - [Facturas](#facturas-db)
  
## Manual de Uso

### Configuraciones Iniciales

Para comenzar has un **fork** o descarga nuestra ulyima vercion [aqui](https://github.com/KEVAO18/Kontab_V2/releases/tag/Kontab_Public_re) en nuestro servidor para poder manipularlo y cambiarlo, seguido de esto entraremos a nuestra copia y iniciamos con la configuración:

Para comenzar has un **fork** o descarga nuestra ultima version [aqui](https://github.com/KEVAO18/Kontab_V2/releases/tag/Kontab_Public_re) en nuestro servidor para poder manipularlo y cambiarlo, seguido de esto entraremos a nuestra copia y iniciamos con la configuración:

- ingresaremos al archivo .env en el cual se encuentran los principales campos a configurar

  1. En este cambiaremos los campos con información acerca de tu negocio

     - **NEGOCIO_NAME** (Nombre de tu negocio)

     - **NEGOCIO_EMAIL** (Correo de contacto de tu negocio)

     - **NEGOCIO_NIT** (N° de registro de tu negocio)

     - **NEGOCIO_DIRECCION** (Dirección física o localización de tu negocio)

     - **NEGOCIO_TELEFONO** (N° de Teléfono o Celular de tu negocio)

  2. Lo siguiente es cambiar la ubicación de tu proyecto en tu servidor, en el campo **PAGE_SERVE** debes cambiar el contenido por la tuya la cual por defecto puede ser **tudominio.com/Kontab2**

  3. Por ultimo la configuración de la **BD**, para esta tenemos que cambiar los siguientes campos:
     - **DB_NAME** (Nombre de la BD por defecto es "**kontabapi**")
     - **DB_USER** (Nombre del usuario de la BD por defecto es "**root**")
     - **DB_PASS** (Contraseña del usuario que usa la BD no tiene una por defecto)
     - **DB_HOST** (Nombre o localización el host de la BD este es "**localhost**" por defecto)
     - **DB_CHARSET** (La codificación de la base de datos es "**utf8mb4** "por defecto)

### Primeros pasos en Kontab 2

Kontab es un sistema contable que pone la organización en tu negocio de una forma mas sencilla, de esta manera el comenzar será mas sencillo, para iniciar tenemos la distribución de

#### Contabilidad

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

#### sql:
- primer paso: crear la base de datos

  ```sql
    CREATE DATABASE kontabapi;
  ```

- luego pasamos a crear las tablas
  - primero la tabla totales

    ```sql
      CREATE TABLE `kontabapi`.`totales` (
        `id` int(11) NOT NULL,
        `tipo` tinyint(1) NOT NULL,
        `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `concepto` varchar(100) NOT NULL,
        `monto` double NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ```

  - la tabla entradas

    ```sql
      CREATE TABLE `kontabapi`.`entradas` (
        `id` int(11) NOT NULL,
        `indice` varchar(10) NOT NULL,
        `nombre` varchar(100) NOT NULL,
        `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `cantidad` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ```

  - la tabla productos

    ```sql
      CREATE TABLE `kontabapi`.`productos` (
        `id` varchar(10) NOT NULL,
        `nombre` varchar(100) NOT NULL,
        `precio` int(8) NOT NULL,
        `stock` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ```

  - la tabla clientes

    ```sql
      CREATE TABLE `kontabapi`.`clientes` (
        `id` int(11) NOT NULL,
        `documento` varchar(13) NOT NULL,
        `nombre` varchar(100) NOT NULL,
        `direccion` varchar(100) NOT NULL,
        `ciudad` varchar(80) NOT NULL,
        `telefono` varchar(50) NOT NULL,
        `correo` varchar(100) NOT NULL,
        `estado` tinyint(1) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ```

  - la tabla cobros

    ```sql
      CREATE TABLE `kontabapi`.`cobros` (
        `id` int(11) NOT NULL,
        `codigoF` varchar(6) NOT NULL,
        `cliente` varchar(13) NOT NULL,
        `recaudo` double NOT NULL,
        `fechaCobro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ```

  - la tabla ventas

    ```sql
      CREATE TABLE `ventas` (
        `id` int(11) NOT NULL,
        `codigoF` varchar(6) NOT NULL,
        `codigoP` varchar(10) NOT NULL,
        `producto` varchar(100) NOT NULL,
        `unidades` int(6) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ```

  - la tabla facturas

    ```sql
      CREATE TABLE `kontabapi`.`facturas` (
        `id` varchar(6) NOT NULL,
        `cliente` varchar(13) NOT NULL,
        `fechaEntrega` datetime NOT NULL,
        `fechaVencimiento` date NOT NULL,
        `tipoPago` tinyint(4) NOT NULL,
        `subtotal` double NOT NULL,
        `total` double NOT NULL,
        `observaciones` text NOT NULL,
        `estado` tinyint(1) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    ```

- ##### Totales DB

| Id (Primaria) | Tipo | Fecha (Índice) | Concepto | Monto |
| :---: | :------: | :--------: | :------: | :-----: |
| int  | tinyInt | timestamp | varchar | double |
| 11  | 1 | - | 100 | - |

- ##### Entradas DB

| Id (Primaria) | Índice (Índice) | Nombre (Índice) | Fecha | Cantidad |
| :---: | :------: | :--------: | :------: | :-----: |
| int  | varchar | varchar | timestamp | int |
| 11  | 10 | 100 | - | 11 |

- ##### Productos DB

| Id (Primaria) | Nombre (Índice) | Precio | Stock |
| :-----------: | :-------------: | :----: | :---: |
|    varchar    |     varchar     | double |  int  |
|      10       |       100       |   8    |  11   |

- ##### Clientes DB

| Id (Primaria) | Documento (Índice) | Nombre (Índice) | Dirección | Ciudad  | Teléfono | Correo  | Estado  |
| :-----------: | :----------------: | :-------------: | :-------: | :-----: | :------: | :-----: | :-----: |
|      int      |      varchar       |     varchar     |  varchar  | varchar | varchar  | varchar | tinyInt |
|      11       |         13         |       100       |    100    |   80    |    50    |   100   |    1    |

- ##### Cobros DB

| Id (Primaria) | CodigoF (Índice) | Cliente | Recaudo | fechaCobro |
| :-----------: | :--------------: | :-----: | :-----: | :--------: |
|      int      |     varchar      | varchar | double  | timestamp  |
|      11       |        6         |   13    |    -    |     -      |

- ##### Venta DB

| Id (Primaria) | CodigoF (Índice) | CodigoP (Índice) | Productos (Índice) | Unidades |
| :-----------: | :--------------: | :--------------: | :----------------: | :------: |
|      int      |     varchar      |     varchar      |      varchar       |   int    |
|      11       |        6         |        10        |        100         |    6     |

- ##### Facturas DB

| Id (Primaria) | Cliente (Índice) | FechaEntrega | FechaVencimiento | TipoPago | Subtotal | Total  | Observaciones | Estado  |
| :-----------: | :--------------: | :----------: | :--------------: | :------: | :------: | :----: | :-----------: | :-----: |
|    varchar    |     varchar      |   datetime   |       date       | tinyInt  |  double  | double |     text      | tinyInt |
|       6       |        13        |      -       |        -         |    4     |    -     |   -    |       -       |    1    |
