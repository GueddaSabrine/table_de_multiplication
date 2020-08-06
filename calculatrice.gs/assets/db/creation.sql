create database if not exists calculatrice;

use calculatrice;

create table if not exists register (
                                        id int auto_increment not null ,
                                        prenom varchar(50) ,
                                        identifiant varchar(50) ,
                                        password varchar(50) ,
                                        conf_password varchar(50),
                                        constraint uq_email_register UNIQUE (identifiant),
                                        constraint pk_register primary key (id)
);

insert into Register(prenom, identifiant, password, conf_password)
values ('sab', 'sab@dawm.sg', '1234', '1234');

create table if not exists idf (
                                   id int auto_increment not null ,
                                   identifiant varchar(50) ,
                                   password varchar(50),
                                   constraint uq_email_register UNIQUE (identifiant),
                                   constraint pk_register primary key (id)
);

insert into idf(identifiant, password)
values ('sab@dawm.sg', '1234');

create table if not exists calculatrice (
                                            id int unsigned auto_increment not null,
                                            multiplication nvarchar(255) unique not null,
                                            reponses  nvarchar(255) unique not null ,
                                            correct  nvarchar(255),
                                            constraint pk_register primary key (id)
);

insert into calculatrice(multiplication, reponses, correct)
values ('6*6', '36', '1')

