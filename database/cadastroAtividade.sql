#CRIAR O BANCO DE DADOuseS:
create database cadastroAtividade;

#HABILITAR O BANCO DE DADOS:
use cadastroAtividade;
 
#CRIAR A TABELA DE PESSOAS NO BANCO DE DADOS:
create table tbl_pessoa(
cod_pessoa int unsigned auto_increment primary key,
nome varchar(250) not null,
sobrenome varchar(500) not null,
email varchar(500) not null,
celular varchar(20) not null
);

create table tbl_administrador(
id int unsigned auto_increment primary key,
usuario varchar(250) not null,
senha varchar(250) not null
);