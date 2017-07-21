create table ventas(
IDventas int not null auto_increment primary key,
importe double not null,
fecRegisto timestamp default current_timestamp,
IDPersonal int not null,
IDTienda int not null,
IDcliente int not null
);