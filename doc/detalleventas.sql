create table detalleventa(
IDdetalle serial not null,
IDventas int not null,
IDproducto int not null,
cantidad int not null,
preUnitario double not null,
PRIMARY KEY(IDdetalle),
CONSTRAINT FOREIGN KEY IDventas REFERENCES ventas(IDventas)
);