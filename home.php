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
      <p>
        possimus? Porro vero eos quam dicta fugit repellendus dolorum quod a
      </p>
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
          <form action="cartFunctionality.php?code=' . $product_id . '" method = "POST">
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