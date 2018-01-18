<?php
	session_start();
	if (isset($_POST['submit'])) {
	 	foreach ($_POST['quantity'] as $key => $value) {
	 		$_SESSION['cart'][$key]['quantity']=$value;
	 		if($value<=0){
	 			unset($_SESSION['cart'][$key]);
	 		}
	 	}
	 } 
	 header("location:viewer.php");
 ?>