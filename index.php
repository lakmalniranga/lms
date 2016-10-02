<?php
require_once 'core/init.php';

echo Config::get('mysql/host');
echo "</br>";

// $users = DB::getInstance()->query('SELECT * FROM users WHERE password = ?', array('pass123'));

$users = DB::getInstance()->get('users', array('password', 'like', 'pass%'));

echo "get first </br>";
print_r($users->first());
echo "</br>";
echo "</br>";

echo "get limit of rows </br>";
print_r($users->limitTo(2));
echo "</br>";
echo "</br>";

echo "get all </br>";
print_r($users->results());
echo "</br>";
echo "</br>";

if ($users->count()) {
  foreach ($users->limitTo(2) as $user) {
    echo "$user->name - $user->email </br> ";
  }
}else {
  echo 'No Results';
}
