<?php

// This is the database connection configuration.
return array(
	/*
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	*/
	'connectionString' => 'mysql:host=localhost:3306;dbname=script_lang_first',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
);