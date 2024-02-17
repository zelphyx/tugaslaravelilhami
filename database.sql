create database latihan_laravel;

use latihan_laravel;

create table categories(
    id varchar(100) primary key not null,
    name varchar(256) not null ,
    description Text,
    created_at timestamp
)engine innodb;

desc categories;
