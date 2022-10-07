<?php

include('header.php');
session_start();
include('conn.php');

$total = $_GET["total"];    
$userinfo = $db->query("SELECT * FROM users WHERE user_username= '" . $_SESSION["username"] . "'");
$userinfo = $userinfo->fetchArray();

?>
<!-- MAIN -->
<main>
    <!-- BANNER -->
    <section class="container">

        <h1>Receipt</h1>
        <h2> </h2>
        <div class="subtitle flexRow spaceBetween">


        </div>
        <article class="receiptContainer">

        <!-- Data & User info -->
            <div class="info">
                <strong>
                <?php
                date_default_timezone_set("Europe/Stockholm");
                echo date("h:i:sa");
                ?>
                </strong>
                <strong class="infoUser">
                    <?php
                    echo $_SESSION["username"];
                    echo "    ";
                    echo $userinfo["user_address"];


                    ?>
                </strong>

            </div>
            <!-- Table -->
            <table>
                <thead>
                    <tr>
                        <th>product</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION["cart"] as $item) {

                    ?>
                        <tr>
                            <td><?php
                                echo $item['name'] ?></td>

                            <td><?php
                                echo $item['code'] ?></td>
                            <td><?php
                                echo $item['quantity'] ?></td>
                            <td><?php
                                echo "$ ".number_format($item['price']) ?></td>
                            <td><?php
                                echo "$ ".number_format($item['price'] * $item['quantity']) ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                <tbody>
            </table>
    
            <div class="totalPrice spaceBetween ">
                <strong>Total Price</strong>
                <strong><?php echo $_SESSION["totalPrice"] ?></strong>
            </div>
        </article>
    </section>
<?php
    unset($_SESSION["cart"]);
    include('footer.php');
?>
</main>