<?php /* Smarty version Smarty-3.1.18, created on 2016-04-29 12:41:00
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/osencerrar/lista.html" */ ?>
<?php /*%%SmartyHeaderCode:4757052295723808c8b6950-79354116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c17f4f77c86fb992885ef73b7796113815c666f' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/osencerrar/lista.html',
      1 => 1458509820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4757052295723808c8b6950-79354116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'buscadescricao' => 0,
    'os' => 0,
    'linha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5723808c90ecd5_74478522',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5723808c90ecd5_74478522')) {function content_5723808c90ecd5_74478522($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/easydepil.com.br/git/site/system/libs/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!--Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <br>
        <h3>Lista de Ordem de Serviço - Informar encerramento da Ordem de Serviço</h3>
        <br>
        <div class="panel panel-default">            
            <div class="panel-footer">
                <form name="frm-busca-os" action="/osencerrar/busca_os" method="POST" enctype="multipart/form-data">
                    Descrição:
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscadescricao" name="buscadescricao" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['buscadescricao']->value)===null||$tmp==='' ? '' : $tmp);?>
" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                            <br>
                        </span>          
                    </div>
                </form>
            </div>
        </div>
        <br>       
        <br>
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Sequencia</th>
                    <th>O.S.</th>
                    <th>Data</th>
                    <th>Solicitante</th>
                    <th>Setor</th>
                    <th>Tipo de Manutenção</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['os']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>  
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['linha']->value['idOS'];?>
</td>
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['nrOS'])===null||$tmp==='' ? '' : $tmp);?>
</td>
                    <td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['linha']->value['dtOS'],'%d/%m/%Y'))===null||$tmp==='' ? Date("d/m/Y") : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsSolicitante'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsSetor'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsTipoManutencao'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['linha']->value['dsStatusOS'])===null||$tmp==='' ? '' : $tmp);?>
</td> 
                    <td>
                        <a class="glyphicon glyphicon-pencil" title="Informar a analise/causa" href="/osencerrar/novo_osencerrar/idOS/<?php echo $_smarty_tpl->tpl_vars['linha']->value['idOS'];?>
"> Informar</a>
                    </td>
                </tr>
                <?php } ?>        
            </tbody>
        </table>
        <!--Altere daqui pra cima-->
    </div>
</div>
<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
