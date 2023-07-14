<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn

CREATE DATABASE IF NOT EXISTS e_commerce_database;
USE e_commerce_database;

CREATE TABLE users (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    admin INT(1) DEFAULT '0',
    login VARCHAR(25) NOT NULL,
    email VARCHAR(40) NOT NULL,
    password VARCHAR(100) NOT NULL,
    street VARCHAR(70) NOT NULL,
    suburb VARCHAR(25) NOT NULL,
    city VARCHAR(25) NOT NULL,
    postcode INT(10) NOT NULL
);

CREATE TABLE categories (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    product_category VARCHAR(255) NOT NULL UNIQUE
);


CREATE TABLE products (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(35) NOT NULL,
    price INT(10) NOT NULL,
    date_added TIMESTAMP DEFAULT NOW(),
    quantity INT(3) NOT NULL,
    description VARCHAR(160) NOT NULL,
    category_id INT(10) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);


CREATE TABLE wishlists (
    product_id INT(10),
    user_id INT(10),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    PRIMARY KEY (product_id, user_id)
);

CREATE TABLE orders (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(10) NOT NULL,
    product_id INT(10) NOT NULL,
    quantity INT(10) NOT NULL,
    total_price INT(10) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
);


INSERT INTO users(login,password,admin,email,street,suburb,city,postcode)
VALUES ("admin", "$2y$10$c9TipNQw5vYP9vAyKtyaUOSq5yL4mkvKzZME7tKNBPe/30w8PJNCu",1,"admin@admin.admin","101 street","Avondale","Auckland","1010")
ON DUPLICATE KEY UPDATE login = login


