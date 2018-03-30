CREATE TABLE compra(
	idcompra int not null auto_increment PRIMARY KEY,
	idproducto int not null,
	idproveedor int not null,
	numFactura varchar(100),
	fecEmision date,
	idalmacen int not null
);