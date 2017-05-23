<?php /* Smarty version Smarty-3.1.15, created on 2017-05-23 01:14:35
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/faqs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:270921456590adad556a924-18269714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c65ed192120debe6cdfa187427bccf0a6cb997b' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/faqs.tpl',
      1 => 1495498473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270921456590adad556a924-18269714',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_590adad56fad04_11067862',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590adad56fad04_11067862')) {function content_590adad56fad04_11067862($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="faqs-body">
	<!-- Faqs -->
	<h1>FAQs</h1>
	<hr>
	<div class="faqs-content">
		<ul class="nav nav-pills">
			<li class="active">
				<a data-toggle="pill" href="#aboutUs">
					<h2> <i class="fa fa-user-circle-o" ></i>&nbsp; About Us</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#payment">
					<h2> <i class="fa fa-money" ></i>&nbsp; Payment</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#shipmentDelivery">
					<h2> <i class="fa fa-plane" ></i>&nbsp; Shipment & Delivery</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#warrantyReturn">
					<h2> <i class="fa fa-certificate" ></i>&nbsp; Warranty & Return</h2>
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<!-- About us -->
			<div id="aboutUs" class="tab-pane active">
				<div class="list-group panel">
					<a href="#question1" class="list-group-item" data-toggle="collapse">Our mission <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question1">
						<p>At .bat, our company vision is simple: to become the premier online electronics seller by providing an unparalleled selection of the very best gadgets, an unbeatable shopping experience, prompt shipping and exceptional customer service that exceeds expectations.</p>
						<p>For us, the customer is always king. Our total commitment to customers empowers us to work closely together with every customer. When you buy from us, the sale is not complete when we ship your order, it is complete when you are totally satisfied.</p>
					</div>

					<a href="#question2" class="list-group-item" data-toggle="collapse">Can you trust .bat? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question2">
						<p>.bat holds its own inventory in secure state of the art warehouse facilities, we adhere to exceptional quality control processes and operate an extensive Customer Support Center offering multiple service channels.</p>
						<p>Our professional servers and website are security scanned, authenticated and fully verified by Norton Secure from Norton on a daily basis to protect you online. Click on the official Norton trustmark to learn more. You can learn more on our Secure Shopping page. Shop with confidence at .bat.</p>
					</div>
				</div>
			</div>

			<!-- Payment -->
			<div id="payment" class="tab-pane">
				<div class="list-group panel">
					<a href="#question10" class="list-group-item" data-toggle="collapse">Can I pay COD - cash on delivery? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question10">
						<p>No. Sorry. We can only accept payment in advance. You can use one of our secure payment methods to pay for your order.</p>
					</div>

					<a href="#question11" class="list-group-item" data-toggle="collapse">Payment methods accepted <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question11">
						<p>.bat primarily uses PayPal to process secure online payments. Through PayPal, we accept MasterCard, VISA, American Express, Cashu, Webmoney, Boleto, Discover, and bank transfer (debit card).</p>
					</div>

					<a href="#question12" class="list-group-item" data-toggle="collapse">What is Paypal? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question12">
						<p>Paypal offers a highly secure method to send money from your credit card, bank account, or stored online credit, without telling online shops your confidential credit card numbers. .bat staff will never ask you for your full credit card numbers or Paypal login details. For your own security, please do not give this information to anyone (including our staff) and do not click on links inside emails purporting to be from Paypal. charge you a fee for uploading money to their system or making payments. Please check on their relevant information pages for specific details.</p>
					</div>
				</div>
			</div>

			<!-- Shipment and delivery -->
			<div id="shipmentDelivery" class="tab-pane">
				<div class="list-group panel">
					<a href="#question4" class="list-group-item" data-toggle="collapse">What countries does .bat deliver to? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question4">
						<p>We can deliver orders to every countries in the world. Goods are sent from Antarctica by courier, and delivered direct to your door (home or company address).</p>
					</div>

					<a href="#question5" class="list-group-item" data-toggle="collapse">How much will I be charged for shipping? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question5">
						<p>Every .bat order is unique so our shipping costs vary depending on the size, weight and destination of your chosen items. This information will appear at the checkout. </p>
					</div>

					<a href="#question6" class="list-group-item" data-toggle="collapse">When will I receive my items? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question6">
						<p>Once your order details are confirmed, your item will be carefully prepared and sent on its way within 2 business days. Delivery will normally take 2-7 days after dispatch, depending on your location and chosen shipping method.</p>
					</div>
				</div>
			</div>

			<!-- Warranty and return -->
			<div id="warrantyReturn" class="tab-pane">
				<div class="list-group panel">
					<a href="#question13" class="list-group-item" data-toggle="collapse">What is your return policy? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question13">
						<p>If your purchase isn’t quite right, you can return it for a refund within 14 days of your delivery date using our free returns service.</p>
					</div>

					<a href="#question14" class="list-group-item" data-toggle="collapse">What if a product is broken? <i class="fa fa-caret-down"></i></a>
					<div class="collapse answer" id="question14">
						<p>If any product is faulty, you are protected under the .bat Warranty.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
