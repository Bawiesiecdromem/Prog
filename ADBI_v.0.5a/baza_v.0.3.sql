Create database ADBI_DB;
use ADBI_DB;
create table T_USERS (
u_id int not null auto_increment,
u_email varchar(32) not null,
u_nick varchar(32) not null,
u_password varchar(32) not null,
u_name varchar(32) not null,
u_forename varchar(32) not null,
u_phone int(9),
u_birth date not null,
u_date date not null,
u_avatar varchar(255),
primary key (u_id)
);
create table T_CATEGORIES (
cat_id int not null auto_increment,
cat_name varchar(32) not null,
cat_desc varchar(255) not null,
mature_content int(1),
primary key (cat_id)
);
create table T_AD (
ad_id int not null auto_increment,
ad_photo varchar(255),
ad_desc varchar(255) not null,
ad_date date not null,
u_id int not null,
cat_id int not null,
comm_id int not null,
mature_content int(1),
primary key (ad_id),
foreign key (u_id)
references T_USERS (u_id),
foreign key (cat_id)
references T_CATEGORIES (cat_id)
);
create table T_COMMENTS (
comm_id int not null auto_increment,
comm_desc varchar(255) not null,
comm_date date not null,
u_id int not null,
ad_id int not null,
primary key (comm_id),
foreign key (u_id)
references T_USERS (u_id),
foreign key (ad_id)
references T_AD (ad_id)
);