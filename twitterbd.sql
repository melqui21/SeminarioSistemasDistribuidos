#Base de datos para almacenar información de twitter

drop database if exists twitterbd;
create database twitterbd;
use twitterbd;

create table twitterinfo(
	id_info int primary key auto_increment,
	id_usuario varchar(50),
	usuario varchar(50),
	texto_clave varchar(50),
	texto varchar(400),
	latitud varchar(50),
	longitud varchar(50),
	radio varchar(50)	
);