<?php

require_once 'core/init.php';

 if (Input::exists()) {
 	if (Token::check(Input::get('token'))) {
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
			$user = new User();

			$salt = Hash::salt(32);

			try {
				$user->create(array(
					'username' => Input::get('username'),
					'password' => Hash::generateHash(Input::get('password'), $salt),
					'salt' => $salt,
					'name' => Input::get('name'),
					'email' => Input::get('email'),
					'joined' => date('Y-m-d H:i:s'),
					'role' => 2
				));

				Session::flash('home', 'User registerd');
				header('Location: index.php');
			} catch (Exception $e) {
				die($e->getMessage());
			}
		} else {
			foreach ($validation->errors() as $error) {
				echo $error . "</br>";
			}
		}
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

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Register">
</form>
