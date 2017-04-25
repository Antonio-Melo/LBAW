<?php /* Smarty version Smarty-3.1.15, created on 2017-04-25 20:28:13
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6288832958fa43e2cfb9a8-89651167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88c180c7712baa87c0b2995a45e2e6a70a4246d1' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/product.tpl',
      1 => 1493148472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6288832958fa43e2cfb9a8-89651167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58fa43e303fa87_56323364',
  'variables' => 
  array (
    'product' => 0,
    'faqs' => 0,
    'faq' => 0,
    'reviews' => 0,
    'review' => 0,
    'reply' => 0,
    'i' => 0,
    'filters' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fa43e303fa87_56323364')) {function content_58fa43e303fa87_56323364($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="panel-body items-display" id=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
>
    <div id="product-image" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="product-image-container">
            <?php if ($_smarty_tpl->tpl_vars['product']->value['url']!=null) {?>
				<img src=<?php echo ("../images/products/").($_smarty_tpl->tpl_vars['product']->value['url']);?>
>
			<?php } else { ?>
				<img src="../images/products/common/default.png">
			<?php }?>
        </div>
        <div class="product-info-container">
            <div class="center-block">
                <span class="name"><h1><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</h1></span>
				<span>
					<?php if ($_smarty_tpl->tpl_vars['product']->value['nr_ratings']!=0) {?>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings']+1 - (1) : 1-($_smarty_tpl->tpl_vars['product']->value['rating']/$_smarty_tpl->tpl_vars['product']->value['nr_ratings'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
							<img src="../images/products/common/star.png">
						<?php }} ?>
					<?php }?>
				</span>
            </div>
        </div>
    </div>
    <div id="product-info" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<?php if (isset($_SESSION['username'])&&isset($_SESSION['admin'])) {?>
			<button id="editproduct" type="button" class="btn btn-primary btn-block profileButton">Edit product</button>
		<?php }?>
        
		<div class="full-description">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<span class="full-name"> <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['full_name'];?>
</h3></span><br>
				</div>
			</div>
			<span class="sub-description">
				<?php echo $_smarty_tpl->tpl_vars['product']->value['small_description'];?>

			</span>
			<hr>
			<?php if ($_smarty_tpl->tpl_vars['product']->value['stock']>0) {?>
				<div class="available"><span class="glyphicon glyphicon-ok"></span>&nbsp; Available</div>
			<?php } else { ?>
				<div class="unavailable"><span class="glyphicon glyphicon-remove"></span>&nbsp; Unavailable</div>
			<?php }?>
		</div>
		
		<div class="product-pricing">
			<?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=null) {?>
				<h4>Flash sale price:</h4>
				<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['sale_price'],2);?>
&euro;</span>
				<span class="old-price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
			<?php } else { ?>
				<h4>Price:</h4>
				<span class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value['price'],2);?>
&euro;</span>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['product']->value['sale_price']!=null) {?>
				<div class="progress">
					<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="50"
						 aria-valuemin="0" aria-valuemax="100" style="width:50%">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
 left
					</div>
				</div>
			<?php }?>
			<div class="product-shipping">
				<br><span>Shipping Cost: FREE SHIPPING Via Unregistered Air Mail</span>
			</div>
		</div>
		
		<div class="product-add">
			<?php if (isset($_SESSION['username'])&&!isset($_SESSION['admin'])) {?>
				<div class="product-buttons">
					<div class="product-buttons-buttons">
						<button type="button" class="btn btn-primary" id="add-to-cart">
							<span class="glyphicon glyphicon-shopping-cart"></span>
							Add to Cart
						</button>
						<button type="button" class="btn btn-primary" id="add-to-fav">
							<span class="glyphicon glyphicon-heart"></span>
							Add to Favorites
						</button>
					</div>
				</div>
			<?php }?>
			
			<div class="item-verifications">
				<img src="../images/products/common/paypal-verified.png" alt="paypal">
				<img src="../images/products/common/money.png" alt="money">
			</div>
		</div>
    </div>

    <div class="full-info-container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#description"> <i class="fa fa-info-circle"></i> Description</a></li>
                <li><a data-toggle="tab" href="#faq"> <i class="fa fa-question-circle"></i> FAQ</a></li>
                <li><a data-toggle="tab" href="#customer-rv"><i class="fa fa-comment" style="font-size:20px"></i> Customer Reviews</a></li>
                <li><a data-toggle="tab" href="#sp"><i class="fa fa-plane" style="font-size:20px"></i> Shipping & Payment</a></li>
            </ul>

            <div class="tab-content">
                <div id="description" class="tab-pane fade in active"><br>
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                </div>

				
                <div id="faq" class="tab-pane fade"><br>
                    <div class="list-group panel">
						<?php  $_smarty_tpl->tpl_vars['faq'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['faq']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['faqs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['faq']->key => $_smarty_tpl->tpl_vars['faq']->value) {
$_smarty_tpl->tpl_vars['faq']->_loop = true;
?>
							<a href=<?php echo ("#").($_smarty_tpl->tpl_vars['faq']->value['faq_id']);?>
 class="list-group-item" data-toggle="collapse"><?php echo $_smarty_tpl->tpl_vars['faq']->value['question'];?>
</a>
							<div class="collapse answer" id=<?php echo $_smarty_tpl->tpl_vars['faq']->value['faq_id'];?>
>
								<br><p><?php echo $_smarty_tpl->tpl_vars['faq']->value['answer'];?>
</p>
							</div>
						<?php } ?>
                    </div>
                </div>
                <div id="customer-rv" class="tab-pane fade">
                    <br>
					<?php  $_smarty_tpl->tpl_vars['review'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['review']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reviews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['review']->key => $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->_loop = true;
?>
						<div class="media">
							<div class="media-left">
								<?php if ($_smarty_tpl->tpl_vars['review']->value['url']!=null) {?>
									<img class="media-object" src=<?php echo ("../images/users/").($_smarty_tpl->tpl_vars['review']->value['url']);?>
>
								<?php } else { ?>
									<img class="media-object" src="../images/users/common/default_client.png">
								<?php }?>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['review']->value['name'];?>
</h4>
								<span>
									<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['review']->value['rating']+1 - (1) : 1-($_smarty_tpl->tpl_vars['review']->value['rating'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
										<img class="star" src="../images/products/common/star.png">
									<?php }} ?>
								</span>
								<?php if ($_smarty_tpl->tpl_vars['review']->value['comment']!=null) {?>
									<p><?php echo $_smarty_tpl->tpl_vars['review']->value['comment'];?>
</p>
								<?php }?>
								
								<!-- REPLIES -->
								<?php  $_smarty_tpl->tpl_vars['reply'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reply']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['review']->value['replies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reply']->key => $_smarty_tpl->tpl_vars['reply']->value) {
$_smarty_tpl->tpl_vars['reply']->_loop = true;
?>
									<div class="media">
										<div class="media-left">
											<?php if ($_smarty_tpl->tpl_vars['reply']->value['url']!=null) {?>
												<img class="media-object answer-pic" src=<?php echo ("../images/users/").($_smarty_tpl->tpl_vars['reply']->value['url']);?>
>
											<?php } else { ?>
												<img class="media-object answer-pic" src="../images/users/common/default_admin.png">
											<?php }?>
										</div>
										<div class="media-body">
											<h4 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['reply']->value['name'];?>
</h4>
											<p><?php echo $_smarty_tpl->tpl_vars['reply']->value['message'];?>
</p>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<hr>
					<?php } ?>
		<?php if (isset($_SESSION['username'])) {?>		
			<div id="write_review">
				<form id="review" class="review-input" method="post">
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
					<label for="comment">Comment:</label>
		  			<textarea class="form-control" name ="text_review"rows="5" id="comment"></textarea>
					<button id="submit" type="submit" class="btn btn-success product-buttons button">Submit</button>
				</form>
			</div>
		<?php }?>

                </div>
                <div id="sp" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Shipping Type</th>
                                <th>Country or Region</th>
                                <th>Estimated Shipping Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                <td rowspan="10">Flat Rate Shipping</td>
                                <tr>
                                    <td>United States</td>
                                    <td>10-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Russia,Kraine</td>
                                    <td>10-40 Business Days</td>
                                </tr>
                                    <td>United Kindom, Ireland, Germany, France, Italy, Netherlands, Belgium, Austria,Switzerland, Spain, Portugal</td>
                                    <td>10-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Canada,Australia,New Zealand</td>
                                    <td>15-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Belarus,Estonia,Latavia,Moldova</td>
                                    <td>15-35 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Japan,Korea</td>
                                    <td>15-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Brazil, Argentina, Uruguay, Peru </td>
                                    <td>15-40 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Norway, Sweden, Finland, Iceland, Denmark</td>
                                    <td>15-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Egypt, Iran, Iraq, Israel, Jordan, Kuwait, Suaudi Arabia, United Arab Emirates, Yemen</td>
                                    <td>15-40 Business Days</td>
                                </tr>
                                <td rowspan="5">Priority Direct Mail</td>
                                <tr>
                                    <td>Russia </td>
                                    <td>10-25 Days</td>
                                </tr>
                                <tr>
                                    <td>United States, United Kingdom, Germany, France, Italy, Spain, Portugal </td>
                                    <td>7-15 Days</td>
                                </tr>
                                <tr>
                                    <td>Canada, Australia </td>
                                    <td>7-15 Days</td>
                                </tr>
                                <tr>
                                    <td>Korea</td>
                                    <td>5-10 Days</td>
                                </tr>
                                <td rowspan="2">Standard Shipping</td>
                                <tr>
                                    <td>Worldwide</td>
                                    <td>6-10 Business Days</td>
                                </tr>
                                <td rowspan="2">Expedited Shipping</td>
                                <tr>
                                    <td>Worldwide</td>
                                    <td>3-7 Days</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
