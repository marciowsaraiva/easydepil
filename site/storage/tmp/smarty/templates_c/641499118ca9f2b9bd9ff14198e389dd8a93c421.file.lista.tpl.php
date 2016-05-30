<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:52:18
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:858863372569cb5d2ecce63-95999381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '641499118ca9f2b9bd9ff14198e389dd8a93c421' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista.tpl',
      1 => 1452976763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '858863372569cb5d2ecce63-95999381',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
    'registro' => 0,
    'linha' => 0,
    'paginacao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb5d2f0aa09_08167833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb5d2f0aa09_08167833')) {function content_569cb5d2f0aa09_08167833($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="wrapper">
    <!-- Sidebar -->
    <?php echo $_smarty_tpl->getSubTemplate ("comuns/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-xs-12 main">
                <div class="col-xs-12">
                    <div class="row row-button-top">
                        <div class="col-xs-10">
                            <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>
                        </div>
                        <div class="col-xs-12 col-md-2 col-lg-2 button-m-top pull-right">
                            <a class="btn btn-default btn-inserir form-control" href="/telefonia/cadastrar">INSERIR</a>
                        </div>
                    </div>
                    <ul class="nav nav-tabs">                        
                        <li id="buscar_aba" class="active"><a href="/tiCadastroPlano" data-toggle="tab">BUSCAR</a></li>
                        <li class="disabled"><a>DADOS BASICOS</a></li>                        
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                       <div class="tab-pane fade active in" id="buscar_aba">
                           <div class="panel panel-default"> 
                               <div class="panel-body">
                                   <div class="row">
                                       <div class="col-xs-12">
                                           <table class="table table-striped table-hover">
                                               <thead>
                                                   <tr>
                                                       <th class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REFERENCIA DO MOVIMENTO DE TELEFONIA </th>                                                        
                                                       <th class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DEPARTAMENTO</th>
                                                       <th class="text-center">ACAO</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                <tr class="linha_busca">
                                                   <td  align=center>
                                                       <form name="frm-busca" action="/telefonia/buscar" method="POST" enctype="multipart/form-data" onsubmit="return telefonia.validarForm();" >
                                                           <div class="col-xs-4">
                                                               <input type="text" class="form-control" id="ds_referencia" maxlength="6" name="ds_referencia"/>
                                                           </div>
                                                           <div class="col-xs-3">
                                                               <input type="submit" id="buscar" class="btn btn-default btn-buscar col-xs-12" value="BUSCAR" />
                                                           </div>
                                                       </form>
                                                   </td>                                                            
                                                   <td align=center >
                                                       <form name="frm-mensal" action="/telefonia/mensal" target="_blank" method="POST" enctype="multipart/form-data"onsubmit="return true;" >
                                                           <div class="col-xs-9">
                                                               <input type="text" class="form-control" id="ds_setor" maxlength="50" name="ds_setor"/>
                                                           </div>
                                                           <div class="col-xs-3">
                                                               <input type="submit" id="mensal" class="btn btn-default btn-buscar col-xs-12" value="MENSAL" />
                                                           </div>
                                                       </form>
                                                   </td>                                                            
                                                   <td>
                                                       <div class="row">
                                                           <div class="col-xs-10"> 
                                                               <div class="col-xs-6">
                                                                   <a href="/telefonia" class="btn btn-default btn-limpar col-xs-12">LIMPAR</a>
                                                               </div>
                                                               <div class="col-xs-6">
                                                                   <a class="btn btn-default btn-listar form-control" target="_blank" href="/telefonia/listar">LISTAR</a>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </td>
                                                </tr>                                                    
                                               <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                                   <tr>
                                                       <td colspan="0">
                                                           <a title="ALTERAR" href="/telefonia/cadastrar/ds_referencia/<?php echo $_smarty_tpl->tpl_vars['linha']->value['ds_referencia'];?>
"><?php echo $_smarty_tpl->tpl_vars['linha']->value['ds_referencia'];?>
</a>
                                                       </td>
                                                       <td>
                                                       </td>
                                                       <td class="text-center">
                                                           <a class="btn btn-default btn-alterar btn-mini" title="Alterar" href="/telefonia/cadastrar/ds_referencia/<?php echo $_smarty_tpl->tpl_vars['linha']->value['ds_referencia'];?>
">A</a>
                                                           <a class="btn btn-default btn-excluir btn-mini" title="Excluir" onclick="dados.del('<?php echo $_smarty_tpl->tpl_vars['linha']->value['ds_referencia'];?>
');">E</a> 
                                                           <a class="btn btn-default btn-ficha btn-mini" title="Ficha" href="/telefonia/listadetalhe/ds_referencia/<?php echo $_smarty_tpl->tpl_vars['linha']->value['ds_referencia'];?>
">F</a> 
                                                       </td>
                                                   </tr>
                                               <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                                   <tr><td colspan="100%">NENHUM REGISTRO CADASTRADO.</td></tr>
                                               <?php } ?>        
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-xs-12">
                                           <?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacao']->value)===null||$tmp==='' ? '' : $tmp);?>

                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>                                 
<script type="text/javascript" src="/files/js/telefonia/lista.js"></script>
<script type="text/javascript" src="/files/js/telefonia/cadastrar.js"></script>
<script type="text/javascript" src="/files/js/telefonia/grafico.js"></script>
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/util.js" type="text/javascript"></script>
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js" type="text/javascript"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
