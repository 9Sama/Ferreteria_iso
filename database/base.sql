DROP DATABASE IF EXISTS ferreteriap;
create database ferreteriap;
use ferreteriap;

-- Sub_Personal
create table area(idarea int primary key AUTO_INCREMENT,nombre varchar(30),descripcion varchar(40),estado tinyint);
create table puesto(idpuesto int primary key AUTO_INCREMENT,idarea int, nombre varchar(30),descripcion varchar(40),estado tinyint, foreign key(idarea)references area(idarea));
create table plaza(idplaza int primary key AUTO_INCREMENT, idpuesto int, cantidad int,foreign key(idpuesto)references puesto(idpuesto));
create table postulante(idpostulante int primary key AUTO_INCREMENT, dni char(9), apellidos varchar(80), nombres varchar(80),gradoEstudios varchar(80),centroEstudios varchar(100),estado tinyint);


-- Sub_Ventas
create table cliente(idcliente int primary key AUTO_INCREMENT, dni int(8), apellidos varchar(40), nombres varchar(40),direccion varchar(60),telefono int(08),celular int(09))
