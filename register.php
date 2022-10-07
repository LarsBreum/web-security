<?php
include 'header.php';
session_start();
require_once'conn.php';

$username = $_POST['username'];
$address = $_POST['address'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

if(!checkPass($password)) {
    $_SESSION['pass_message'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    header('location:signup.php');
    exit;
}

$stmt = $db->prepare("SELECT * FROM users WHERE user_username =:username");
$stmt->bindValue(':username', $username, SQLITE3_TEXT);

try {
    $result = $stmt->execute();
} catch (Exception $e) {
    echo $e;
    exit;
}

$row = $result->fetchArray();

if($row) {
    echo "Username exists";
    header('location:signup.php');
    $_SESSION['user_message']="Username exists! Please pick a new one";
    exit;
}

function checkPass($password) {
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    echo 'upper: ' . $uppercase . ' lower: ' . $lowercase . ' number: ' . $number . ' special: ' . $specialChars . ' len: ' . strlen($password) < 8;
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        return false;
    }else{
        return true;
    }

}

$stmt = $db->prepare('INSERT INTO users (user_username, user_address, user_password) VALUES (:name,:address,:password)');
$stmt->bindValue(':name', $username, SQLITE3_TEXT);
$stmt->bindValue(':address', $address, SQLITE3_TEXT);
$stmt->bindValue(':password', $hash, SQLITE3_TEXT);


try {
    $stmt->execute();
} catch(Exception $e) {
    echo $e;
    exit;
}


header('location:login.php');
$_SESSION['message']="You are now signed up! Please login";
include 'footer.php';
?>