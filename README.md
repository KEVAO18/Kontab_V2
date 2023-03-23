# KONTAB 2

Sistema contable creado para empresas pequeñas y medianas que necesitan mantener sus cuentas en orden

## Menú

- [Manual de Uso](#Manual-de-Uso)
  - [Primeros Pasos](#primeros-pasos-en-kontab-2)
    - [Contabilidad](#contabilidad)
    - [Facturación](#facturación)
    - [Registro de Clientes](#registro-de-clientes)
    - [Control de Stock](#control-de-Stock)
  - [DB](#db)
    - [Totales](#totales-db)
    - [Entradas](#entradas-db)
    - [Productos](#productos-db)
    - [Clientes](#clientes-db)
    - [Cobros](#cobros-db)
    - [Venta](#venta-db)
    - [Facturas](#facturas-db)

## Manual de Uso

### Primeros pasos en Kontab 2

---

Kontab es un sistema contable que pone la organización en tu negocio de una forma mas sencilla, de esta manera el comenzar será mas sencillo, para iniciar tenemos la distribución de 

#### Contabilidad:

- Tabla de Ingresos 
- Tabla de egresos
- Tabla de totales, Esta tabla es la unión de las tablas: ingresos y egresos
- ingreso nuevo, es un nuevo ingreso o egreso (tipo, Concepto o asunto, monto)

#### Facturación:

- Facturas
- Ventas Diarias

#### Registro de Clientes:

- Tabla de Clientes
- Nuevo Cliente
  - El documento
  - Nombre
  - Dirección
  - Ciudad
  - Teléfono
  - Correo
  - Estado

#### Control de Stock:

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

#### DB: 

- ##### Totales DB

| Id   | Tipo | Fecha | Concepto | Monto |
| :---: | :------: | :--------: | :------: | :-----: |
| int  | tinyInt | timestamp | varchar | double |
| 11  | 1 | - | 100 | - |

- ##### Entradas DB

| Id   | Índice | Nombre | Fecha | Cantidad |
| :---: | :------: | :--------: | :------: | :-----: |
| int  | varchar | varchar | timestamp | int |
| 11  | 10 | 100 | - | 11 |

- ##### Productos DB

|   Id    | Nombre  | Precio | Stock |
| :-----: | :-----: | :----: | :---: |
| varchar | varchar | double |  int  |
|   10    |   100   |   8    |  11   |

- ##### Clientes DB

|  Id  | Documento | Nombre  | Dirección | Ciudad  | Teléfono | Correo  | Estado  |
| :--: | :-------: | :-----: | :-------: | :-----: | :------: | :-----: | :-----: |
| int  |  varchar  | varchar |  varchar  | varchar | varchar  | varchar | tinyInt |
|  11  |    13     |   100   |    100    |   80    |    50    |   100   |    1    |

- ##### Cobros DB

|  Id  | CodigoF | Cliente | Recaudo | fechaCobro |
| :--: | :-----: | :-----: | :-----: | :--------: |
| int  | varchar | varchar | double  | timestamp  |
|  11  |    6    |   13    |    -    |     -      |

- ##### Venta DB

|  Id  | CodigoF | CodigoP | Productos | Unidades |
| :--: | :-----: | :-----: | :-------: | :------: |
| int  | varchar | varchar |  varchar  |   int    |
|  11  |    6    |   10    |    100    |    6     |

- ##### Facturas DB

|   Id    | Cliente | FechaEntrega | FechaVencimiento | TipoPago | Subtotal | Total  | Observaciones | Estado  |
| :-----: | :-----: | :----------: | :--------------: | :------: | :------: | :----: | :-----------: | :-----: |
| varchar | varchar |   datetime   |       date       | tinyInt  |  double  | double |     text      | tinyInt |
|    6    |   13    |      -       |        -         |    4     |    -     |   -    |       -       |    1    |

