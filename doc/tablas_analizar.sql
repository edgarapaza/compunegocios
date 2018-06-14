
CREATE TABLE productoglobal(
idprodglobal int not null auto_increment,
idfamilia int not null,
idsubfam int,
idmarca int not null,
modelo varchar(100),
tipoarticulo varchar(10),
descripcion varchar(250) not null,
PrecioVentaProvedor1 double,
PrecioVentaProvedor2 double,
stocktotal int,
fecalta timestamp DEFAULT current_timestamp,
PRIMARY KEY(idprodglobal)
);

CREATE TABLE facturas(  /*esta sirve para almacenar lo que sale de la tienda y guarda un regsitro de ella*/
idfactura int not null auto_increment,
numfactura varchar(30) not null,
idcliente int not null,
total double,
fecalta timestamp DEFAULT current_timestamp,
PRIMARY KEY(idfactura)
);

CREATE TABLE fichafactura( /*esta es la que guarda un listado de los productos asignados a una persona*/
idfichafactura int not null auto_increment,
idprodglobal int not null,
idalmacen int not null,
cantidad int not null DEFAULT 1,
precio double,
total double,
PRIMARY KEY(idfichafactura)
);

