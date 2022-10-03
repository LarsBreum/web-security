<?php
session_start();
require_once'conn.php';


$username = $_POST['username'];
$address = $_POST['address'];
$password = $_POST['password'];

if(!checkPass($password)) {
    header('location:index.php?page=signup.php');
    exit;
}

$result = $db->query("SELECT * FROM users WHERE user_username ='$username'");
$row = $result->fetchArray();

if($row) {
    echo "Username exists";
    header('location:index.php?page=signup.php');
    $_SESSION['message']="Username exists! Please pick a new one";
    exit;
}

function checkPass($pass) {
    if(strlen($pass) < 8) {
        $_SESSION['message']="Password not ok, pick a safer one";
        return false;
    }
    return true;
}

$stmt = $db->prepare('INSERT INTO users (user_username, user_address, user_password) VALUES (:name,:address,:password)');
$stmt->bindValue(':name', $username, SQLITE3_TEXT);
$stmt->bindValue(':address', $address, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);


try {
    $stmt->execute();
} catch(Exception $e) {
    echo $e;
    exit;
}


header('location:index.php?page=login.php');
$_SESSION['message']="You are now signed up! Please login";

?>