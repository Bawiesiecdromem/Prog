Create database ADBI;
use ADBI;
create table USERS (
u_id int not null auto_increment,
u_email varchar(32) not null,
u_nick varchar(32) not null,
u_password varchar(32) not null,
u_name varchar(32) not null,
u_forename varchar(32) not null,
u_phone int(9),
u_birth date not null,
primary key (u_id)
);
create table CATEGORIES (
cat_id int not null auto_increment,
cat_name varchar(32) not null,
cat_desc varchar(255) not null,
primary key (cat_id)
);
create table COMMENTS (
comm_id int not null auto_increment,
comm_desc varchar(255) not null,

);