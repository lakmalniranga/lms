<?php

if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $validation = $validate->check($_POST, array(
      'username' => array(
  		'required' => true,
  		'min' => 5,
			'max' => 12,
			'unique' => 'users'
      	),

      'email' => array(
			'required' => true,
			'email' => true,
			'unique' => 'users'
		),

      'name' => array(
			'required' => true,
			'min' => 8,
			'max' => 50
		),

      'mobile' => array(
			'required' => true,
			'min' => 9,
			'max' => 10
		),

      'password' => array(
  		'required' => true,
  		'min' => 8
      	),
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
					'mobile' => Input::get('mobile'),
					'joined' => date('Y-m-d H:i:s'),
          'faculty_id'  => Input::get('faculty'),
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

		<h3 class="group-title blue-b">Student Register</h3>
          
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
              <input class="text-input" type="text" id="username" value="<?php echo Input::get('username'); ?>" name="username" placeholder="Enter username">
            </p>

            <p>
              <label for="email">Email</label>
              <input class="text-input" type="text" id="email" value="<?php echo Input::get('email'); ?>" name="email" placeholder="Enter email address">
            </p>

            <p>
              <label for="name">Name</label>
              <input class="text-input" type="text" id="name" value="<?php echo Input::get('name'); ?>" name="name" placeholder="Enter name">
            </p>

            <p>
              <label for="mobile">Mobile</label>
              <input class="text-input" type="text" id="mobile" value="<?php echo Input::get('mobile'); ?>" name="mobile" placeholder="Enter mobile number in 10 digits">
            </p>

            <p>
              <label for="password">Password</label>
              <input class="text-input" type="password" id="password" name="password" placeholder="Enter Password">
            </p>
            
            <p>
              <label for="faculty">Faculty</label>
              <?php $faculty = $db->query("SELECT * FROM faculty")->results(); ?>
              <select name="faculty" id="faculty">
                <?php foreach ($faculty as $f) : ?>
                  <option value="<?php echo $f->id; ?>"><?php echo $f->name; ?></option>
                <?php endforeach; ?>
              </select>
            </p>

              <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <p>
              <button class="btn btn-md btn-blue" type="submit">Register</button>
            </p>
          </form>

        </section>

    </div>