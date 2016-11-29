use ADBI_DB;
create table T_FROZENAD (
frozenad_id int not null,
frozenad_title varchar(32) not null,
frozenad_desc varchar(255) not null,
frozenad_photo varchar(255),
frozenad_date datetime not null,
u_id int not null,
cat_id int not null,
comm_id int not null,
mature_content int(1),
primary key (frozenad_id),
foreign key (u_id)
references T_USERS (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;