<?php

$u = new User(Input::get('id'));

if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $validation = $validate->check($_POST, array(
      'username' => array(
      'required' => true,
      'min' => 5,
			'max' => 12,
    ),

      'email' => array(
			'required' => true,
			'email' => true,
		),

      'name' => array(
			'required' => true,
			'min' => 8,
			'max' => 50
		),

      'mobile' => array(
			'required' => true,
			'min' => 10,
			'max' => 10
		),

      'password' => array(
  		'required' => true,
  		'min' => 8
    ),
  ));

    if ($validation->passed()) {

			$salt = Hash::salt(32);

			try {
				$u->update(Input::get('id'),array(
					'username' => Input::get('username'),
          'password' => Hash::generateHash(Input::get('password'), $salt),
          'salt' => $salt,
          'name' => Input::get('name'),
          'email' => Input::get('email'),
          'mobile' => Input::get('mobile'),
          'joined' => date('Y-m-d H:i:s'),
          'role' => 1
				));

				Session::flash('home', 'User registerd');
				header('Location: dashboard.php?student=view');
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
 	}
}
?>

  	<div class="student">

		<h3 class="group-title blue-b">Student Edit</h3>
          
          <div id="errors" class="errors">
            <?php if (!empty($validate->errors())) : ?>
              <ul>
                <?php foreach ($validate->errors() as $error) : ?>
                  <li><?php echo $error; ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>

          <form class="column column-6" id="student_register" method="post">
            <p>
              <label for="username">Username</label>
              <input class="text-input" type="text" id="username" value="<?php echo $u->data()->username; ?>" name="username" placeholder="Enter username">
            </p>

            <p>
              <label for="email">Email</label>
              <input class="text-input" type="text" id="email" value="<?php echo $u->data()->email; ?>" name="email" placeholder="Enter email address">
            </p>

            <p>
              <label for="name">Name</label>
              <input class="text-input" type="text" id="name" value="<?php echo $u->data()->name; ?>" name="name" placeholder="Enter name">
            </p>

            <p>
              <label for="mobile">Mobile</label>
              <input class="text-input" type="text" id="mobile" value="<?php echo $u->data()->mobile; ?>" name="mobile" placeholder="Enter mobile number in 10 digits">
            </p>

            <p>
              <label for="password">Password</label>
              <input class="text-input" type="password" id="password" name="password" placeholder="Enter Password">
            </p>
              <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <p>
              <button class="btn btn-md btn-blue" type="submit">Register</button>
            </p>
          </form>

        </section>

    </div>