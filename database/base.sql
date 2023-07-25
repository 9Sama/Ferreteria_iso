DROP DATABASE IF EXISTS ferreteriap;
create database ferreteriap;
use ferreteriap;

drop table if exists plaza;
drop table if exists puesto;
drop table if exists area;
drop table if exists postulante;
drop table if exists personal;

create table area(idarea int primary key AUTO_INCREMENT,nombre varchar(30),descripcion varchar(50),estado tinyint);
create table puesto(idpuesto int primary key AUTO_INCREMENT,idarea int, nombre varchar(30),descripcion varchar(40),estado tinyint, foreign key(idarea)references area(idarea));
create table plaza(idplaza int primary key AUTO_INCREMENT, idpuesto int, cantidad int, convocatoria text,foreign key(idpuesto)references puesto(idpuesto));
create table postulante(idpostulante int primary key AUTO_INCREMENT, dni char(8), apellidos varchar(35), nombres varchar(40),direccion varchar(30),fechanac date,celular char(9), gradoEstudios varchar(40),centroEstudios varchar(45));
create table personal(idpersonal int primary key AUTO_INCREMENT, dni char(8), apellidos varchar(35), nombres varchar(40),direccion varchar(30),fechanac date,celular char(9),gradoEstudios varchar(40),centroEstudios varchar(45),sueldo float,fechaIng date, idpuesto int, foreign key(idpuesto)references puesto(idpuesto));

create table categoria(
    idcategoria int not null AUTO_INCREMENT,
    nombre varchar(50) not null unique,
    descripcion varchar(256) null,
    estado bit default(1),
    primary key(idcategoria)
);

create table articulo(
    idarticulo int not null AUTO_INCREMENT,
    idcategoria int null,
    codigo varchar(50) null,
    nombre varchar(100) not null unique,
    precio_venta decimal(11,2) not null,
    stock int not null,
    descripcion varchar(256) null,
    estado char(1),
    primary key(idarticulo),
    FOREIGN KEY (idcategoria) REFERENCES categoria(idcategoria)
);

create table persona(
    idpersona int not null AUTO_INCREMENT,
    tipo_persona varchar(20) not null,
    nombre varchar(100) not null,
    tipo_documento varchar(20) null,
    num_documento varchar(20) null,
    direccion varchar(70) null,
    telefono varchar(20) null,
    email varchar(50) null,
    primary key(idpersona)
);

create table ingreso(
    idingreso int not null AUTO_INCREMENT,
    idproveedor int not null,
    idusuario int not null,
    tipo_comprobante varchar(20) not null,
    serie_comprobante varchar(7) null,
    num_comprobante varchar (10) not null,
    fecha datetime not null,
    impuesto decimal (11,2) not null,
    total decimal (11,2) not null,
    estado varchar(20) not null,
    primary key(idingreso),
    FOREIGN KEY (idproveedor) REFERENCES persona (idpersona)
);

create table detalle_ingreso(
    iddetalle_ingreso int not null AUTO_INCREMENT,
    idingreso int not null,
    idarticulo int not null,
    cantidad int not null,
    precio decimal(11,2) not null,
    estado char(1) null,
    primary key(iddetalle_ingreso),
    FOREIGN KEY (idingreso) REFERENCES ingreso (idingreso) ON DELETE CASCADE,
    FOREIGN KEY (idarticulo) REFERENCES articulo (idarticulo)
);

create table venta(
    idventa int not null AUTO_INCREMENT,
    idcliente int not null,
    idusuario int not null,
    tipo_comprobante varchar(20) not null,
    serie_comprobante varchar(7) null,
    num_comprobante varchar (10) not null,
    fecha_hora datetime not null,
    impuesto decimal (11,2) not null,
    total decimal (11,2) not null,
    estado varchar(20) not null,
    primary key(idventa),
    FOREIGN KEY (idcliente) REFERENCES persona (idpersona)
);

create table detalle_venta(
    iddetalle_venta int not null AUTO_INCREMENT,
    idventa int not null,
    idarticulo int not null,
    cantidad int not null,
    precio decimal(11,2) not null,
    descuento decimal(11,2) not null default 0.00,
    primary key(iddetalle_venta),
    FOREIGN KEY (idventa) REFERENCES venta (idventa) ON DELETE CASCADE,
    FOREIGN KEY (idarticulo) REFERENCES articulo (idarticulo)
);
