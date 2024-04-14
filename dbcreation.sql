CREATE DATABASE accounts;
USE accounts;
CREATE TABLE users (
	user_id INT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(12) NOT NULL
);

SELECT * FROM users;