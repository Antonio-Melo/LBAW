<?php /* Smarty version Smarty-3.1.15, created on 2017-04-19 11:50:00
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47773503658f740d86bb6d3-31529912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a732fb3ff6fdb6d8b5e834702af4285ae90b12eb' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/header.tpl',
      1 => 1492598834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47773503658f740d86bb6d3-31529912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'css_file' => 0,
    'js_file' => 0,
    'user_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f740d874fcf1_76437935',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f740d874fcf1_76437935')) {function content_58f740d874fcf1_76437935($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title>.bat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/lib/jquery/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/style/header.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/style/<?php echo $_smarty_tpl->tpl_vars['css_file']->value;?>
">
    <link rel="stylesheet" href="../style/footer.css">
	<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/lib/jquery/jquery.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/lib/jquery/jquery-ui.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/lib/canvasjs/canvasjs.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/scripts/header.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/style/<?php echo $_smarty_tpl->tpl_vars['js_file']->value;?>
"></script>
</head>
<body>
	<header>
		<!--Main nav-->
		<nav class="navbar navbar-default" id="main-nav">
			<div class="container-fluid">
				<!--Logo-->
				<div class="nav-content col-xs-3 col-sm-3 col-md-3 col-lg-3 navbar-header" id="logo">
					<a class="navbar-brand" href="home.php">
						<img src="../resources/logo/logo.png" class="hidden-xs">
						<img src="../resources/logo/logo-mobile.png" class="hidden-sm hidden-md hidden-lg">
					</a>
				</div>
				
				<!--Search bar-->
				<div class="search nav-content col-md-6 col-lg-6 hidden-xs hidden-sm">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-btn">
							<a href="search.php">
								<button class="btn btn-default" id="search-bttn" type="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</a>
						</div>
					</div>
				</div>

				<!--Menu-->
				<div class="nav-content col-xs-9 col-sm-9 col-md-3 col-lg-3" id="menu" align="right">
					<ul class="nav navbar-nav navbar-right">
						<?php if ($_smarty_tpl->tpl_vars['user_type']->value==1) {?>
							<!-- Logged in user -->
							<li><a data-toggle="modal" data-target="#authentication-modal"><span class="glyphicon glyphicon-user"></span></a></li>
							<li><a href="favorites.php"><span class="glyphicon glyphicon-heart"></span></a></li>
							<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
						<?php } elseif ($_smarty_tpl->tpl_vars['user_type']->value==2) {?>
							<!-- Visitor -->
							<li><a data-toggle="modal" data-target="#authentication-modal"><span class="glyphicon glyphicon-user"></span></a></li>
						<?php } elseif ($_smarty_tpl->tpl_vars['user_type']->value==3) {?>
							<!-- Admin -->
							<li><a data-toggle="modal" data-target="#authentication-modal"><span class="glyphicon glyphicon-user"></span></a></li>
							<li><a href="addproduct.php"><span class="glyphicon glyphicon-plus"></span></a></li>
							<li><a href="admin-stats.php"><span class="glyphicon glyphicon-stats"></span></a></li>
							<li><a href="ban-users.php"><span class="glyphicon glyphicon-ban-circle"></span></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
		</nav>
		
		<!-- Search nav for small screens -->
		<nav class="navbar navbar-default hidden-md hidden-lg" id="search-nav">
			<div class="container-fluid search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search">
					<div class="input-group-btn">
						<a href="search.php">
							<button class="btn btn-default" id="search-bttn" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</a>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Secondary nav -->
		<nav class="navbar navbar-default" id="secondary-nav">
			<!-- Catergory list -->
			<ul class="nav navbar-nav hidden-xs">
				<li><a href="category.php">Smartphones</a></li>
				<li><a href="category.php">Tablets</a></li>
				<li><a href="category.php">Peripherals</a></li>
				<li><a href="category.php">Computers</a></li>
				<li><a href="category.php">Gaming</a></li>
				<li><a href="category.php">Cameras</a></li>
				<li><a href="category.php">Accessories</a></li>
			</ul>
			
			<!-- Dropdown for small devices -->
			<div class="secondary-nav-dropdown container-fluid hidden-sm hidden-md hidden-lg">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" href="#collapse-categories">Categories <span class="caret"></span></a>
							</h4>
						</div>
						<div id="collapse-categories" class="panel-collapse collapse">
							<ul class="list-group">
								<li class="list-group-item"><a href="#">Smartphones</a></li>
								<li class="list-group-item"><a href="#">Tablets</a></li>
								<li class="list-group-item"><a href="#">Peripherals</a></li>
								<li class="list-group-item"><a href="#">Computers</a></li>
								<li class="list-group-item"><a href="#">Gaming</a></li>
								<li class="list-group-item"><a href="#">Cameras</a></li>
								<li class="list-group-item"><a href="#">Accessories</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Authentication modal -->
		<div class="modal" id="authentication-modal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<a type="button" class="closebtn" data-dismiss="modal">&times;</a>
						
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#login-tab">Log in</a></li>
							<li><a data-toggle="tab" href="#register-tab">Register</a></li>
						</ul>
					</div>
				
					<div class="modal-body">
						<div class="tab-content">
							<div id="login-tab" class="tab-pane active">
								<form class="authentication-input">
									<label for="login-username">Username/Email</label>
									<input type="text" name="username" id="login-username" required>
									<label for="login-password">Password</label>
									<input type="password" name="password" id="login-password" required>
									<button type="submit">Log in</button>
								</form>				
							</div>
							<div id="register-tab" class="tab-pane">
								<form class="authentication-input" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post">
									<label for="register-username">Username</label>
									<input type="text" name="username" id="register-username" required>
									<label for="register-name">Name</label>
									<input type="text" name="name" id="register-name" required>
									<label for="register-email">Email</label>
									<input type="text" name="email" id="register-email" required>
									<label for="register-password">Password</label>
									<input type="password" name="password" id="register-password" required>
									<label for="register-confirm-password">Confirm password</label>
									<input type="password" name="password" id="register-confirm-password" required>
									<button type="submit">Register</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</header>
	<main><?php }} ?>
