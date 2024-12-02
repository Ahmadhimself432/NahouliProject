
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS pizzas;


CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255),
    nbofpeople INT,
    date_stamps DATE,
    time_stamps TIME,
    status ENUM('approved', 'pending', 'disapproved') DEFAULT 'pending'
);


CREATE TABLE pizzas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    image VARCHAR(255),
    price FLOAT,
    description VARCHAR(255)
);
