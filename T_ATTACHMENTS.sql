use ADBI_DB;
create table T_ATTACHMENTS (
attachment_id int not null auto_increment,
attachment_path varchar(255) not null,
ad_id int not null,
primary key (attachment_id),
foreign key (ad_id)
references T_AD (ad_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;