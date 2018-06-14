CREATE TABLE compraprovedor(
idcompra int not null auto_increment PRIMARY KEY,
idproducto int not null,
idproveedor int not null,
cantidad int not null default 1,
pvp double not null,
numfactura varchar(20),
feccompra date,
idpersonal int not null
);