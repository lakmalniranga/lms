<?php
require_once 'core/init.php';

// require_once 'student/header.php';

if (Session::exists('home')) {
	echo Session::flash('home');
}

$user = new User();

if ($user->isLoggedIn()) {
	echo "Logged in as {$user->data()->name} <a href='logout.php'>Logout</a>";
} else {
	echo "please <a href='example_login.php'>Login</a> or <a href='example_reg.php'>Register</a></br>";
}

if ($user->hasPermission('admin')) {
	echo "</br>You'r admin!";
}
// require_once 'student/footer.php';