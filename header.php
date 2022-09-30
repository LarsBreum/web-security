<?php
    
   /*  $db = new SQLite3('db/secureDB.sqlite');
    $db->exec("DELETE FROM users");
    $db->exec("INSERT INTO users (user_username, user_password, user_address)
                VALUES ('Lars4', 'pass', 'Lund')");

    $result = $db->query('SELECT * FROM users');
    var_dump($result->fetchArray()); */

  session_start();
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
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto">
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <div class="main-container">
<header class="flexRow">
      <div class="headerContainer flexRow">
        <div class="navLeft"><a href="index.php">LOGO</a></div>
        <nav class="navCenter">
          <ul>
            <li><a href="./receipt.php">Link-receipt</a></li>
          </ul>

          <ul>
            <li><a href="#">Link</a></li>
          </ul>
          <ul>
            <li><a href="#">Link</a></li>
          </ul>
        </nav>
        <div class="flexRow navRight">
          <a href="signUp.php">Sign up</a>
          <?php 
            if ($_SESSION['user_logged_in']){
              echo '<a href="#">' . $_SESSION['username'] . '</a>
                    <p>|</p>
                    <a href="logout.php">Log out</a>';
            }
            else {
              echo '<a href="login.php">Log in</a>';
            }
          ?>
          <a href="cart.php">Cart</a>
        </div>
      </div>
    </header>