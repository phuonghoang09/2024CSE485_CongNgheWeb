create database quizz_db;

use quizz_db;

CREATE TABLE quizz_question (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question text,
    option_a text,
    option_b text,
    option_c text,
    option_d text,
    answer CHAR(10)
);
