<?php

/**
* added for the extra good security practice
*/
if(count(get_included_files()) ==1) header("Location: /404.php");
if(count(get_included_files()) ==1) exit("Page not found");


/**
* debug mode
* default : false
*/
$config['DEBUG'] = true;


/**
* Database configurations
*/
$config['DB_HOST'] = 'localhost';
$config['DB_NAME'] = 'lms';
$config['DB_USER'] = 'root';
$config['DB_PASS'] = 'lms@123';


?>
