<?php /* Smarty version Smarty-3.1.18, created on 2016-05-22 12:37:28
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/os/oscolabanalitico.html" */ ?>
<?php /*%%SmartyHeaderCode:12928697925741d2385aafa7-11674427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c02b2cd9abb3b8e39e259e4b4a5a9957ff13b3a7' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/os/oscolabanalitico.html',
      1 => 1457642929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12928697925741d2385aafa7-11674427',
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
  'unifunc' => 'content_5741d2385eb8c8_20399921',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5741d2385eb8c8_20399921')) {function content_5741d2385eb8c8_20399921($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
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
