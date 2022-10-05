<?php
	session_start();
	$activePage = "Cart";
	include 'header.php';
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
				<!-- Image -->
				<td style="text-align:right;"><?php echo $item['quantity']; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".number_format($item['price']); ?></td>
				<td  style="text-align:right;"><?php echo "$ ".number_format($item['price'] * $item['quantity']); ?></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>
	<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<?php 
	if (isset($_COOKIE["user"]) || isset($_SESSION["username"])) { ?>
		<form method= "POST" action="index.php?page=receipt.php&total=<?php echo $total_price ?>">
			<input type= "submit" value="Pay!" class="btn submit"/>
		</form>
		<?php
	} else {
		echo "<h3>You must be logged in to pay!</h3>";
	} ?>




  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}

?>
</div>

<?php 
	include 'footer.php';
?>