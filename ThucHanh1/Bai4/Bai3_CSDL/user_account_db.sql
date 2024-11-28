create database user_account_db;

use user_account_db;

CREATE TABLE user_account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username text,
    password text,
    last_name text,
    first_name text,
    city text,
    email text,
    course text
);