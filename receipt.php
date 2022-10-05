<?php

session_start();
include('conn.php');
$activePage = "Receipt";
include 'header.php';

$total = $_GET["total"];    
$stmt = $db->prepare('SELECT * FROM users WHERE user_username=:username');
$stmt = bindValue(':username', $_SESSION["username"], SQLITE3_TEXT);
try {
    $userinfo = $stmt->execute();
} catch(Exception $e) {
    echo $e;
    exit;
}
$userinfo = $userinfo->fetchArray();
$json = '[{"productName":"unknown1","productId":" 776","quantity": " 3","price":100},
{"productName":"unknown2","productId":20,"quantity": 2,"price":140}, 
{"productName":"unknown3","productId":330,"quantity": 1,"price":1000},
{"productName":"unknown4","productId":230,"quantity": 5,"price":1100}]';

// DECODE 

$items = (json_decode($json, true));
$jsonUser = json_decode('{"name":"usrName1","address":" address"}', true);


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
                <strong><?php echo $total ?></strong>
            </div>

        </article>
    </section>
</main>

<?php 
    include 'footer.php';
?>