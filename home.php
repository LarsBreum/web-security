<?php

  require_once'conn.php';
  
  $products = $db->query("SELECT * FROM products");

  $activePage = "Home"

?>

<!-- MAIN -->
<main>
  <!-- BANNER -->
  <section class="banner">
    <div class="bannerTitle">
      <h1>WEB SHOP</h1>
      <p> <?php

$url = 'https://fancyssl.hboeck.de/';

$protocols = [
    'TLS1.0' => ['protocol' => CURL_SSLVERSION_TLSv1_0, 'sec' => false],
    'TLS1.1' => ['protocol' => CURL_SSLVERSION_TLSv1_1, 'sec' => false],
    'TLS1.2' => ['protocol' => CURL_SSLVERSION_TLSv1_2, 'sec' => true],
    'TLS1.3' => ['protocol' => CURL_SSLVERSION_TLSv1_3, 'sec' => true],
];

foreach ($protocols as $name => $value) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSLVERSION, $value['protocol']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch) !== false;

    if ($value['sec'] && !$response) {
        echo "Secure $name not supported =( \n";
    } elseif ($value['sec'] && $response) {
        echo "Ok! Secure $name supported \n";
    } elseif (!$value['sec'] && $response) {
        echo "Insecure $name supported =( \n";
    } elseif (!$value['sec'] && !$response) {
        echo "Ok! Insecure $name not supported\n";
    }
} ?> </p>
      <!-- BUTTON -->
      <a class="btn" href="product.html">Product</a>
    </div>
    <img class="bannerImg" src="./img/cat1.jpg" alt="a cat" />
  </section>
  <!-- PRODUCTS -->
  <section class="products">
    <h2>Products</h2>
    <h1></h1>
    <div class="productsContainer">

    <?php
    //försökar att loopa genom alla products i databasen och skriva ut dem

      if(!isset($products)) { //guard clause
        echo "No products for sale!";
        exit();
      }

       while ($product = $products->fetchArray()) {
        //echo "Product: {$product['product_name']}";

        $product_img = $product['product_img'];
        $product_name = $product['product_name'];
        $product_price = $product['product_price'];
        $product_desc = $product['product_desc'];
        $product_id = $product['product_id'];
        
        //var_dump($product_img);

        $output = '<article class="product">
          <div class="imageHolder">
            <img src="' . $product_img . '" alt="angry cat" />
          </div>
          <h3>' . $product_name . '</h3>
          <span>' . $product_price . "$" . '</span>
          <a>' . $product_desc . '</a>
          <!-- BUTTON -->
          <form action="cartFunctionality.php?action=add&code=' . $product_id . '" method = "POST">
            <div class="itemQuantity"><input type="text" placeholder="Input number" name="quantity"/><input type="submit" value="Add to Cart" class="btn submit"/></div>
          </form>
          </article>';
        //$out = "string" . $product;

        echo $output;
       }
    ?>
 

    </div>
  </section>
</main>