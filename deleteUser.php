
<?php


    if(isset($_GET['username'])) {

        require'conn.php';
        $username = $_GET['username'];
        echo 'username: ' . $username;

        if($username == "admin") {
            echo "can't delete admin";
            exit;
        }

       // echo $username;
        
        $succes = $db->exec("DELETE FROM users WHERE user_username = '$username'");

        if($succes) {
            echo 'user: ' . $username . ' deleted';
            exit;
        } else {
            echo 'error';
        }

    } 
    
?>