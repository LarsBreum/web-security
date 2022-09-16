<?php
    
    $db = new SQLite3('db/secureDB.sqlite');

    $db->exec("INSERT INTO users (user_username, user_password, user_address)
                VALUES ('Lars4', 'pass', 'Lund')");

    $result = $db->query('SELECT * FROM users');
    var_dump($result->fetchArray());


?>


<header>
    <h1>Logo</header>
    <nav class="center">
        <a>Navigation link1</a>
        <a>Navigation link2</a>
        <a>Navigatin link3</a>
    </nav>
</header>