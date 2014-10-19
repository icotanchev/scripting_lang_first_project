CREATE DATABASE IF NOT EXISTS script_lang_first;

USE script_lang_first;

CREATE TABLE IF NOT EXISTS tbl_area (
	id INT NOT NULL AUTO_INCREMENT,
	area_name VARCHAR(25) NOT NULL,
	geo GEOMETRY,
	PRIMARY KEY(id)
);

