<?php


$db = new SQLite3('db/secureDB.sqlite');

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


?>