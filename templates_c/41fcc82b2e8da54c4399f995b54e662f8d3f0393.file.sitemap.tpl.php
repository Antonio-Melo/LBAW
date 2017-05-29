<?php /* Smarty version Smarty-3.1.15, created on 2017-04-20 21:52:37
         compiled from "/opt/lbaw/lbaw1663/public_html/product/templates/sitemap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47352124658f91f95d57881-46079705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41fcc82b2e8da54c4399f995b54e662f8d3f0393' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/product/templates/sitemap.tpl',
      1 => 1492721493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47352124658f91f95d57881-46079705',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f91f95ecfed8_44222367',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f91f95ecfed8_44222367')) {function content_58f91f95ecfed8_44222367($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="sitemap-body">
	<!-- Sitemap -->
	<h1>Sitemap</h1>
	<hr>
	<div class="sitemap-content">
		<p><a href="home.php"><span class="glyphicon glyphicon-chevron-right"></span> Home</a></p>
		<h2>Catalog</h2>
		<p><a href="product.php"><span class="glyphicon glyphicon-chevron-right"></span> Product</a></p>
		<p><a href="category.php"><span class="glyphicon glyphicon-chevron-right"></span> Category</a></p>
		<p><a href="search.php"><span class="glyphicon glyphicon-chevron-right"></span> Search</a></p>
		<h2>User</h2>
		<p><a href="profile.php"><span class="glyphicon glyphicon-chevron-right"></span> Profile</a></p>
		<p><a href="favorites.php"><span class="glyphicon glyphicon-chevron-right"></span> Favorites</a></p>
		<p><a href="cart.php"><span class="glyphicon glyphicon-chevron-right"></span> Cart</a></p>
		<h2>Admin</h2>
		<p><a href="addproduct.php"><span class="glyphicon glyphicon-chevron-right"></span> Add Product</a></p>
		<p><a href="editproduct.php"><span class="glyphicon glyphicon-chevron-right"></span> Edit Product</a></p>
		<p><a href="admin-stats.php"><span class="glyphicon glyphicon-chevron-right"></span> Admin Stats</a></p>
		<p><a href="ban-users.php"><span class="glyphicon glyphicon-chevron-right"></span> Ban Users</a></p>
		<h2>Customer service</h2>
		<p><a href="terms-conditions.php"><span class="glyphicon glyphicon-chevron-right"></span> Terms & Conditions</a></p>
		<p><a href="contact-us.php"><span class="glyphicon glyphicon-chevron-right"></span> Contact Us</a></p>
		<p><a href="faqs.php"><span class="glyphicon glyphicon-chevron-right"></span> FAQs</a></p>
		<p><a href="about-us.php"><span class="glyphicon glyphicon-chevron-right"></span> About Us</a></p>
		<p><a href="sitemap.php"><span class="glyphicon glyphicon-chevron-right"></span> Sitemap</a></p>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
