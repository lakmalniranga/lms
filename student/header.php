<?php

/**
* added for the extra good security practice
*/
if(count(get_included_files()) ==1) header("Location: /404.php");
if(count(get_included_files()) ==1) exit("Page not found");

include_once( dirname(dirname(__FILE__)) .'/classes/Config.php');

?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>LMS</title>
  <meta name="Learning Management System">
  <meta name="author" content="NSBM 16.1 Group 01">

  <link rel="stylesheet" href="<?php echo ROOT . "/assets/css/style.css"; ?>">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
  <div id="container">
  <nav class="navbar">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#home">Forum</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
      </ul>
  </nav>
  </div>

  <div id="side">
  <aside class="sidebar">
    <ul>
      <div id="top">
          <li id="top2">Menu</li>
      </div>
          <li><a href="#">example 1</a></li>
          <li><a href="#">example 2</a></li>
          <li><a href="#">example 3</a></li>
          <li><a href="#">example 4</a></li>
          <li><a href="#">example 5</a></li>
          <li><a href="#">example 6</a></li>
          <li><a href="#">example 7</a></li>
          <li><a href="#">example 8</a></li>
          <li><a href="#">example 9</a></li>
    </ul>
  </aside>

</div>
