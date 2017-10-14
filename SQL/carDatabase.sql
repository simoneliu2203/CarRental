use jp5321;

drop table if exists cars_Out;
drop table if exists cars_Available;
drop table if exists car;
drop table if exists customer;
drop table if exists comp_branches;
drop table if exists carCompany;

create table carCompany(comp_id int(4) not null, comp_name varchar(10),
		primary key(comp_id)) ENGINE = INNODB;
		
create table comp_branches(branch_id int(4) NOT NULL, branch_name varchar(25), address varchar(40),
		primary key(branch_id)) ENGINE = INNODB;

create table customer(cus_id int(4) not null, name_first varchar(15), name_last varchar(15), address varchar(40), phone varchar(10),
		primary key (cus_id)) ENGINE = INNODB;
		
create table car(car_vin int(17) not null, car_id int(4) not null, branch_id int(4), car_name varchar(15), comp_id int(4) not null, year_made DATE, color varchar(10),
		primary key(car_vin, car_id),
		foreign key(comp_id)
		references carCompany(comp_id)
		ON UPDATE CASCADE ON DELETE CASCADE,
		foreign key(branch_id)
		references comp_branches(branch_id)
		ON UPDATE CASCADE ON DELETE CASCADE) ENGINE = INNODB;
		
create table cars_Available(car_id int(4) not null, branch_id int(4), no_available int(3), 
		primary key(car_id),
		foreign key(car_id)
		references car(car_id)
		ON UPDATE CASCADE ON DELETE CASCADE,
		foreign key(branch_id)
		references comp_branches(branch_id)
		ON UPDATE CASCADE ON DELETE CASCADE) ENGINE = INNODB;
		
create table cars_Out(car_id int(4) not null, branch_id int(4), cus_id int(4) not null, date_Rented DATE, date_due DATE, date_returned DATE, damages_yn varchar(1),
		primary key (car_id, cus_id),
		foreign key(car_id)
		references car(car_id)
		ON UPDATE CASCADE ON DELETE CASCADE,
		foreign key(cus_id)
		references customer(cus_id)
		ON UPDATE CASCADE ON DELETE CASCADE,
		foreign key(branch_id)
		references comp_branches(branch_id)
		ON UPDATE CASCADE ON DELETE CASCADE) ENGINE = INNODB;