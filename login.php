<?php

require_once 'student/header.php';

if ($user->isLoggedIn()) {
  Redirect::to('index.php');
}


if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $validation = $validate->check($_POST, array(
      'username' => array('required' => true),
      'password' => array('required' => true)
    ));

    if ($validation->passed()) {

      $remember = (Input::get('remember') === 'on') ? true : false;

      $login = $user->login(Input::get('username'), Input::get('password'), $remember);

      if ($login) {
        Session::flash('home', 'you have successfuly loged');
        Redirect::to('index.php');

      } else {
        $validate->addError('Invalid login, please try again');
      }
    }
  }
}


?>

  <section>
    <div class="row">
      <div class="column column-12">
        <div class="login">
          
          <div id="errors" class="errors">
            <?php if (!empty($validate->errors())) : ?>
              <ul>
                <?php foreach ($validate->errors() as $error) : ?>
                  <li><?php echo $error; ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>

          <form id="loginform" method="post">
            <p>
              <label for="username">Username</label>
              <input class="inputer" type="text" id="username" value="<?php echo Input::get('username'); ?>" name="username">
            </p>
            <p>
            <label for="password">Password</label>
            <input class="inputer" type="password" id="password" name="password">
            </p>
            <p>
              <input type="checkbox" name="remember"> Remember Me
            </p>
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <p><button class="btn" type="submit">Login</button></p>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php require_once 'student/footer.php' ?>;
