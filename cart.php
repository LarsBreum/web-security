<?php 
    include 'header.php'
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
        $item_price = rand(10, 100);
		?>
				<tr>
                    <!-- image -->
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["code"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["code"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				//$total_quantity += $item["quantity"];
				//$total_price += ($item["price"]*$item["quantity"]);
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

<?php
	include 'footer.php'
?>