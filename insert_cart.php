<?php
	session_start();
	require_once "list_product.php";
	$id=$_GET['id'];
	echo $id; 
	$new_product=[];
	echo "<pre>";
	// print_r($list_product);

	foreach ($list_product as  $value) {
		foreach ($value as $key => $val) {
			$new_product[$val['id']]=$val;
		}
	}
	if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null){
		$new_product[$id]['quantity'] = 1;
		$_SESSION['cart'][$id]=$new_product[$id];
	}
	else{
		if(array_key_exists($id, $_SESSION['cart'])){
			$_SESSION['cart'][$id]['quantity'] ++;
		}
		else{
			$_SESSION['cart'][$id]=$new_product[$id];
			$_SESSION['cart'][$id]['quantity'] =1;
			}
	}
	print_r($_SESSION['cart']) ;
	header("location:info_product.php");
 ?>