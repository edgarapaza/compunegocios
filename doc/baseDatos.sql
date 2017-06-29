CREATE TABLE familias(
IDfamilia int not null,
codigo char(3) not null,
familia varchar(200) not null,
IDprecio int,
caracteristica1 varchar(100),
caracteristica2 varchar(100),
caracteristica3 varchar(100),
caracteristica4 varchar(100),
caracteristica5 varchar(100),
caracteristica6 varchar(100),
garantia int,
tipoArcticulo varchar(60), //Simple, compuesto, Servicio
);

CREATE TABLE subfamilias(
IDsudfamilia int not null,
IDfamilia int not null,
codigo char(3) not null,
subfamilia varchar(200) not null
);

CREATE TABLE marca(
IDmarca int not null,
codigo char(3) not null,
marca varchar(200) not null
);

CREATE TABLE modelo(
idmodelo int not null,
IDmarca int not null,
modelo varchar(50) not null,
);

CREATE TABLE proveedor(
idproveedor int not null,
codigo int not null,
nombrepro varchar(200) not null,
razonsocial varchar(200) not null,
);

CREATE TABLE precio(
idprecio int
nomprecio varchar(10),
descripcion varchar(50),
IDproducto int
);

CREATE TABLE altaArticulos(
idalta int,
fechaalta timestamp,
referencia varchar(60),
descripcion varchar(150) not null,
IDfamilia int,
IDsudfamilia int,
idmarca int,
modelo varchar(100),
tipoArcticulo varchar(20),   //simple, compuesto, servicio
precio double,
marGanan1 double;
marGanan2 double;
marGanan3 double;
marGanan4 double;
dsct1 double;
dsct2 double;
dsct3 double;
dsct4 double;
stockInicial int
garantia int,
peso double,
largo double,
ancho double,
alto double,
imagen blod,
obs varchar(255)
);
