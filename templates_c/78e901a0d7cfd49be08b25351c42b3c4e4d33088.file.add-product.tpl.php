<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 00:30:22
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/add-product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:774285141592a1964303d95-09436327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78e901a0d7cfd49be08b25351c42b3c4e4d33088' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/add-product.tpl',
      1 => 1496013626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '774285141592a1964303d95-09436327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592a1964479a27_30417078',
  'variables' => 
  array (
    'brands' => 0,
    'brand' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592a1964479a27_30417078')) {function content_592a1964479a27_30417078($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<!--
----TODO-------
1- In add-product.php get all brands from db
2- Change inputs to forms
3- Add product to db
-->
<div class="container-fluid" id="addproduct-body">
    <h1>Add New Product</h1>
    <hr>
    <form id="add-product"  method="post">
    <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12" id="addproduct-content">
            <div>
                <label for="name"><span class="glyphicon glyphicon-tag"></span> Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="full-name"><span class="glyphicon glyphicon-tag"></span> Full Name</label>
                <textarea rows="2" id="full-name" name="full-name"></textarea>
            </div>
            <div>
                <label for="sm-description"><span class="glyphicon glyphicon-tags"></span> Small description</label>
                <textarea rows="5" id="sm-description" name="sm-description" ></textarea>
            </div>
            <div>
                <label for="types"><span class="glyphicon glyphicon-list"></span> Type</label>
                <div class="select dropdown" id="types">
                    <button class="btn btn-default dropdown-toggle" id="types-search-order-bttn" data-toggle="dropdown">
                        Smartphone &nbsp;&nbsp;<span class="caret"></span>
                    </button>
                    <ul id="category" class="dropdown-menu">
                        <li><a>Smartphone</a></li>
                        <li><a>Tablet</a></li>
                        <li><a>Peripheral</a></li>
                        <li><a>Computer</a></li>
                        <li><a>Gaming</a></li>
                        <li><a>Camera</a></li>
                        <li><a>Accessories</a></li>
                    </ul>
                </div>
            </div>
        <div>
            <label for="brands"><span class="glyphicon glyphicon-list"></span> Brand</label>
            <div class="select dropdown" id="brands">
                <button class="btn btn-default dropdown-toggle" id="brands-search-order-bttn" data-toggle="dropdown">
                     &nbsp;<span class="caret"></span>
                </button>
                <ul id="brands-list" class="dropdown-menu">
                    <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
                        <li><a><?php echo $_smarty_tpl->tpl_vars['brand']->value['name'];?>
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
