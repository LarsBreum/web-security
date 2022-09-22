<?php
	if(isset($_POST['login'])){
 
		session_start();
		include('conn.php');
 
		$username=$_POST['username'];
		$password=$_POST['password'];
 
		$result = $db->query("SELECT * FROM users WHERE user_username='$username' AND user_password='$password'");
        $row = $result->fetchArray();
		if (!$row){
			$_SESSION['message']="Login Failed. User not Found!";
			header('location:login.php');
		}
		else{ 
			if (isset($_POST['remember'])){
				//set up cookie
				setcookie("user", $row['user_username'], time() + (86400 * 30)); 
				setcookie("pass", $row['user_password'], time() + (86400 * 30)); 
			}
 
			//$_SESSION['id']=$row['userid'];
            $_SESSION['username']=$username;
            $_SESSION['address']=$row['user_address'];
            $_SESSION['user_logged_in'] = true;
			header('location:index.php');
		}
	}
	else{
		header('location:login.php');
		$_SESSION['message']="Please Login!";
	}
?>