<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
		h1{
			margin-top: 70px;
		    margin-bottom: 50px;
		    width: 100%;
		    text-align: center;
		    color: #c32d1d;
		}
		.content{
			width: 100%;
			
		}
		.left{
			float: left;
			width: 65%;
			margin-left: 50px;
		}

		.info_cart{
			float: left;
			width: 100%;
			height: 200px;
			border: 1px solid #ebebe4;
		}
		.img{
			float: left;
			width: 40%;
			height: 150px;
			margin-top: 25px;
			text-align: center;
		}
		.img img{
			width: 50%;
			height: 100%;
		}
		.name{
			float: left;
    		width: 20%;
    		text-align: center;
    		margin-top: 80px;
		}
		.quantity{
			float: left;
			width: 10%;
			margin-top: 80px;
			text-align: center;
		}
		.quantity input{
			width: 50%;
		    text-align: center;
		    padding-top: 3px;
		    padding-bottom: 3px;
		}
		.price{
			float: left;
			width: 10%;
			margin-top: 85px;
			text-align: center;
		}
		.del{
			float: left;
		    margin-top: 85px;
		    width: 10%;
		    text-align: center;
		}
		.del a{
			text-decoration: none;
			color: black;
			padding: 10px;
		}
		.del a:hover{
			color: #c32d1d;
			background-color: #ebebe4;
		}
		.right{
			float: left;
			width: 30%;
			text-align: center;
		}
		.sum{
			margin-bottom: 30px;
		}
		.sum span{
			color: #e32124;
		}
		.order{
		    width: 60%;
		    margin-left: 85px;
		    background: red;
		    padding: 20px;
		    margin-bottom: 50px;
		    font-size: 18px;
		}
		.order a{
			text-decoration: none;
    		color: #fff;
		}
		.buy a{
			text-decoration: none;
			color: #000;
		}
		.buy a:hover{
			color: aqua;
		}
		.update{
			width: 100%;
			height: 20px;
			text-align: center;
		}
		.update input{
		    width: 15%;
		    padding-bottom: 5px;
		    padding-top: 5px;
		}
		/*.footer{
			background-color: #d46568;
			width: 100%;
			height: 100px;
			clear: both;
		}*/
	</style>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="info_product.php"><img src="logo.png" alt="logo"></a>
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
	<div>
		<h1>Giỏ hàng của bạn (<?php echo $sum; ?> sản phẩm)</h1>
	</div>
	<div class="content">
		<div class="left">
			<form action="update.php" method="POST">
			<?php 
				foreach ($_SESSION['cart'] as $key => $value) {
					echo "<div class='info_cart'>";
						echo "<div class='img'>";
							echo "<img src=". $value['image'].">";
						echo "</div>";
						echo "<div class='name'>";
							echo "<h3>".$value['name']."</h3>";
						echo "</div>";
						echo "<div class='quantity'>";
							echo  "<input type='text' name='quantity[$key]' value=".$value['quantity'].">";
						echo "</div>";
						echo "<div class='price'>";
							echo  number_format($value['price']*$value['quantity']);
						echo "</div>";
						echo "<div class='del'>";
							echo "<a href="."delete.php?id=".$value['id'].">Xóa</a>";
						echo "</div>";
					echo "</div>";
				}
			 ?>
			 <div class="update">
			 	<input type="submit" name="submit" value="update">
			 </div>
			</form>
		</div>
		 <div class="right">
		 	<div class="sum">
		 		<h2><b>Tổng tiền: 
			 		<span>
			 			<?php 
			 				$sum=0;
			 				foreach ($_SESSION['cart'] as $key => $value) {
			 					$sum=$sum+$value['price']*$value['quantity'];	
			 				} 
			 				echo number_format($sum)."<sup>đ</sup>";
			 			?>
			 		
			 		</span>
		 		</b></h2>
		 	</div>
		 	<div class="order">
		 		<a href="">TIẾN HÀNH ĐẶT HÀNG</a>
		 	</div>
		 	<div class="buy">
		 		<a href="">MUA TIẾP</a>
		 	</div>
		 </div>
	</div>
	<div class="footer">
		
	</div>
</body>
</html>