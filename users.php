
<?php
    require'conn.php';
?>

<main>
   <section>
    <h2>Edit users</h2>
    <p>This page will allow an administrator to add, delete and change users.</p>
    <div id="user-list">
        <?php
            $result = $db->query("SELECT * FROM users");

           // var_dump($users);
            $user_num = 1;
            while ($user = $result->fetchArray()) {
                echo '<h3 class="username" onclick="changeUsername(this)">' . $user['user_username'] . '</h3>';
                echo '<p>Address: ' . $user['user_address'] . '</p>' ;
                echo '<p>Password: ' . $user['user_password'] . '</p>' ;
                echo '<a class="btn" href="deleteUser.php?username= ' . $user['user_username'] . '">Delete User</a>';
                //
                $user_num++;
            }
        ?>
    </div>
   </section>
</main>
