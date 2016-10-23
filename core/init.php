<?php
session_start();
ob_start();

// debug mode | default : Off
ini_set('display_errors', 'On');

// SET THE FOLDER AS ROOT PATH
define('PATH', 'lms');

if (PATH == '') {
  define('ROOT', "http://$_SERVER[HTTP_HOST]/");
} else {
  define('ROOT', "http://$_SERVER[HTTP_HOST]/" . PATH . '/');
}

$GLOBALS['config'] = array(
    /**
    * database configurations for the MySQL
    */
    'mysql'     => array(
      'host'      => '127.0.0.1',
      'username'  => 'root',
      'password'  => '',
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
      'session_name'  => 'user',
      'token_name'  => 'token'
    )

);

//autoload required classes
spl_autoload_register(function($class){
  require_once 'classes/' . $class . '.php';
});

require_once 'includes/functions/func.php';

$validate = new Validate();
$user = new User();

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
  $hash = Cookie::get(Config::get('remember/cookie_name'));
  $hashCheck = DB::getInstance()->get('user_session', array('hash', '=', $hash ));

  if ($hashCheck->count()) {
    $user = new User($hashCheck->first()->user_id);
    $user->login();
  }
}
