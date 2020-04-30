--Q1

Select count(*) as record_count from 
`bigquery-public-data.usa_names.usa_1910_current`;

--Q2
Select gender,
sum(number) as total_births
from `bigquery-public-data.usa_names.usa_1910_current`
group by gender
order by total_births desc;

--Q3

Select state,
	   min(number)as fewest_num,
	   round(avg(number),0) as avg_num,
	   max(number)as most_num
from `bigquery-public-data.usa_names.usa_1910_current`	   
group by state
order by most_num desc;

--Q4
Select name
from `bigquery-public-data.usa_names.usa_1910_current`
where state = 'NY'
group by name 
having max(number) =10021
order by max(number);


--Q5

SELECT name, count(*) as total
FROM `bigquery-public-data.usa_names.usa_1910_current`
WHERE name in (
				SELECT max(name) as name 
				FROM `bigquery-public-data.usa_names.usa_1910_current`
				WHERE state ='FL'
)
group by name;
                

