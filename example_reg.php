<?php

require_once 'core/init.php';
 
 if (Input::exists()) {
 	 $validate = new Validate();
 	 $validation = $validate->check($_POST, array(
 	 	'username' => array(
 	 		'required' => true,
 	 		'min' => 5,
 	 		'max' => 15,
 	 		'unique' => 'users'
 	 	),
 	 	'email' => array(
 	 		'required' => true,
 	 		'email' => true
 	 	),
 	 	'name' => array(
 	 		'required' => true,
 	 		'min' => 5
 	 	),
 	 	'password' => array(
 	 		'required' => true,
 	 		'min' => 6
 	 	),
 	 	'password_again' => array(
 	 		'required' => true,
 	 		'matches' => 'password'
 	 	)
 	 ));

 	 if ($validation->passed()) {
 	 	echo "success";
 	 } else {
 	 	print_r($validation->errors());
 	 }

 }

 ?>

<form action="" method="POST">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autocomplete="off" value="<?php echo escape(Input::get('username')); ?>">
	</div>

	<div class="field">
		<label for="email">Email</label>
		<input type="text" name="email" id="email" autocomplete="off" value="<?php echo escape(Input::get('email')); ?>">
	</div>

	<div class="field">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" autocomplete="off" value="<?php echo escape(Input::get('name')); ?>">
	</div>

	<div class="field">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" autocomplete="off" value="">
	</div>

	<div class="field">
		<label for="password_again">Password Again</label>
		<input type="password" name="password_again" id="password_again" autocomplete="off" value="">
	</div>

	<input type="submit" value="Register">
</form>