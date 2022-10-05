<?php
	if(isset($_POST['login'])){
 
		session_start();
		include('conn.php');
 
		$username=$_POST['username'];
		$password=$_POST['password'];
 
        $stmt = $db-prepare('SELECT * FROM users WHERE user_username=:username AND user_password=:password');
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':password', $password, SQLITE3_TEXT);

        try {
            $result = $stmt->execute();
        } catch(Exception $e) {
            echo $e;
            exit;
        }
        
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