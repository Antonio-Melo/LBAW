<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:52:44
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/sitemap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96434285558fa511a89e8e7-02748373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8739e740e88aa9dbe940907f04980aa3c26fd95' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/sitemap.tpl',
      1 => 1496091144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96434285558fa511a89e8e7-02748373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa511aa052b9_76209291',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa511aa052b9_76209291')) {function content_58fa511aa052b9_76209291($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="sitemap-body">
	<!-- Sitemap -->
	<h1>Sitemap</h1>
	<hr>
	<div class="sitemap-content">
		<p><a href="home.php"><span class="glyphicon glyphicon-chevron-right"></span> Home</a></p>
		<h2>Catalog</h2>
		<p><a href="product.php?id=1"><span class="glyphicon glyphicon-chevron-right"></span> Product</a></p>
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
