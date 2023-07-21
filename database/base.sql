DROP DATABASE IF EXISTS ferreteria;
create database ferreteria;
use ferreteria;
create table area(idarea int primary key AUTO_INCREMENT,nombre varchar(30),descripcion varchar(50),estado tinyint);
create table puesto(idpuesto int primary key AUTO_INCREMENT,idarea int, nombre varchar(30),descripcion varchar(40),estado tinyint, foreign key(idarea)references area(idarea));
create table plaza(idplaza int primary key AUTO_INCREMENT, idpuesto int, cantidad int, convocatoria text,foreign key(idpuesto)references puesto(idpuesto));
create table postulante(idpostulante int primary key AUTO_INCREMENT, dni char(8), apellidos varchar(35), nombres varchar(40),direccion varchar(30),fechanac date,celular char(9), gradoEstudios varchar(40),centroEstudios varchar(45));
create table personal(idpersonal int primary key AUTO_INCREMENT, dni char(8), apellidos varchar(35), nombres varchar(40),direccion varchar(30),fechanac date,celular char(9),gradoEstudios varchar(40),centroEstudios varchar(45),sueldo float,fechaIng date, idpuesto int, foreign key(idpuesto)references puesto(idpuesto));
