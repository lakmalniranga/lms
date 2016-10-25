<?php
/**
 * DON'T RUN THIS PAGE*********
 * JUST USE SEPARATE FILE IF YOU WANT TO TASTE.
 */

require_once 'core/init.php';

// get config value
echo Config::get('mysql/host');


/**
 * Example SELECT
 */
// example raw query execution
$users = DB::getInstance()->query('SELECT * FROM users WHERE password = ?', array('pass123'));
$users = DB::getInstance()->query('SELECT * FROM users WHERE id = ?', array(4));
$post = DB::getInstance()->query('SELECT * FROM posts WHERE name like ?', array('nsbm green%'));

// example PDO query execution
// ('table_name', array('column_name', 'operator', 'value'))
// please take a look from DB class get method
$users = DB::getInstance()->get('users', array('id', '=', '4'));
$posts = DB::getInstance()->get('posts', array('title', 'like', '%plymouth university%'));

$users->first() // first result only from query
$users->limitTo(2) // limit results | in this case limit to 2
$users->results() // all results

// example loop
if ($users->count()) {
  foreach ($users->limitTo(2) as $user) {
    echo "Name: $user->name and Email: $user->email";
  }
}else {
  echo 'No Result Found';
}



/**
 * Example DELETE
 */
 // This will delete id=4 row of users table
 // $user will return true or false
$user = DB::getInstance()->get('users', array('id', '=', '4'));



/**
 * Example INSERT
 */
 $userInsert = DB::getInstance()->insert('users', array(
       'name'      => 'Jhone doe',
       'password'  => '123456',
       'salt'      => 'salt',
       'email'     => 'jhone@info.com'
 ));

 if ($userInsert) {
   echo "success";
 }else {
   echo "failed";
 }


 /**
  * Example UPDATE
  */
  // ('table_name', id_of_row, 'values')
  // this function no need special WHERE, couz of usless :P
  $userUpdate = DB::getInstance()->update('users',4 ,array(
        'name'      => 'Gemba',
        'password'  => 'hi bauwo',
        'salt'      => 'salt678',
        'email'     => 'lakmal@info.com'
  ));

  if ($userUpdate) {
    echo "success";
  }else {
    echo "failed";
  }
