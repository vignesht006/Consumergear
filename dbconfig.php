<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'dineshpartan');    // DB username
define('DB_PASSWORD', '!23456789o');    // DB password
define('DB_DATABASE', 'consume_db');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");





?>
