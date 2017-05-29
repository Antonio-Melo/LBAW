<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 17:54:25
         compiled from "/opt/lbaw/lbaw1663/public_html/LBAW/templates/check-reports.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1601105418592c2febf0cb69-70047035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5c4a7c40e1a77fe6f12aae940a0768567528b84' => 
    array (
      0 => '/opt/lbaw/lbaw1663/public_html/LBAW/templates/check-reports.tpl',
      1 => 1496076862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1601105418592c2febf0cb69-70047035',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c2febf2f831_93842500',
  'variables' => 
  array (
    'nr_pages' => 0,
    'current_page' => 0,
    'start_page' => 0,
    'end_page' => 0,
    'i' => 0,
    'reports' => 0,
    'report' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c2febf2f831_93842500')) {function content_592c2febf2f831_93842500($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid" id="check-reports-body">

    <?php if (isset($_SESSION['id'])&&isset($_SESSION['admin'])) {?>
        <h1>Reports</h1>
        <hr>
        <div class="tickets-content">
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
            <div class="list-group panel">
                <?php  $_smarty_tpl->tpl_vars['report'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['report']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['report']->key => $_smarty_tpl->tpl_vars['report']->value) {
$_smarty_tpl->tpl_vars['report']->_loop = true;
?>
                    <a href=<?php echo ("#").($_smarty_tpl->tpl_vars['report']->value['report_id']);?>
 class="list-group-item" data-toggle="collapse"><?php echo $_smarty_tpl->tpl_vars['report']->value['reported'];?>
 by: <?php echo $_smarty_tpl->tpl_vars['report']->value['user'];?>
 (<?php echo $_smarty_tpl->tpl_vars['report']->value['username'];?>
) <i class="fa fa-caret-down"></i></a>
                    <div class="collapse answer" id=<?php echo $_smarty_tpl->tpl_vars['report']->value['report_id'];?>
>
                        <p><?php echo $_smarty_tpl->tpl_vars['report']->value['message'];?>
</p>
                        <form method="post" action="../actions/ban-user.php">
                            <input type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['report']->value['reported'];?>
 name="id">
                            <input type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 name="page">

                            <button type="submit" class="btn button">Ban</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
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
    <?php }?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
