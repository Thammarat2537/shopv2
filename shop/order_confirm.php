<?php include 'ordercontrol.php';
	
	$ordersql = "SELECT * FROM info WHERE user='$_SESSION[u_email]'";
	$oresult = mysqli_query($con->getConn(),$ordersql);
	while($row = mysqli_fetch_array($oresult)){
		$_SESSION['total'] = $row['total'];
		$_SESSION['vat'] = $row['vat'];
		$_SESSION['sub'] = $row['sub'];
		$name = $row['fName'];
		$address = $row['address'];
		$tel = $row['tel'];
		$_SESSION['email'] = $row['user'];
		$_SESSION['order_id'] = $row['order_id'];
	}
	
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<link rel="stylesheet" href="css/style_bill.css">

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
p.ex1 {
    padding: 0px 0px 0px 0px;
}
p.ex2 {
    border: 1px solid gray; 
    margin: 0px 0px 0px 650px;	
}
p.ex3 {
    border: 1px solid gray; 
    margin: 0px 100px 0px 100px;	
}
div.box {
    box-sizing: border-box;
    width: 50%;
    border: 1px solid black;
    float: left;
}
div.container1 {
    width: 100%;
    border: 2px solid ;
}
</style>

	</head>

	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
		<div id="fh5co-logo"><center><a href="indexPage.php">ARIS - STORE</a></center></div>
		<div id="fh5co-logo">
			<p class="ex1">Purchase order</p>
			<p class="ex1">NO.<?php echo $_SESSION['order_id']; ?></p>
		</div>
	
        
		<p class="ex2" align = 'left'>Name: <?php echo $name; ?><br />Address: <?php echo $address; ?><br />Tel: <?php echo $tel; ?><br />Email: <?php echo $_SESSION['email']; ?><br /> </p>
     </div>
	 </nav>

	<form action="order_confirm.php" method ="POST">
	<table class="wp-table">
		<tr>
		  <th>ProductID</th>
		  <th>Produce Name</th>
		  <th>Produce Category</th>
		  <th>Unit price</th>
		  <th>Total</th>
		</tr>
		<?php
			$pro_id="";
			$pro_name ="";
			$pro_price ="";
			$pro_cate ="";
			$sql = "SELECT a.id,a.name,a.price,a.category,b.p_id  FROM product a,cart b WHERE a.id=b.p_id AND b.user='$_SESSION[u_email]'";
			$result = mysqli_query($con->getConn(),$sql);
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_array($result)){
									$pro_id = $row['id'];
									$pro_name = $row['name'];
									$pro_price = $row['price'];
									$pro_cate = $row['category'];
									echo'<tr>
											<td>'.$pro_id.'</td>
											<td>'.$pro_name.'</td>
											<td>'.$pro_cate.'</td>
											<td>'.$pro_price.'</td>
											<td>test</td>
										</tr>';
								}
							}
		?>
		
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td>Sub Total</td>
		  <td><?php echo $_SESSION['sub']; ?></td>
		</tr>
		<tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td>VAT 5%</td>
		  <td><?php echo $_SESSION['vat']; ?></td>
		  <tr>
		  <td></td>
		  <td></td>
		  <td></td>
		  <td>Grandtotal</td>
		  <td><?php echo $_SESSION['total']; ?></td>
		</tr>
		</tr>
		</table>
		<br></br>
			<div><center><button type="submit" name="setOrder">Save This Order!</button></center></div>
		</form>
	
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main_bill.js"></script>



	</body>
</html>

