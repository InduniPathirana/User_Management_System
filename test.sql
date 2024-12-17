CREATE DATABASE users_management_system_db;

USE users_management_system_db;

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    dob DATE,
    address TEXT,
    telephone VARCHAR(50)
);

INSERT INTO users (name, dob, address, telephone) VALUES
('John Doe', '1990-05-15', '123 Main Street, Springfield', '555-123-4567'),
('Jane Smith', '1985-10-20', '456 Elm Street, Metropolis', '555-234-5678'),
('Alice Johnson', '1992-03-12', '789 Oak Avenue, Gotham', '555-345-6789'),
('Bob Williams', '1988-07-25', '321 Pine Road, Star City', '555-456-7890'),
('Charlie Brown', '1995-11-30', '654 Maple Lane, Central City', '555-567-8901');

