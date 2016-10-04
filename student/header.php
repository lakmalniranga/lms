<?php

/**
* added for the extra good security practice
*/
if(count(get_included_files()) ==1) header("Location: /404.php");
if(count(get_included_files()) ==1) exit("Page not found");

include_once( dirname(dirname(__FILE__)) .'/classes/config.php');

?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>LMS</title>
  <meta name="Learning Management System">
  <meta name="author" content="NSBM 16.1 Group 01">

  <link rel="stylesheet" href="<?php echo ROOT . "assets/css/style.css"; ?>">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
  <div id="container">
    <ul>
      <li id="lg">Logo</li>
      <li><a href="#">Box1</a></li>
      <li><a href="#">Box2</a></li>
      <li><a href="#">Box3</a></li>
      <li><a href="#">Box4</a></li>
      <li><a href="#">Box5</a></li>
      <li><a href="#">Box6</a></li>
    </ul>
  </div>
