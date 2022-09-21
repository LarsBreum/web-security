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

$db->prepare("INSERT INTO users VALUES (':username',':address',':password'");
$db->bindValue(':name', $username);
$db->bindValue(':address', $address);
$db->bindValue(':password', $password);

$db->execute();

$allUsers = $db.query("SELECT * FROM users");
var_dump($allUsers);

?>