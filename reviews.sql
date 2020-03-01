Create database reviewDB;

use reviewDB;

create table reviews
(
 	crse char(7),
	-- crse=course
 	i_comm int(1),
 	-- i=instructor, comm= communication
 	-- "The instructor regularly communicated to students through online discussions, email, and/or announcements"
 	st_comm_w_i int(1),
 	-- st= student, w= with
 	-- "I was able to communicate with my instructor about course content through email and/or discussions"
 	onl_disc int(1),
 	-- onl=online, disc=discussion
 	-- "Online discussions with my classmates helped me to understand and learn course content"
 	gd_test_hw_proj int(1),
 	-- gd= graded ,hw=homework, proj= project
 	-- "Graded tests, homework, and projects helped me to learn course content and achieve learning outcomes"
 	tmg_fb int(1),
 	-- tmg= timing , fb = feedback
 	-- " Graded assignments and feedback were provided within the time frame stated in the syllabus"
 	i_aval int(1),
 	-- aval= availability
 	-- "The instructor was available for consultation offline via telephone, fax, mail, or on-campus office hours."
 	crse_act int(1),
 	-- act= activities
 	-- "The course activities required me to analyze, evaluate and problem solve."
 	crse_p int(1),
 	-- p=policies
 	-- All course policies, including the grading policy, were easy to understand.
 	crse_str varchar(237),
 	-- str=strength
 	-- "What were the strengths of the course?"
 	crse_impr varchar(206)
 	-- impr= improvements
 	-- " How could the course be improved?"
 );

select * from reviews;

load data local infile '/Users/lissettedeza/Desktop/reviews.csv'
into table reviews
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

describe reviews

drop table reviews;

select crse, i_comm 
from reviews
where i_comm = 3;

select crse, tmg_fb
from reviews 
where tmg_fb >= 3;

select crse, onl_disc
from reviews
where crse='cop3847' and onl_disc <= 2;

select crse from reviews
where crse_act is null;

select crse from reviews
where crse_str like'%good%';

