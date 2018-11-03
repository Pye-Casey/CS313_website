// Final App Database
CREATE SCHEMA behavior;

CREATE TABLE behavior.students(
	id SERIAL NOT NULL PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,
	grade_level INT
);

CREATE TABLE behavior.events(
	id SERIAL NOT NULL PRIMARY KEY,
	student_id INT NOT NULL REFERENCES student(id),
	staff_name TEXT,
	location TEXT,
	description TEXT,
	time TIME,
	date DATE
);

CREATE TABLE behavior.user(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(200) NOT NULL
);

INSERT INTO behavior.user (username, password)
VALUES
('user', 'password123');

ALTER TABLE behavior.user ADD CONSTRAINT username UNIQUE (username);

INSERT INTO behavior.events (student_id, staff_name, location, description, time, date) VALUES(1, 'Mr. Pye', 'homeroom', 'Placed a thumb tack on Sallys chair.', CURRENT_TIME, CURRENT_DATE);

INSERT INTO behavior.events (student_id, staff_name, location, description, time, date)
VALUES
(1, 'Mr. Pye', 'homeroom', 'Placed another tackon Sallys chair.', CURRENT_TIME, CURRENT_DATE),
(2, 'Mrs. Makey', 'hall', 'Punched Jimmy in the nose. Blood everywhere.', CURRENT_TIME, CURRENT_DATE),
(3, 'Mr. Lyle', 'play ground', 'Stole an iPhone.', CURRENT_TIME, CURRENT_DATE),
(4, 'Mr. Pye', 'homeroom', 'Stood on desk the entire class period.', CURRENT_TIME, CURRENT_DATE)
;

INSERT INTO behavior.students (first_name, last_name, grade_level)
VALUES
('Bob', 'Ross', 7);

INSERT INTO behavior.students (first_name, last_name, grade_level)
VALUES
('Cindy', 'Lou', 7),
('Max', 'Daniels', 6),
('Sally', 'Stewart', 6);

UPDATE behavior.events SET student_id=2, staff_name='Pacey Gye', location='hall', description='it updeated' WHERE id='9';

