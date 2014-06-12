use pgvis_for_get;

drop table if exists NEW_USER;
drop table if exists NEW_PRETASK;
drop table if exists NEW_VIS;
drop table if exists NEW_DEMOGRAPHS;

-- create the user table
create table NEW_USER(
	id varchar(50) not null primary key,
	pretask_id int,
	table_id int,
	treemap_id int,
	bar_id int,
	bubble_id int,
	demo_id int,
	ip varchar(50),
	total_time int
	)
	ENGINE = InnoDB;

-- create the pretask table
create table NEW_PRETASK(
	pretask_id int auto_increment not null primary key,
	q1 enum('yes','no') not null,
	q2 enum('10','50','99') not null,
	q3 enum('true','false') not null,
	q4 enum('true','false') not null,
	q5 enum('true','false') not null,
	q6 enum('yes','no') not null,
	time_spent int
	)
	ENGINE = InnoDB;

-- create the visualizations table
create table NEW_VIS(
	vis_id int auto_increment not null primary key,
	vis_type enum('table','treemap','bar','bubble') not null,
	q1 int not null,
	q2 int not null,
	q3 enum('a','b','c','d') not null,
	q4 enum('a','b','c','d') not null,
	q5 enum('a','b','c','d') not null,
	q6 varchar(500) not null,
	q7 enum('a','b','c','d') not null,
	q8 enum('a','b','c','d') not null,
	q9_a char(11) not null, -- not sure I completely understand here
	q9_b char(11) not null,
	q9_c char(13) not null,
	q9_d char(12) not null,
	q9_e char(8) not null,
	q9_f char(9) not null,
	q9_g char(12) not null,
	q9_h char(11) not null,
	q10_a enum('1','2','3','4','5','6','7') not null,
	q10_b enum('1','2','3','4','5','6','7') not null,
    q10_c enum('1','2','3','4','5','6','7') not null,
    q10_d enum('1','2','3','4','5','6','7') not null,
    q10_e enum('1','2','3','4','5','6','7') not null,
    q10_f enum('1','2','3','4','5','6','7') not null,
    q10_g enum('1','2','3','4','5','6','7') not null,
    q11 varchar(500),
	q12 varchar(500),
    time_spent int
	)
	ENGINE = InnoDB;

-- create the demographics table
create table NEW_DEMOGRAPHS(
	dem_id int not null primary key,
	q1 varchar(50),
	q2 enum('yes','no'),
	q3 int,
	q4 enum('female','male','other'),
	q5 char(20), -- how it's done in old db, not sure i understand...
	q6 enum('yes','no'),
	q7 enum('yes','no'),
	time_spent int
	)
	ENGINE = InnoDB;
