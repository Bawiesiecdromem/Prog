use ADBI_DB;
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