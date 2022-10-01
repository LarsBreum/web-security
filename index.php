
<?php
    include 'header.php';

    //including the pages
    $page = isset($_GET['page']) ? $_GET['page'] : "home.php";

    if( file_exists($page)) include($page);
    else echo "404: Page not found";

    //include 'home.php';
    include "footer.php";
?>
