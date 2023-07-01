/* DDL */
drop database if exists usuarios;
create database usuarios;
use usuarios;

create table usuario(
    nombre varchar(12) not null unique primary key,
    cl_publica varchar(50) not null,
    cl_privada varchar(50),
    hash varchar(120)
);

/* DML */
/* Consulta para buscar usuarios repetidos previo a registro */
select count(*) from usuario where usuario=?;