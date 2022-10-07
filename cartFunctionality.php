<?php
		session_start();
		include('conn.php');
		$action = $_GET["action"];
			
		switch($action): 
			case 'add':
				if(!empty($_POST["quantity"])) {
				$productByCode = $db->query("SELECT * FROM products WHERE product_id='" . $_GET["code"] . "'");
				$productByCode = $productByCode->fetchArray();
				$itemArray = array($productByCode[0]=>array('name'=>$productByCode[1], 'code'=>$productByCode[0], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[3], 'image'=>$productByCode[4]));
			
				if(!empty($_SESSION["cart"])) {
					echo($itemArray["code"][0]);
					echo('<br/>');
					echo(array_keys($_SESSION["cart"]));
					//kod för att produkter ska adderas till totalen istället för att överskriva tidigare produkter i cart, funkar inte
					if(in_array($itemArray["code"],array_keys($_SESSION["cart"]))) {
						echo ('steg 1');
						echo('<br/>');
						foreach($_SESSION["cart"] as $k => $v) {
							echo('steg 2');
							if($productByCode[0]["code"] == $k) {
								echo('<br/>');
								echo('steg 3');
								if(empty($_SESSION["cart"][$k]["quantity"])) {
									echo('<br/>');
									echo('steg 4');
									$_SESSION["cart"][$k]["quantity"] = 0;
								}
								$_SESSION["cart"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					}
					$_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
				} else {
					echo('<br/>');
					echo('nu är vi här');
					$_SESSION["cart"] = $itemArray;
					}
				}
				//header('location:index.php');
				break;

			case "remove":
				if(!empty($_SESSION["cart"])) {
					foreach($_SESSION["cart"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart"][$k]);				
						if(empty($_SESSION["cart"]))
							unset($_SESSION["cart"]);
					}
				}
				header('location:cart.php');
				break;
			case "empty":
				unset($_SESSION["cart"]);
				header('location:index.php');
				break;
		endswitch;
	?>
	<a href="index.php">åk hem</a>