<?php
	session_start();
	?>

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php">Empty Cart</a>
<?php
if(isset($_SESSION["cart"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart"] as $item){
	
		?>
				<tr>  
				<td><?php echo $item['name']; ?></td>
				<!-- Image -->s
				<td style="text-align:right;"><?php echo $item['quantity']; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item['price']; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". $item['price'] * $item['quantity']; ?></td>
				</tr>
				<?php
				//$total_quantity += $item["quantity"];
				//$total_price += ($item["price"]*$item["quantity"])
		}
		?>
<!-- total price and quantity -->
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>