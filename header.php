<?php
    
    $db = new SQLite3('db/secureDB.sqlite');
    $db->exec("DELETE FROM users");
    $db->exec("INSERT INTO users (user_username, user_password, user_address)
                VALUES ('Lars4', 'pass', 'Lund')");

    $result = $db->query('SELECT * FROM users');
    var_dump($result->fetchArray());


?>


<header class="flexRow">
      <div class="headerContainer flexRow">
        <div class="navLeft"><a href="index.html">LOGO</a></div>
        <nav class="navCenter">
          <ul>
            <li><a href="#">Link</a></li>
          </ul>

          <ul>
            <li><a href="#">Link</a></li>
          </ul>
          <ul>
            <li><a href="#">Link</a></li>
          </ul>
        </nav>
        <div class="flexRow navRight">
          <a href="pages/signUp.php">Sign up</a>
          <a href="#">User Name</a>
          <p>|</p>
          <a href="pages/login.php">Login</a>
          <a href="pages/cart.php">Cart</a>
        </div>
      </div>
    </header>