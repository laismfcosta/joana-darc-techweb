USE darc;

CREATE TABLE enrollments (
		id INTEGER PRIMARY KEY AUTO_INCREMENT,
  	name VARCHAR(100),
		email VARCHAR(100),
		password TEXT,
		message VARCHAR(200),
		profile INT
);

INSERT INTO enrollments (name, email, password, message, profile)
VALUES('admin', 'admin@mail.com', md5('admin'), 'Conta de Administração', 2);