<?php
session_start();

// debug mode | default : Off
ini_set('display_errors', 'On');

$GLOBALS['config'] = array(
    /**
    * database configurations for the MySQL
    */
    'mysql'     => array(
      'host'      => '127.0.0.1',
      'username'  => 'root',
      'password'  => '1210ls',
      'db'        => 'lms'
    ),

    /**
    * remember me | cookie_expiry in seconds (604800 = 7 days)
    */
    'remember'  => array(
      'cookie_name'   => 'hash',
      'cookie_expiry' => 604800
    ),

    'session'   => array(
      'session_name'  => ' user'
    )
);

//autoload required classes
spl_autoload_register(function($class){
  require_once 'classes/' . $class . '.php';
});

require_once 'includes/functions/func.php';
