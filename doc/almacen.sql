DROP TABLE IF exists almacen;
CREATE TABLE almacen(
IDalmacen int not null auto_increment,
IDproducto int not null,
fecCompra date not null,
cantidad double not null,
IDProveedor int not null,
PRIMARY KEY(IDalmacen),
CONSTRAINT FOREIGN KEY (IDproducto) REFERENCES productos (IDproducto),
FOREIGN KEY (IDProveedor) REFERENCES proveedor (idproveedor)

);