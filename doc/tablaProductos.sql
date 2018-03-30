CREATE TABLE productos(
	idproducto int not null auto_increment PRIMARY KEY,
	codigo varchar(20) not null,
	producto varchar(200) not null,
	numserie varchar(200) not null,
	marca varchar(100) not null,
	modelo varchar(100) not null,
	tipunidad varchar(60) not null,
	tiparticulo varchar(60) not null,
	descripcion varchar(255) not null,
	preUnitario double,
	marGanan1 int default 8,
	marGanan2 int default 10,
	marGanan3 int default 12,
	precventa1 double,
	precventa2 double,
	precventa3 double,
	stock int default 0,
	stockmin int default 10,
	color varchar(60),
	incluye varchar(60),
	fecreg datetime,
	estado tinyint,
	idfamilia int not null,
	idpersonal int not null,
	obs varchar(255)
);