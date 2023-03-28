DROP DATABASE cookbook;
CREATE DATABASE cookbook;
USE cookbook;

CREATE TABLE IF NOT EXISTS image (
    id_image int(11) NOT NULL AUTO_INCREMENT,
    filename varchar(100) NOT NULL,
    PRIMARY KEY (id_image)
);

CREATE TABLE recipes(
    id_recipe INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    recipe_name VARCHAR (50),
    id_image INT,
    FOREIGN KEY (id_image) REFERENCES image(id_image) ON UPDATE CASCADE ON DELETE CASCADE,
    ingredients VARCHAR(250),
    method VARCHAR(255)
);
USE cookbook;
CREATE TABLE users (
    id_user int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL
);
INSERT INTO users (email, password) VALUES ('admin@admin.it', 'nicole');
