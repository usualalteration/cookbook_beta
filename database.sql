CREATE DATABASE cookbook;
CREATE TABLE recipes;

CREATE TABLE recipes(
    id int PRIMARY KEY auto_increment
    title varchar,
    photo varchar,
    ingredients text,
    instructions text
);