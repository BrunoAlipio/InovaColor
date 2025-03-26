create database bd_InovaColor;
use bd_InovaColor;

create table usuario(
id_usuario int not null auto_increment,
nome varchar(50) not null,
email varchar(100) not null,
senha varchar(50) not null,
contato int not null,
data_nasc date not null,
primary key (id_usuario)
);

select * from usuario;

create table agendamento(
id_agenda int not null auto_increment,
nome varchar(50) not null,
cep varchar(8) not null,
bairro varchar(200),
rua varchar(200),
numero varchar(5),
dia date,
hora time,
usuario int not null,
FOREIGN KEY (usuario) REFERENCES usuario(id_usuario),
primary key (id_agenda)
);

select * from agendamento;

create table comentarios(
id_comentario int not null auto_increment,
qtd_estrela int not null,
nome_comentario varchar(100),
comentario varchar(300) not null,
primary key (id_comentario)
);

select * from comentarios;

create table arquivos(
id int not null auto_increment,
nome varchar(255) not null,
caminho varchar(255) not null,
tipo varchar(100) not null,
tamanho int not null,
titulo varchar(100) not null,
texto varchar(300) not null,
data_post date not null,
primary key (id)
);

select * from arquivos;