CREATE DATABASE IF NOT EXISTS script_lang_first;

USE script_lang_first;

CREATE TABLE IF NOT EXISTS tbl_client (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(25) NOT NULL,
	info TEXT,
	position GEOMETRY,
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS tbl_area (
	id INT NOT NULL AUTO_INCREMENT,
	area_name VARCHAR(25) NOT NULL,
	geo GEOMETRY,
	client_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (client_id) REFERENCES tbl_client(id)
);
