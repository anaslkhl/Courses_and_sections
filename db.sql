CREATE TABLE cours (
    id int PRIMARY KEY AUTO_INCREMENT,
    tittle varchar(15),
    levelof varchar(15),
    started_at datetime
)

INSERT INTO cours () VALUES ('sql course', 'Intermediaire', '2004-04-22 13:12:49'),
('Advanced SQL', 'Advanced', '2024-05-10 09:00:00'),
('PHP Backend Development', 'Intermediate', '2024-05-11 14:30:00'),
('Intro to Python', 'Beginner', '2024-05-12 10:15:00'),
('Database Normalization', 'Advanced', '2024-05-13 16:00:00'),
('CSS Grid and Flexbox', 'Intermediate', '2024-05-14 11:45:00'),
('React Fundamentals', 'Intermediate', '2024-05-15 08:30:00'),
('Cloud Computing Basics', 'Beginner', '2024-05-16 13:55:00'),
('Machine Learning w/ Pandas', 'Advanced', '2024-05-17 17:00:00'),
('Web Security Essentials', 'Intermediate', '2024-05-18 07:20:00'),
('JavaScript ES6+', 'Intermediate', '2024-05-19 19:10:00')


SELECT * FROM cours WHERE levelof = 'Intermediate' OR levelof = 'Intermediaire';

SELECT * FROM sections
WHERE course_id = "100%"

SELECT COUNT(id) AS 'number of courses', levelof
FROM cours
GROUP by levelof

CREATE TABLE sections (
	id int PRIMARY KEY AUTO_INCREMENT,
    course_id varchar(10),
    tittle varchar(10)
);

INSERT INTO sections () VALUES ('101 php', 'camecourse'),
('501 java', 'object-oriented programming'),
('602 ruby', 'rails MVC architecture'),
('703 go', 'concurrency and goroutines'),
('804 swift', 'ios development basics'),
('905 unity', 'game physics engine'),
('110 terraform', 'infrastructure as code'),
('111 docker', 'containerization and scaling'),
('112 kubernetes', 'cluster orchestration'),
('113 r', 'statistical analysis'),
('114 security', 'penetration testing')