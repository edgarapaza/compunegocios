CREATE TABLE ventas(
	idventas int not null auto_increment PRIMARY KEY,
	total double not null,
	idproducto int not null,
	numserie varchar(200) not null,
	idpersonal int not null,
	idcliente int not null,
	idtienda int not null,
	fechaventa datetime
)