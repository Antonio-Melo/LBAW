<?php /* Smarty version Smarty-3.1.15, created on 2017-04-20 21:52:35
         compiled from "/opt/lbaw/lbaw1663/public_html/product/templates/about-us.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201541782258f91f936eb928-37384097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87289ca47e90020c23f19b9089b2c4e0c5dceec7' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/product/templates/about-us.tpl',
      1 => 1492721498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201541782258f91f936eb928-37384097',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f91f93856f34_75141955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f91f93856f34_75141955')) {function content_58f91f93856f34_75141955($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="about-us-body">
	<!-- About us -->
	<h1>About us</h1>
	<hr>
	<div class="about-us-content">
		<p>
		This project is intended for the specification, development and promotion of an online retailer of technology products (mobile phones, gadgets, accessories, etc.) that allows the display of various items that can be purchased by the clients of the site.
		</p>
		<p>
		The items for sale will be stored in a database so that it is easy to add and remove products, as well as change prices of products that are already for sale.
		The system will manage the quantity and information related to each item.
		An organization of items by category and by tags should be implemented.
		Using categories will allow a site design responsive to the user's search.
		The existence of tags facilitates the user's search through text and will serve as support for the implementation of a system of recommendations to the user based on the products in which it has shown interest.
		</p>
		<p>
		The system will allow anyone to see the various items for sale, and they will be able to filter the results (for example, by price), regardless of whether they are logged in.
		However, it is intended that potential buyers register by entering their contact and address information (for shipping the products).
		Customers will then be able to purchase any product from the store, having at their disposal both a shopping cart and a list of favorites that will allow easier management of products that capture their interest.
		 A record of all purchases made by each user will be kept.
		</p>
		<p>
		It should also be possible to make reviews (in numerical and/or descriptive form) by users for each item to allow some form of feedback that will be visible to all upcoming customers to analyze and thus have more information about each product.
		</p>
		<p>
		There will be management accounts that have privileges of addition, removal and change of products available for sale.
		They can also view information for all users, including their purchase log.
		Administrators should also be able to block user accounts (for example, if they prove to be malicious) and delete any text review whose language and/or content is not appropriate.
		</p>
		<p>
		Any questions regarding the use of the site and purchase of products can be clarified in a help page that will have both an FAQ section and a section of direct contact with the support team.
		</p>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
