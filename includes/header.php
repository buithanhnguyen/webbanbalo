<?php
    include 'connect.php';
?>

<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 live<span class="live"> support</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
					<div class="down-top">
						<select class="in-drop">
							<option value="English" class="in-of">English</option>
							<option value="Japanese" class="in-of">Japanese</option>
							<option value="French" class="in-of">French</option>
							<option value="German" class="in-of">German</option>
						</select>
					</div>
					

					<!---->
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="index.html"><img src="../../bbackpack/images/logobag.png" width="150px" height="80px"
								alt=" " /></a>
					</div>
					<div class="search">
                        <form action="search.php" method="GET" >
                            <input type="text" name="search" value="<?php echo isset($_GET['search'])?$_GET['search']:''; ?>" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = '';}">
                            <input type="submit" name="submitSearch" value="SEARCH">
                        </form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">
					<div class="account"><a href="login.php"><span> </span>YOUR ACCOUNT</a></div>
					<ul class="login">
						<li><a href="login.php"><span> </span>LOGIN</a></li> |
						<li><a href="register.html">SIGNUP</a></li>
					</ul>
					<div class="cart"><a href="#"><span> </span>CART</a></div><div class="a"><a href="logout.php"><span> </span>LOGOUT</a></div>
						
					
					<div class="clearfix"> </div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>