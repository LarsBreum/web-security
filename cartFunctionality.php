<?php
			session_start();
			
			$itemArray = array($_POST["code"]);

			if(!empty($_SESSION["cart"])) {
				$_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
			} else {
				$_SESSION["cart"] = $itemArray;
			}
			print "det här finns i cart[0]: ";
			//print $_COOKIE["cart"][0];
			header('location:index.php');
	?>

<!--case "add":
	if(!empty($_POST["quantity"])) {
		$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
		$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
		
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
	break;


 if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}
			} else {