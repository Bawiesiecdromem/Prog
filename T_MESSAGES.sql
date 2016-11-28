use ADBI_DB;
create table T_MESSAGES (
message_id int not null auto_increment,
message_date datetime not null,
message_author int not null,
message_receiver int not null,
message_contents text not null,
primary key (message_id),
foreign key (message_author)
references T_USERS (u_id),
foreign key (message_receiver)
references T_USERS (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;