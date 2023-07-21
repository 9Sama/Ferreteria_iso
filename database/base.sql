DROP DATABASE IF EXISTS ferreteriap;
create database ferreteriap;
use ferreteriap;

create table area(idarea int primary key AUTO_INCREMENT,nombre varchar(30),descripcion varchar(40),estado tinyint);
create table puesto(idpuesto int primary key AUTO_INCREMENT,idarea int, nombre varchar(30),descripcion varchar(40),estado tinyint, foreign key(idarea)references area(idarea));
create table plaza(idplaza int primary key AUTO_INCREMENT, idpuesto int, cantidad int,foreign key(idpuesto)references puesto(idpuesto));
create table postulante(idpostulante int primary key AUTO_INCREMENT, dni char(9), apellidos varchar(80), nombres varchar(80),gradoEstudios varchar(80),centroEstudios varchar(100),estado tinyint);

create table cliente(idcliente int primary key AUTO_INCREMENT,dni char(8),apellidos varchar(40),nombres varchar(40),direccion varchar(60),telefono char(08),celular char(09));

create table categoria(
    idcategoria int not null AUTO_INCREMENT,
    nombre varchar(50) not null unique,
    descripcion varchar(256) null,
    estado bit default(1),
    primary key(idcategoria)
);

create table articulo(
    idarticulo int not null AUTO_INCREMENT,
    idcategoria int not null,
    codigo varchar(50) null,
    nombre varchar(100) not null unique,
    precio_venta decimal(11,2) not null,
    stock int not null,
    descripcion varchar(256) null,
    estado bit default(1),
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
    impuesto decimal (4,2) not null,
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
    impuesto decimal (4,2) not null,
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
    descuento decimal(11,2) not null,
    primary key(iddetalle_venta),
    FOREIGN KEY (idventa) REFERENCES venta (idventa) ON DELETE CASCADE,
    FOREIGN KEY (idarticulo) REFERENCES articulo (idarticulo)
);

