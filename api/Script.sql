drop database if exists bancoapirest;
create database bancoapirest;
use bancoapirest;
create table users(
    id int primary key auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(100) null
);