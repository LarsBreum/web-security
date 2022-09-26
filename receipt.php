<?php
include 'header.php';

$json = '[{"productName":"unknown1","productId":" 776","quantity": " 3","price":100},
{"productName":"unknown2","productId":20,"quantity": 2,"price":140}, 
{"productName":"unknown3","productId":330,"quantity": 1,"price":1000},
{"productName":"unknown4","productId":230,"quantity": 5,"price":1100}]';

// DECODE 

$items = (json_decode($json, true));
$jsonUser = json_decode('{"name":"usrName1","address":" address"}', true)

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
                    echo $jsonUser['name']

                    ?>
                </strong>


   

            </div>
            <!-- Table -->
            <table>
                <thead>
                    <tr>
                        <th>product</th>
                        <th>Id</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) {

                    ?>
                        <tr>
                            <td><?php
                                echo $item['productName'] ?></td>

                            <td><?php
                                echo $item['productId'] ?></td>
                            <td><?php
                                echo $item['quantity'] ?></td>
                            <td><?php
                                echo $item['price'] ?></td>

                        </tr>

                    <?php
                    }
                    ?>
                <tbody>
            </table>
    
            <div class="totalPrice spaceBetween ">
                <strong>Total Price</strong>
                <strong>12345</strong>
            </div>

        </article>
    </section>
</main><?php
        include "footer.php";
        ?>