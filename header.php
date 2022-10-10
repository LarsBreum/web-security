<?php

  //ini_set("allow_url_fopen", true);
  //ini_set("allow_url_include", true);
    
   /*  $db = new SQLite3('db/secureDB.sqlite');
    $db->exec("DELETE FROM users");
    $db->exec("INSERT INTO users (user_username, user_password, user_address)
                VALUES ('Lars4', 'pass', 'Lund')");

    $result = $db->query('SELECT * FROM users');
    var_dump($result->fetchArray()); */

  session_start();

  $title = "Webshop";
  $pages = array("Home", "Signup", "Login", "Cart", "Receipt");

  if(isset($_SESSION['username']) && $_SESSION['username'] == "admin") {
    array_push($pages, "Products", "users"); //giving adming a bit more power
  }


?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <meta http-equiv="Content-Security-Policy" content="Content-Security-Policy: default-src 'self' example.com *.example.com;" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="main-container">
<header class="flexRow">
      <div class="headerContainer flexRow">
        <div class="flexRow navRight">
          <?php 
            // if ($_SESSION['user_logged_in']){
            //   echo '<a href="#">' . $_SESSION['username'] . '</a>
            //         <p>|</p>
            //         <a href="logout.php">Log out</a>';
            // }
            // else {
            //   echo '<a href="login.php">Log in</a>';
            // }
          ?>
          <ul>
          <?php
            /*foreach ($pages as $page) {
              if($page == "Home") {
                $output = "index";
              } else {
                $output = $page;
              }
              if($activePage == $page) {
                echo '<li><a href=' . $output . '.php "class="active">' . $page . '</a></li>';
              } else {
                echo '<a href=' . $output . '.php  "> ' . $page . '</a>';
              }
          }
          */
        ?>

        <li><a href='index.php'>Home</a></li>
        <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
        <li><p><?php echo $_SESSION['username']?></p>
        <a href='logout.php'>Logout</a></li>
        <?php else: ?>
        <li><a href='signup.php'>Signup</a></li>
        <li><a href='login.php'>Login</a></li>
        <?php endif; ?>
        <li><a href='cart.php'>Cart</a></li>
        <li><a href='receipt.php'>Receipt</a></li>
      </div>
    </header>