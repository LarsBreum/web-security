
<?php
    include 'header.php';

    //including the pages
    $page = isset($_GET['page']) ? $_GET['page'] : "home.php";

    include($page);

    //include 'home.php';
    include "footer.php";
?>
