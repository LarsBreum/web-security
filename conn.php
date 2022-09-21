<?php
class mySqlite extends SQLite3{
    function __construct(){
        $this->open('db/secureDB.sqlite');
    }
}
$db = new mySqlite();
$stmt = $db->exec("INSERT INTO `users` (`user_username`, `user_password`, `user_address`) VALUES 
    ('admin', 'pass', 'Address 1')");
?>