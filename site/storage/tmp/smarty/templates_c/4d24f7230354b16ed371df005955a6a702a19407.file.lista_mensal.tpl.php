<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:52:30
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista_mensal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1536906406569cb5dee200b4-25209791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d24f7230354b16ed371df005955a6a702a19407' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/telefonia/lista_mensal.tpl',
      1 => 1452896997,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1536906406569cb5dee200b4-25209791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tituloPagina' => 0,
    'registrocabec' => 0,
    'registro' => 0,
    'linha' => 0,
    'registrofooter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb5df0e2534_96332793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb5df0e2534_96332793')) {function content_569cb5df0e2534_96332793($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/trocainteligente.com.br/git/site/system/libs/smarty/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate ("comuns/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
                <h1 style="margin-top: 0"><?php echo $_smarty_tpl->tpl_vars['tituloPagina']->value;?>
</h1>            
        </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-xs-12"> <strong>
                                <p><small>Impresso por: <?php echo $_SESSION['user']['nome'];?>
 - em: <?php echo date('d/m/Y H:i:s');?>
</small></p>
                                <p><small><?php ob_start();?><?php echo $_SESSION['setor']['nome_setor'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!='') {?> | Setor: <?php echo mb_strtoupper($_SESSION['setor']['nome_setor'], 'UTF-8');?>
 <?php }?> </small>
                        </div>                         
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                                    <tr>
                                        <td  align=left ><strong>COLABORADOR</strong></td>
                                        <td  align=left ><strong>PLANO</strong></td>
                                        <td  align=left ><strong>VALOR PLANO</strong></td>
                                        <td> <strong>Linha</strong></td>
                                        <td  align=center ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col1'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col2'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col3'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col4'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col5'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col6'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col7'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col8'];?>
</strong></td>
                                        <td  align=right  ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col9'];?>
</strong></td>
                                        <td  align=right ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col10'];?>
</strong></td>
                                        <td  align=right ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col11'];?>
</strong></td>
                                        <td  align=right ><strong><?php echo $_smarty_tpl->tpl_vars['registrocabec']->value['col12'];?>
</strong></td>
                                        <td  align=right ><strong>Total: </strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars["linha"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["linha"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['registro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["linha"]->key => $_smarty_tpl->tpl_vars["linha"]->value) {
$_smarty_tpl->tpl_vars["linha"]->_loop = true;
?>
                                        <tr>
                                            <td class = "fonteazul" align=left><?php echo $_smarty_tpl->tpl_vars['linha']->value['colaborador'];?>
</td>
                                            <td class = "fonteazul" align=left><?php echo $_smarty_tpl->tpl_vars['linha']->value['plano'];?>
</td>
                                            <td class = "fonteazul" align=left>R$ <?php echo $_smarty_tpl->tpl_vars['linha']->value['valorplano'];?>
</td>
                                            <td class = "fonteazul" align=left ><?php echo $_smarty_tpl->tpl_vars['linha']->value['vl_linha'];?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes1']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?> align=right> <?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes1'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes2']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes2'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes3']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes3'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes4']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes4'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes5']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes5'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes6']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes6'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes7']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes7'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes8']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes8'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes9']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes9'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes10']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes10'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes11']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes11'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td  <?php if ($_smarty_tpl->tpl_vars['linha']->value['vl_mes12']>$_smarty_tpl->tpl_vars['linha']->value['valorplano']) {?> class="corvermelha"  <?php } else { ?> class = "fonteazul"<?php }?>  align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_mes12'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                            <td align=right ><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['linha']->value['vl_total'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</td>
                                        </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars["linha"]->_loop) {
?>
                                        <tr><td>Nenhum registro encontrado</td></tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <font size="3"> <strong>Total: </strong></font> </td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol1'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol2'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol3'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol4'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol5'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol6'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol7'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol8'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol9'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol10'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol11'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcol12'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                    <td  align=right ><strong><?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->tpl_vars['registrofooter']->value['tcolt'],".",","))===null||$tmp==='' ? "0,00" : $tmp);?>
</strong></td>
                                </tr> 
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<link href="/files/css/telefonia.css" rel="stylesheet" type="text/css"/> 
<?php echo $_smarty_tpl->getSubTemplate ("comuns/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
  <?php }} ?>
