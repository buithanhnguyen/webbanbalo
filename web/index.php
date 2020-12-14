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
	<div class="container">
	<h1>AAA</h1>
	<?php
		$ma= isset($_GET['maloai'])?$_GET['maloai']:'';
		$data=[$ma];
		
		$sql="select * from loai where maloai = ?";
		$stmt=$conn->prepare($sql);
		$stmt->execute($data);
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		//var_dump($row);exit;
		echo " Tên loại: ".$row['tenloai'];

	?>
	<?php
		$ma= isset($_GET['maloai'])?$_GET['maloai']:'';
		$data=[$ma];
		$sql = "SELECT tenloai,count(*) as tong from balo where maloai=?";
		$stmt =$conn ->prepare($sql);
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		$soluong=$stmt->fetch(PDO::FETCH_ASSOC); 
		//var_dump($soluong['tong']);exit; 
		echo "tong san pham" .$soluong['tong'];
		


	?>
		<div class="shoes-grid">
			<a href="single.html">
				<div class="wrap-in">
					<div class="wmuSlider example1 slide-grid">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; width: 100%; opacity: 0;">
								<div class="banner-matter">
									<div class="col-md-5 banner-bag">
										<img class="img-responsive " src="images/bagsale1.jpg" alt=" " />
									</div>
									<div class="col-md-7 banner-off">
										<h2>FLAT 50% 0FF</h2>
										<label>FOR ALL PURCHASE <b>VALUE</b></label>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et </p>
										<span class="on-get">GET NOW</span>
									</div>

									<div class="clearfix"> </div>
								</div>

							</article>
							<article style="position: absolute; width: 100%; opacity: 0;">
								<div class="banner-matter">
									<div class="col-md-5 banner-bag">
										<img class="img-responsive " src="images/bagsale2.jpg" alt=" " />
									</div>
									<div class="col-md-7 banner-off">
										<h2>FLAT 50% 0FF</h2>
										<label>FOR ALL PURCHASE <b>VALUE</b></label>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et </p>
										<span class="on-get">GET NOW</span>
									</div>

									<div class="clearfix"> </div>
								</div>

							</article>
							<article style="position: absolute; width: 100%; opacity: 0;">
								<div class="banner-matter">
									<div class="col-md-5 banner-bag">
										<img class="img-responsive " src="images/hg1.jpg" alt=" " />
									</div>
									<div class="col-md-7 banner-off">
										<h2>FLAT 50% 0FF</h2>
										<label>FOR ALL PURCHASE <b>VALUE</b></label>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et </p>
										<span class="on-get">GET NOW</span>
									</div>

									<div class="clearfix"> </div>
								</div>

							</article>

						</div>
			</a>
			<ul class="wmuSliderPagination">
				<li><a href="#" class="">0</a></li>
				<li><a href="#" class="">1</a></li>
				<li><a href="#" class="">2</a></li>
			</ul>
			<script src="js/jquery.wmuSlider.js"></script>
			<script>
				$('.example1').wmuSlider();         
			</script>
		</div>
	</div>
	</a>

	<!--2 san pham dau trang-->
	<div class="shoes-grid-left">
		<a href="single.html">
			<div class="col-md-6 con-sed-grid">

				<div class=" elit-grid">

					<h4>consectetur elit</h4>
					<label>FOR ALL PURCHASE VALUE</label>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
					<span class="on-get">GET NOW</span>
				</div>
				<img class="img-responsive shoe-left" src="images/hg3.jpg" alt=" " />

				<div class="clearfix"> </div>

			</div>
		</a>
		<a href="single.html">
			<div class="col-md-6 con-sed-grid sed-left-top">
				<div class=" elit-grid">
					<h4>consectetur elit</h4>
					<label>FOR ALL PURCHASE VALUE</label>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
					<span class="on-get">GET NOW</span>
				</div>
				<img class="img-responsive shoe-left" src="images/hs1.jpg" alt=" " />

				<div class="clearfix"> </div>
			</div>
		</a>
	</div>


	<!-- San Pham -->
	<div class="products">
		<h5 class="latest-product">LATEST PRODUCTS</h5>
		<a class="view-all" href="product.html">VIEW ALL<span> </span></a>
	</div>

	<div class="product-left">
		<?php
        $para=array();
		$trang=1;
	

        if(isset($_GET['trang']))
            $trang = $_GET['trang'];
        if(isset($_GET['maloai'])){
            $sql="select * from balo where maloai=?";
            $para[]=$_GET['maloai'];
        }else
            $sql="select * from balo";
        $sql .= ' limit '.($trang-1)*$balo1trang.','.$balo1trang;
        $stmt=$conn->prepare($sql);

        $stmt->execute($para);
        while($balo=$stmt->fetch(PDO::FETCH_ASSOC)){
                
		?>
		<div class="col-md-4 moto_col">
			<div class="card">
				<a href="single.html?mabalo=<?php echo $balo['mabalo']; ?>"><img class="img-responsive chain moto_image"
						src="images/<?php echo explode(',',$balo['hinh'])[0]; ?>" alt=" " /></a>
				<span class="star"> </span>
				<div class="grid-chain-bottom">
					<h6><a href="single.html?mabalo=<?php echo $balo['mabalo']; ?>"><?php echo $balo['tenbalo']; ?></a>
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
		<?php } ?>



		<div class="clearfix"> </div>
	</div>


	<!-- 3 san pham cuoi trang -->
	<div class="products">
		<h5 class="latest-product">SPECIAL BST</h5>
		<a class="view-all" href="index.php?maloai=002">VIEW ALL<span> </span></a>
	</div>
	<div class="product-left">
	<?php
            $signature=3;
            $sql="select * from balo where maloai=002";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $i=0;
            while($balo=$stmt->fetch(PDO::FETCH_ASSOC)){
                if($i<3){
        ?>
		
		<div class="col-md-4 chain-grid grid-top-chain">
		<a href="single.html?mabalo=<?php echo $balo['mabalo']; ?>"><img class="img-responsive chain moto_image" src="images/<?php echo explode(',',$balo['hinh'])[0]; ?>" alt=" " /></a>
			<span class="star"> </span>
			<div class="grid-chain-bottom">
			<h6><a href="single.html?mabalo=<?php echo $balo['mabalo']; ?>"><?php echo $balo['tenbalo']; ?></a></h6>
				<div class="star-price">
					<div class="dolor-grid">
					<span class="actual"><?php echo number_format($balo['gia']); ?> VND</span>
						
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
		<?php 
                }
            $i++; } 
        ?>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
	</div>
	<!-- tinh tong so balo -->

	<?php
    /* if(isset($_GET['tenloai']))
        $sql="select count(*) from balo where tenloai=?";
    else
        $sql="select count(*) from balo"; */
   
    ?>

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