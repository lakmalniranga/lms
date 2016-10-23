<?php

/**
* added for the extra good security practice
*/
if(count(get_included_files()) ==1) header("Location: /404.php");
if(count(get_included_files()) ==1) exit("Page not found");

include_once( dirname(dirname(__FILE__)) .'/classes/Config.php');
require_once 'core/init.php';

?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>LMS</title>
  <meta name="Learning Management System">
  <meta name="author" content="NSBM 16.1 Group 01"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ROOT . "assets/css/style.css"; ?>">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container">
  
      <header>
        <div class="row">
          <div class="column column-8">
            <img src="http://nsbm.lk/img/logos/nsbm-logo.png" alt="Logo" class="logo">
          </div>

          <div class="column column-4 login-box">
            <?php if ($user->isLoggedIn()) : ?>
              <p>Loged as : <?php echo ucfirst($user->data()->username); ?></p>
              <a href="logout.php" class="btn btn-sm btn-blue">Logout</a>
            <?php else : ?>
              <a href="login.php" class="btn btn-sm btn-blue">Login</a>
            <?php endif; ?>
          </div>
        </div>
        
        <div class="row">    
          <nav class="column column-12 navbar">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Chat</a></li>
            </ul>
          </nav>

        </div>

      </header>
      

      
