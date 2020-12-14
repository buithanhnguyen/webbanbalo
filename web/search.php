<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	include('../includes/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Big shope A Ecommerce Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>
	<!--script-->
</head>

<body>
	<!--header-->
	<?php
		include "../includes/header.php";
	?>

	<!---->


	


	<!-- San Pham -->
	<div class="products">
		<h5 class="latest-product">KẾT QUẢ TÌM KIẾM</h5>
		<a class="view-all" href="product.html">VIEW ALL<span> </span></a>
	</div>

	<div class="product-left">
		<?php
		$para=array();
		$search = isset($_GET['search'])?$_GET['search']:'';
		$search= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $search);
        if($search == ''){
            echo '<script language="javascript">'; 
		    echo 'alert("Không được để trống ")'; 
            echo '</script>';
        }else{
            
        }
        if(isset($_GET['submitSearch'])){
            if(isset($_GET['search'])){
                $sql="select * from balo where tenbalo=?";
                $para[]=$_GET['search'];
            }
            $stmt=$conn->prepare($sql);

            $stmt->execute($para);
            while($balo=$stmt->fetch(PDO::FETCH_ASSOC)){
                
		?>
		<div class="col-md-4 moto_col">
			<div class="card">
				<a href="single.php?mabalo=<?php echo $balo['mabalo']; ?>"><img class="img-responsive chain moto_image"
						src="images/<?php echo explode(',',$balo['hinh'])[0]; ?>" alt=" " /></a>
				<span class="star"> </span>
				<div class="grid-chain-bottom">
					<h6><a href="single.php?mabalo=<?php echo $balo['mabalo']; ?>"><?php echo $balo['tenbalo']; ?></a>
					</h6>
					<div class="star-price">
						<div class="dolor-grid">
							<span class="actual"><?php echo number_format($balo['gia']); ?> VND</span>
							<!-- <span class="reducedfrom">400$</span> -->
							<span class="rating">
								<input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
								<label for="rating-input-1-5" class="rating-star1"> </label>
								<input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
								<label for="rating-input-1-4" class="rating-star1"> </label>
								<input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
								<label for="rating-input-1-3" class="rating-star"> </label>
								<input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
								<label for="rating-input-1-2" class="rating-star"> </label>
								<input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
								<label for="rating-input-1-1" class="rating-star"> </label>
							</span>
						</div>
						<a class="now-get get-cart" href="#">ADD TO CART</a>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<?php } 
		}
		?>



		<div class="clearfix"> </div>
	</div>



	

	<!-- MENU LEFT -->
	<div class="sub-cate">
		<?php
			include "../includes/menuleft.php";
		?>
	</div>
	<div class="clearfix"> </div>
	</div>

	<!--FOOTER-->
	<?php
		include "../includes/footer.php";
	?>

</body>

</html>