CREATE TABLE student(
	id SERIAL NOT NULL PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,
	grade_level INT NOT NULL,
	email VARCHAR(100),
	phone_number INT
);

CREATE TABLE parent(
	id SERIAL NOT NULL PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,
	email VARCHAR(100),
	phone_number INT
);

CREATE TABLE parent_relationship(
	id SERIAL NOT NULL PRIMARY KEY,
	parent_id INT NOT NULL REFERENCES parent(id),
	student_id INT NOT NULL REFERENCES student(id)
);

CREATE TABLE staff(
	id SERIAL NOT NULL PRIMARY KEY,
	first_name VARCHAR(100) NOT NULL,
	last_name VARCHAR(100) NOT NULL,
	role TEXT,
	email VARCHAR(100),
	phone_number INT
);

CREATE TABLE behavior_event(
	id SERIAL NOT NULL PRIMARY KEY,
	student_id INT NOT NULL REFERENCES student(id),
	staff_id INT NOT NULL REFERENCES staff(id),
	location TEXT NOT NULL,
	time TIME NOT NULL,
	date DATE NOT NULL
);
