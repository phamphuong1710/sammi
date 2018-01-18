<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sammi</title>
	<style>
	*{
		margin:0;
		padding:0;
	}
		.header{
			width: 100%;
			height: 100px;
			/*background-color: #db1b4b;*/
		}
		.logo{
			width: 30%;
			height: 100%;
			float: left;
			text-align: center;
		}
		.logo img{
			width: 50%;
			height: 100%;
		}
		.nav{
			float: left;
			width: 70%;
			margin-top: 55px;
		}
		.nav ul{
			list-style-type: none;
			width: 100%;
		}
		.nav li{
			display: inline-block;
			width: 18%;
			text-align: center;
			font-size: 20px;
		}
		.nav a{
			text-decoration: none; 
			color: #db1b4b;
		}
		/*.nav li:hover{
			background-color: #db1b4b;
		}*/
		.nav a:hover{
			color: #aaaaaa;
		}
		.content{
			width: 100%;
			height: 1530px;
		}
		.product{
			float: left;
			width: 25%;
			text-align: center;
			margin-bottom: 40px;
		}
		.product img{
			width: 200px;
			height: 200px; 
			padding-bottom: 20px;
    		padding-top: 15px
		}
		 h2{
		 	clear: both;
			color: #b90022;
			width: 100%;
			text-align: center;
			margin-top: 35px;
			margin-bottom: 30px;
		}
		.product h3{
			color: #db1b4b;
			width: 100%;
			text-align: center;
		}
		.product a{
			text-decoration: none;
			color: #737373;
			padding-left: 20px;
    		padding-bottom: 10px;
        	border: 1px solid #d46568;
			padding-top: 5px;
			padding-right: 20px;
   			 border-radius: 20px;
		}
		.product a:hover{
			background-color: #d46568;
			border: none;
			color: white;
		}
		.product p{
			padding-bottom: 15px;
		}
		.footer{
			clear: both;
			width: 100%;
			height: 100px;
			background-color: #d46568;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href=""><img src="logo.png" alt="logo"></a>
		</div>
		<div class="nav">
			<ul>
				<li><a href="">Toner</a></li>
				<li><a href="">Lipstick</a></li>
				<li><a href="">Xịt khoáng</a></li>
				<li><a href="">Sữa rửa mặt</a></li>
				<li>
					<?php 
						$sum=0;
						if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
							foreach ($_SESSION['cart'] as $key => $value) {
								$sum= $sum + $value['quantity'];
							}
						}
						echo "<a href="."viewer.php".">".$sum." Sản phẩm</a>";
					 ?>
				</li>
			</ul>
		</div>
	</div>
	
	<?php 
		require_once "list_product.php";
		echo "<div class='content'>";	
				echo "<h2>Các loại toner HOT</h2>";
				foreach ($list_product['toner'] as $value) {
					echo "<div class ='product'>";
					echo "<img src=".$value['image']."><h3>".$value['name']."</h3><p>".number_format($value['price'])."<sup>đ</sup></p><a href="."insert_cart.php?id=".$value['id'].">Mua ngay</a>";
					echo "</div>";
				}
				echo "<h2>Các loại son HOT</h2>";
				foreach ($list_product['lipstick'] as $value) {
					echo "<div class ='product'>";
					echo "<img src=".$value['image']."><h3>".$value['name']."</h3><p>".$value['price']."</p><a href="."insert_cart.php?id=".$value['id'].">Mua ngay</a>";
					echo "</div>";
				}
			
		echo "</div>";
	?>
	<div class="footer">
		
	</div>
	
</body>
</html>