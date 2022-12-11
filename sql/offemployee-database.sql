CREATE table offemployee(
	ID int not null auto_increment,
	fname varchar (15),
	lname varchar (15),
	email varchar (50),
    primary key (ID)
);
INSERT INTO offemployee (fname, lname, email)
VALUES
('Alpha', 'A', 'example@email.com'),
('Beta', 'B', 'example@email.com'),
('Cat', 'C', 'example@email.com'),
('Dan', 'D', 'example@email.com'),
('Egon', 'E', 'example@email.com'),
('Fino', 'F', 'example@email.com')
;

CREATE table register(
	userid int not null auto_increment,
	fname varchar (15),
	lname varchar (15),
	email varchar (30),
	pass_word varchar (999),
    primary key (userid)
);