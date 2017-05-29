<?php /* Smarty version Smarty-3.1.15, created on 2017-05-26 23:49:53
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/contact-us.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4778399245901a7989f39b6-42188971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca3c362b6e586cf75ddec1b3e8812afe02e69541' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/contact-us.tpl',
      1 => 1495838831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4778399245901a7989f39b6-42188971',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5901a798b024b5_18952247',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5901a798b024b5_18952247')) {function content_5901a798b024b5_18952247($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="contact-us-body">
	<!-- Contact us -->
	<h1>Contact us</h1>
	<hr>
	<div class="contact-us-content">
		<div>
			<h2>Phone</h2>
			<p><span class="contact">+351 265 130 093</span> (Available Monday to Friday 8am-11pm GMT and Saturday to Sunday 9am-9pm GMT).</p>
		</div>
		<div>
			<h2>Email</h2>
			<p><span class="contact">batech@gmail.com</span> (Replies in 24 hours).
		</div>
		<div>
			<h2>FAQs</h2>
			<p>Find the answer to your need in our <a class="contact" href="faqs.php">FAQs</a> section.</p>
		</div>
		
		<?php if (isset($_SESSION['id'])&&!isset($_SESSION['admin'])) {?>
			<div>
				<h2>Submit a ticket</h2>
				<form id="ticket" method="post" action="../actions/submitticket.php">
					<label for="subject">Subject:</label>
					<input type="text" name="subject" id="subject" required>
				
					<label for="description">Description:</label>
					<textarea name="description" rows="5" id="description"></textarea>
					
					<button class="btn btn-default" id="submit" type="submit">Submit</button>
				</form>
			</div>
		<?php }?>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
