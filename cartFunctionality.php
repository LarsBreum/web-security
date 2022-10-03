<?php
			session_start();
			include('conn.php');
			
			if(!empty($_POST["quantity"])) {
				$productByCode = $db->query("SELECT * FROM products WHERE product_id='" . $_GET["code"] . "'");
				$productByCode = $productByCode->fetchArray();
				$itemArray = array($productByCode[0]=>array('name'=>$productByCode[1], 'code'=>$productByCode[0], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[3], 'image'=>$productByCode[4]));
			
				if(!empty($_SESSION["cart"])) {
					$_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
				} else {
					$_SESSION["cart"] = $itemArray;
				}
			}
					header('location:index.php');
	?>