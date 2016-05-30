<?php /* Smarty version Smarty-3.1.18, created on 2016-03-10 18:18:19
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osanalise/oscolabanalitico.html" */ ?>
<?php /*%%SmartyHeaderCode:197738373656e1e49b0ea499-94798492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb2528ebdd36797d689917be4486dc4c15a8fa92' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osanalise/oscolabanalitico.html',
      1 => 1457644030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197738373656e1e49b0ea499-94798492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'os_listacolabos' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56e1e49b12bad1_52031915',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e1e49b12bad1_52031915')) {function content_56e1e49b12bad1_52031915($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?>        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>OS</th>
                    <th>Data</th>
                    <th>Status OS</th>
                    <th>Inicio Previsto/Iniciado</th>
                    <th>Fim Previsto</th>
                    <th>Colaborador</th>
                    <th>Data Inicio</th>
                    <th>Data Fim</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['os_listacolabos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><strong><?php echo $_smarty_tpl->tpl_vars['linha']->value['nrOS'];?>
</strong></td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtOS'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsStatusOS'];?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtInicio'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtFim'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['dsColaborador'];?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtInicioC'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtFimC'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><a class="glyphicon glyphicon-trash" onclick="os.delOSColaborador(<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOS'];?>
, <?php echo $_smarty_tpl->tpl_vars['linha']->value['idColaborador'];?>
);">  Excluir</a></td>
                </tr>
                <?php } ?>        
            </tbody>
        </table><?php }} ?>
