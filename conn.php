<?php
class mySqlite extends SQLite3{
    function __construct(){
        $this->open('db/secureDB.sqlite');
    }
}
$db = new mySqlite();
?>