<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 16:11:40
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/editproduct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1064118206592c36e258dc08-23327874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '891ad9851e80463869def435b50e3b855a178e53' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/editproduct.tpl',
      1 => 1496070694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1064118206592c36e258dc08-23327874',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c36e26fed36_50331862',
  'variables' => 
  array (
    'product' => 0,
    'keywords' => 0,
    'keyword' => 0,
    'brands' => 0,
    'brand' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c36e26fed36_50331862')) {function content_592c36e26fed36_50331862($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="addproduct-body">
    <h1>Edit Product</h1>
    <hr>
    <form id="add-product" method="post">
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12" id="addproduct-content">
                <div>
                    <label for="name"><span class="glyphicon glyphicon-tag"></span> Name</label>
                    <input type="text" id="name" name="name" value=<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
>
                </div>
                <div>
                    <label for="full-name"><span class="glyphicon glyphicon-tag"></span> Full Name</label>
                    <textarea rows="2" id="full-name" name="full-name" value=<?php echo $_smarty_tpl->tpl_vars['product']->value['full_name'];?>
></textarea>
                </div>
                <div>
                    <label for="sm-description"><span class="glyphicon glyphicon-tags"></span> Small description</label>
                    <textarea rows="5" id="sm-description" name="sm-description" value=<?php echo $_smarty_tpl->tpl_vars['product']->value['full_name'];?>
></textarea>
                </div>
                <div>
                    <label for="types"><span class="glyphicon glyphicon-list"></span> Type</label>
                    <div class="select dropdown" id="types">
                        <button value="1" class="btn btn-default dropdown-toggle" id="types-search-order-bttn" data-toggle="dropdown">
                            Smartphone &nbsp;&nbsp;<span class="caret"></span>
                        </button>
                        <ul id="category" class="dropdown-menu">
                           <?php  $_smarty_tpl->tpl_vars['keyword'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['keyword']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['keywords']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['keyword']->key => $_smarty_tpl->tpl_vars['keyword']->value) {
$_smarty_tpl->tpl_vars['keyword']->_loop = true;
?>
								<li><a><?php echo $_smarty_tpl->tpl_vars['keyword']->value['name'];?>
</a></li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
            <div>
                <label for="brands"><span class="glyphicon glyphicon-list"></span> Brand</label>
                <div class="select dropdown" id="brands">
                    <button class="btn btn-default dropdown-toggle" value="" id="brands-search-order-bttn" data-toggle="dropdown">
                         &nbsp;<span class="caret"></span>
                    </button>
                    <ul id="brands-list" class="dropdown-menu">
                        <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
                            <li value=<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
><a><?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
                <div>
                    <label for="price"><span class="fa fa-money"></span> Price</label>
                    <input type="number" id="price" name="price">
                </div>

                <div>
                    <label for="qty"><span class="glyphicon glyphicon-tags"></span> Quantity</label>
                    <input type="number" id="qty" name="qty">
                </div>

                <div>
                    <label><span class="glyphicon glyphicon-picture"></span> Images</label>
                    <label for="image-input" id="browse-btn">Browse&hellip;</label>
                    <input id="image-input" name="image-input" type="file" style="display: none;">
                </div>
                <div>
                    <label for="lg-description"><span class="glyphicon glyphicon-tags"></span> Full description</label>
                    <textarea rows="10" maxlength="5" id="lg-description" name ="lg-description"></textarea>
                </div>
                <div>
                    <button id="addbutton" type="submit" class="btn btn-primary btn-block profileButton">Add</button>
                </div>
        </div>
    </form>
</div>


<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
