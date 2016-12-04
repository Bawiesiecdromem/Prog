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
u_date datetime not null,
u_avatar varchar(255),
u_god int(1),
is_adult int(1) not null,
primary key (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
create table T_CATEGORIES (
cat_id int not null auto_increment,
cat_name varchar(32) not null,
cat_desc varchar(255) not null,
mature_content int(1) not null,
primary key (cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
create table T_AD (
ad_id int not null auto_increment,
ad_title varchar(32) not null,
ad_desc text not null,
ad_photo varchar(255),
ad_date datetime not null,
ad_transferdate datetime,
u_id int not null,
cat_id int not null,
comm_id int not null,
mature_content int(1) not null,
primary key (ad_id),
foreign key (u_id)
references T_USERS (u_id),
foreign key (cat_id)
references T_CATEGORIES (cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
create table T_FROZENAD (
frozenad_id int not null,
frozenad_title varchar(48) not null,
frozenad_desc text not null,
frozenad_photo varchar(255),
frozenad_date datetime not null,
frozenad_transferdate datetime,
u_id int not null,
cat_id int not null,
comm_id int not null,
mature_content int(1),
primary key (frozenad_id),
foreign key (u_id)
references T_USERS (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
create table T_COMMENTS (
comm_id int not null auto_increment,
comm_desc varchar(255) not null,
comm_date datetime not null,
u_id int not null,
ad_id int not null,
primary key (comm_id),
foreign key (u_id)
references T_USERS (u_id),
foreign key (ad_id)
references T_AD (ad_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
create table T_ACTIONS (
action_id int not null auto_increment,
action_date datetime not null,
action_who int,
action_whoisfollowed int,
action_whichad int,
action_whichcomm int,
primary key (action_id),
foreign key (action_who)
references T_USERS (u_id),
foreign key (action_whoisfollowed)
references T_USERS (u_id),
foreign key (action_whichad)
references T_AD (ad_id),
foreign key (action_whichcomm)
references T_COMMENTS (comm_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
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
create table T_ATTACHMENTS (
attachment_id int not null auto_increment,
attachment_path varchar(255) not null,
ad_id int not null,
primary key (attachment_id),
foreign key (ad_id)
references T_AD (ad_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;