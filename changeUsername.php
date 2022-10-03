
<?php
    require'conn.php';
    $newUsername = $_POST['newUsername'];
    echo $newUsername;

    $result->query("SELECT user_username FROM users WHERE user_username = '$newUsername'");
    $row = $result->fetchArray();

    if($newUsername == "admin") {
        $_SESSION['message']="Can't set new username to admin";
        exit;
    }
    if($row) {
        $_SESSION['message']="Username not unique";
        exit;
    }
    
    $db->exec("UPDATE users SET user_username = '$newUsername' WHERE user_username='$oldeUsername");

?>