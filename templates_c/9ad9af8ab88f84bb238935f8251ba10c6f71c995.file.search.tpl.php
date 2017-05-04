<?php /* Smarty version Smarty-3.1.15, created on 2017-05-04 08:50:23
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124811045158fe18342fd7e8-14730495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ad9af8ab88f84bb238935f8251ba10c6f71c995' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/search.tpl',
      1 => 1493883626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124811045158fe18342fd7e8-14730495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fe183448a527_87486429',
  'variables' => 
  array (
    'products_keywords' => 0,
    'keyword' => 0,
    'filters' => 0,
    'products_brands' => 0,
    'brand' => 0,
    'i' => 0,
    'nr_pages' => 0,
    'current_page' => 0,
    'start_page' => 0,
    'end_page' => 0,
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fe183448a527_87486429')) {function content_58fe183448a527_87486429($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="search-body">

	<!-------------------------------------------------------------------------------------------------------------------------->
	<!-- Side -->
	<!-- Mobile extras -->
	<button onclick="openNav()" class="btn btn-default hidden-sm hidden-md hidden-lg" id="side-nav-bttn" type="submit">
		<span class="glyphicon glyphicon-menu-hamburger"></span>
	</button>
	
	<div id="search-mobile-background-filter" class="hidden-xs hidden-sm hidden-md hidden-lg mobile-background-filter" onclick="closeNav()"></div>
	
	<!-- Filters nav -->
	<nav class="panel-group sidenav hidden-xs visible-sm-block visible-md-block visible-lg-block" id="search-filters">
		<a href="javascript:void(0)" class="closebtn hidden-sm hidden-md hidden-lg" onclick="closeNav()">&times;</a>
	
		<!-- Category -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-categories">
				<div class="panel-heading">
					<h4 class="panel-title">Categories<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-categories" class="panel-collapse collapse in">
				<ul class="list-group">
					<?php  $_smarty_tpl->tpl_vars['keyword'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keyword']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products_keywords']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['keyword']->key => $_smarty_tpl->tpl_vars['keyword']->value) {
$_smarty_tpl->tpl_vars['keyword']->_loop = true;
?>
						<li class='list-group-item'>
							<label for=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
><?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
</label>
							<div class='custom-checkbox'>
								<input id=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
 type='checkbox' value=''
								<?php if (in_array($_smarty_tpl->tpl_vars['keyword']->value,$_smarty_tpl->tpl_vars['filters']->value['keywords'])) {?>
									checked
								<?php }?>
								>
								<label for=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
></label>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
		<!-- Price -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-price">
				<div class="panel-heading">
					<h4 class="panel-title">Price<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-price" class="panel-collapse collapse in">
				<label for="filter-price-amount">Range:</label>
				<input type="text" id="filter-price-amount" readonly>
				<div id="filter-price-slider"
				<?php if (isset($_smarty_tpl->tpl_vars['filters']->value['prices'][0])&&isset($_smarty_tpl->tpl_vars['filters']->value['prices'][1])) {?>
					min=<?php echo $_smarty_tpl->tpl_vars['filters']->value['prices'][0];?>
 max=<?php echo $_smarty_tpl->tpl_vars['filters']->value['prices'][1];?>

				<?php }?>
				></div>
			</div>
		</div>
		
		<!-- Brand -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-brands">
				<div class="panel-heading">
					<h4 class="panel-title">Brand<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-brands" class="panel-collapse collapse in">
				<ul class="list-group">
					<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products_brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
						<li class='list-group-item'>
							<label for=<?php echo $_smarty_tpl->tpl_vars['brand']->value;?>
><?php echo $_smarty_tpl->tpl_vars['brand']->value;?>
</label>
							<div class='custom-checkbox'>
								<input id=<?php echo $_smarty_tpl->tpl_vars['brand']->value;?>
 type='checkbox' value=''
								<?php if (in_array($_smarty_tpl->tpl_vars['brand']->value,$_smarty_tpl->tpl_vars['filters']->value['brands'])) {?>
									checked
								<?php }?>
								>
								<label for=<?php echo $_smarty_tpl->tpl_vars['brand']->value;?>
></label>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
		<!-- On sale -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-onsale">
				<div class="panel-heading">
					<h4 class="panel-title">On sale<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-onsale" class="panel-collapse collapse in">
				<ul class="list-group">
					<li class="list-group-item"><label for="scb">On sale</label><div class="custom-checkbox"><input id="scb" type="checkbox" value=""
					<?php if ($_smarty_tpl->tpl_vars['filters']->value['onsale']=="true") {?>
						checked
					<?php }?>
					><label for="scb"></label></div></li>
				</ul>
			</div>
		</div>
		
		<!-- Rating -->
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#filter-rating">
				<div class="panel-heading">
					<h4 class="panel-title">Rating<i class="fa fa-caret-down"></i></h4>
				</div>
			</a>
			<div id="filter-rating" class="panel-collapse collapse in">
				<div class="rating">
					<!-- stars -->
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						<input id=<?php echo ("rating-input-").($_smarty_tpl->tpl_vars['i']->value);?>
 type="radio" value=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 name="rating-input"
						<?php if (isset($_smarty_tpl->tpl_vars['filters']->value['rating'])&&$_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['filters']->value['rating']) {?>
							checked
						<?php }?>						
						/>
						<label class="rating-star" for=<?php echo ("rating-input-").($_smarty_tpl->tpl_vars['i']->value);?>
></label>
					<?php }} ?>
					<span>&nbsp & up</span>
				</div>
			</div>
		</div>
		
		<button class="btn btn-default" id="filter-search-bttn">Filter</button>
	</nav>

	<!-------------------------------------------------------------------------------------------------------------------------->
	<!-- Top -->
	<nav id="search-display">
		<!-- Square/List -->
		<button class="btn btn-default" id="search-display-bttn">
			<span class="glyphicon glyphicon-th-large"></span>
		</button>
		
		<!-- Order by -->
		<div class="dropdown" id="search-order">
			<button class="btn btn-default dropdown-toggle" id="search-order-bttn" data-toggle="dropdown">
				<?php if (isset($_GET['order'])) {?>
					<?php echo $_GET['order'];?>

				<?php } else { ?>
					Sort by:
				<?php }?>
				 &nbsp;&nbsp;<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a>Relevant</a></li>
				<li><a>Higher price</a></li>
				<li><a>Lower price</a></li>
				<li><a>Most sold</a></li>
				<li><a>Best rating</a></li>
				<li><a>Name: A -> Z</a></li>
				<li><a>Name: Z -> A</a></li>
			</ul>
		</div>
	</nav>
	<hr>

	<!------------------------------------------------------------------------------------------------------------------------->
	<!-- Center -->
	<div class="items-display" id="search-results">
		<?php if ($_smarty_tpl->tpl_vars['nr_pages']->value>1) {?>
			<div class="page-selector">
				<ul class="pagination pull-right">
					<li><a go=1><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span></a></li>
					<li><a go=<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 before=true><span class="glyphicon glyphicon-menu-left"></span></a></li>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['end_page']->value+1 - ($_smarty_tpl->tpl_vars['start_page']->value) : $_smarty_tpl->tpl_vars['start_page']->value-($_smarty_tpl->tpl_vars['end_page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['start_page']->value, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						<li 
						<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['current_page']->value) {?>
							class="active"
						<?php }?>
						><a go=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a><li>
					<?php }} ?>
					<li><a go=<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 max=<?php echo $_smarty_tpl->tpl_vars['nr_pages']->value;?>
 next=true><span class="glyphicon glyphicon-menu-right"></span></a></li>
					<li><a go=<?php echo $_smarty_tpl->tpl_vars['nr_pages']->value;?>
><span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a></li>
				</ul>
			</div>
		<?php }?>
	
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<div id=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
 class="product-mosaic col-lg-3 col-md-4 col-sm-6 col-xs-6">
				<div class="product-image-container">
					<?php if ($_smarty_tpl->tpl_vars['product']->value['url']!=null) {?>
						<a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
><img src=<?php echo ("../images/products/").($_smarty_tpl->tpl_vars['product']->value['url']);?>
 alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
></a>
					<?php } else { ?>
						<a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
><img src="../images/products/common/default.png" alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
></a>
					<?php }?>
				</div>
				<div class="product-info-container">
					<div class="center-block">
						<div class="list-left-container">
							<div class="name"><a href=<?php echo ("product.php?id=").($_smarty_tpl->tpl_vars['product']->value['product_id']);?>
><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</a></div>
							<div class="type-brand"><a><?php echo $_smarty_tpl->tpl_vars['product']->value['keyword_name'];?>
</a> - <a><?php echo $_smarty_tpl->tpl_vars['product']->value['brand_name'];?>
</a></div>					
						</div>
						<div class="list-middle-container">
							<?php if ($_smarty_tpl->tpl_vars['product']->value['stock']>0) {?>
								<div class="available"><span class="glyphicon glyphicon-ok"></span>&nbsp; Available</div>
							<?php } else { ?>
								<div class="unavailable"><span class="glyphicon glyphicon-remove"></span>&nbsp; Unavailable</div>
							<?php }?>
							<div class="rating">
								<?php if ($_smarty_tpl->tpl_vars['product']->value['nr_ratings']!=0) {?>
									<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? round($_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings'])+1 - (1) : 1-(round($_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings']))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
										<img src="../images/products/common/star.png" alt=<?php echo $_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings'];?>
>
									<?php }} ?>
								<?php }?>
							</div>					
						</div>
						<div class="list-right-container">
							<div>
								<?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=null) {?>
									<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['sale_price'],2);?>
&euro;</span>
									<span class="old-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
								<?php } else { ?>
									<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
									<span class="old-price"></span>
								<?php }?>
							</div>
							<button class="btn btn-default" id="product-fav-bttn">
								<span class="glyphicon glyphicon-heart"></span>
							</button>
							<button class="btn btn-default" id="product-cart-bttn">
								<span class="glyphicon glyphicon-shopping-cart"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<?php if ($_smarty_tpl->tpl_vars['nr_pages']->value>1) {?>
			<div class="page-selector">
				<ul class="pagination pull-right">
					<li><a go=1><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span></a></li>
					<li><a go=<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 before=true><span class="glyphicon glyphicon-menu-left"></span></a></li>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['end_page']->value+1 - ($_smarty_tpl->tpl_vars['start_page']->value) : $_smarty_tpl->tpl_vars['start_page']->value-($_smarty_tpl->tpl_vars['end_page']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['start_page']->value, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						<li 
						<?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['current_page']->value) {?>
							class="active"
						<?php }?>
						><a go=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a><li>
					<?php }} ?>
					<li><a go=<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 max=<?php echo $_smarty_tpl->tpl_vars['nr_pages']->value;?>
 next=true><span class="glyphicon glyphicon-menu-right"></span></a></li>
					<li><a go=<?php echo $_smarty_tpl->tpl_vars['nr_pages']->value;?>
><span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a></li>
				</ul>
			</div>
		<?php }?>		
	</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
