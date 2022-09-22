<?php
	session_start();
 
    if(isset($_SESSION['username'])){
        $_SESSION=array();
        unset($_SESSION);
        session_destroy();
    }
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - (3600));
		setcookie("pass", '', time() - (3600));
	}

	header('location:index.php');
 
?>