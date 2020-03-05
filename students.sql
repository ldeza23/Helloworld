create database name;

use name;

create table students
(
	lname varchar(15),
	fname varchar(15),
	middle varchar(10),
	nickname varchar(20)
	);


-- question 4
LOAD DATA LOCAL INFILE '/Users/lissettedeza/Desktop/snames.csv'
INTO TABLE students
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r'
(lname, fname, middle);


-- question  5
select * from students;

-- question 6
-- The value set for the nickname field is Null

-- question7a
-- The value set is an empty string value with 0 length

-- question 7b
select lname, fname,ord(middle) from students
where ord(middle)=0;

-- question 9
delete from students;

-- question 10  
LOAD DATA LOCAL INFILE '/users/lissettedeza/desktop/snames.csv'
INTO TABLE students
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r'
(lname, fname, @middle)
set middle=nullif(@middle, ''); -- value from question 7 defualt was empty or 0 


-- question 11
select * from students;


-- question 12
Insert into students 
(lname, fname)
values('Deza', 
'Lissette'
);

-- question 13a 
Insert into students 
(lname,fname,middle,nickname)
values('Sauveterre','Lizbeth','B','Liz');

Delete from students
where fname = 'lizbeth' 
and nickname is null; 
 


-- question 13b
Update students
set nickname = 'Sandy'
where fname like '%Sandra';


-- question 14
Update students 
set middle = 'tommy',
nickname = 'ken'
where fname like '%kendrick';



drop table students;
