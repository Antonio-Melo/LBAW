<!DOCTYPE html>
<html>
<head>
    <title>.bat</title>
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="<?=$cssPath?>">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">
	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
</head>
<body>
	<header>
		<!--Main nav-->
		<nav class="navbar navbar-default" id="main-nav">
			<div class="container-fluid">
				<div class="row">
					<!--Logo-->
					<div class="nav-content col-xs-3 col-sm-3 col-md-3 col-lg-3 navbar-header" id="logo">
						<a class="navbar-brand" href="#">
							<img src="../resources/logo/logo.png" class="hidden-xs hidden-sm">
							<img src="../resources/logo/logo-mobile.png" class="visible-xs-inline-block visible-sm-inline-block">
						</a>
					</div>
					
					<!--Search bar-->
					<div class="nav-content col-xs-6 col-sm-6 col-md-6 col-lg-6" id="search-div">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search">
							<div class="input-group-btn">
								<button class="btn btn-default" id="search-bttn" type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
						</div>
					</div>
					
					<!--Menu-->
					<div class="nav-content col-xs-3 col-sm-3 col-md-3 col-lg-3" id="menu" align="right">
						<div class="dropdown visible-xs-inline-block visible-sm-inline-block">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-menu-hamburger"></button>
							<!-- MAKE MODAL INSTEAD OF DROP DOWN
							
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="#"><span class="glyphicon glyphicon-user"></a></li>
								<li><a href="#"><span class="glyphicon glyphicon-heart"></a></li>
								<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></a></li>
							</ul>
							-->
						</div>

						<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
							<li><a href="#"><span class="glyphicon glyphicon-heart"></span></a></li>
							<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		
		<!--Categories-->
		<nav class="navbar navbar-default" id="secondary-nav">
			<ul class="nav navbar-nav hidden-xs">
				<li><a href="#">Smartphones</a></li>
				<li><a href="#">Tablets</a></li>
				<li><a href="#">Peripherals</a></li>
				<li><a href="#">Computers</a></li>
				<li><a href="#">Gaming</a></li>
				<li><a href="#">Cameras</a></li>
				<li><a href="#">Accessories</a></li>
			</ul>
			
			<ul class="nav navbar-nav visible-xs-inline-block">
				<li><a href="#">Check out these deals!</a></li>
			</ul>
		</nav>
	</header>
