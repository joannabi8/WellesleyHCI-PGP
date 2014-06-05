-- NOTE TO SELF: add in the time elapsed variables

use pgvis_for_get;

drop table if exists NEW_USER;
drop table if exists NEW_PRETASK;
drop table if exists NEW_VISQ;
drop table if exists NEW_SHARING;
drop table if exists NEW_DEMOGRAPHS;

-- create the user table
create table NEW_USER(
	id varchar(50) not null primary key,
	pretask_id int,
	table_id int,
	treemap_id int,
	bubble_id int,
	barchart_id int
	sharing_id int,
	demo_id int
	)
	ENGINE = InnoDB;

-- create the pretask table
create table NEW_PRETASK(
	pretask_id int auto_increment not null primary key,
	signature varchar(50) not null, -- need this?
	q1 enum('yes','no') not null,
	q2 enum('10','50','99'),
	q3 enum('true','false'),
	q4 enum('true','false'),
	q5 enum('true','false'),
	q6 enum('yes','no')
	)
	ENGINE = InnoDB;

-- create the visualizations table
create table NEW_VISQ(



	)
	ENGINE = InnoDB;

-- create the sharing table
create table NEW_SHARING(


	)
	ENGINE = InnoDB;

-- create the demographics table
create table NEW_DEMOGRAPHS(



	
	)
	ENGINE = InnoDB;
