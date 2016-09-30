<?php

/**
* added for the extra good security practice
*/
if(count(get_included_files()) ==1) header("Location: /404.php");
if(count(get_included_files()) ==1) exit("Page not found");

include_once( dirname(dirname(__FILE__)) .'/config.php');

if ($config['DEBUG']==1) {
  ini_set('display_errors', 'On');
}

?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>LMS</title>
  <meta name="Learning Management System">
  <meta name="author" content="NSBM 16.1 Group 01">

  <link rel="stylesheet" href="../assets/css/style.css">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>
<body>
  navbar
