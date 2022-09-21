<?php

require_once'conn.php';

$username = $_POST['username'];
$address = $_POST['address'];
$password = $_POST['password'];

$result = $db->query("SELECT COUNT(*) as count FROM users WHERE user_username = '$username'");
$row = $result->fetchArray();
$numRows = $row['count'];

if($numRows > 0) {
    echo "username exists";
    exit;
}

$stmt = $db->prepare("INSERT INTO users (user_username, user_address, user_password) VALUES (':username',':address',':password')");
$stmt->bindValue(':name', $username, SQLITE3_TEXT);
$stmt->bindValue(':address', $address, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);

$stmt->execute();

$newUser = $db->query("SELECT '$username' FROM users")->fetchArray();

echo $newUser[0];

?>