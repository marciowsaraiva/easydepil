<?php /* Smarty version Smarty-3.1.18, created on 2016-01-25 18:55:13
         compiled from "/var/www/html/easydepil.com.br/public/views/templates/colaborador/colaborador_lista.html" */ ?>
<?php /*%%SmartyHeaderCode:122934484556a68bb1568f74-77612521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5d0c67544b6982123eb647e1681bbc7fde14831' => 
    array (
      0 => '/var/www/html/easydepil.com.br/public/views/templates/colaborador/colaborador_lista.html',
      1 => 1453753693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122934484556a68bb1568f74-77612521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'colaborador_lista' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56a68bb158c264_38281385',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a68bb158c264_38281385')) {function content_56a68bb158c264_38281385($_smarty_tpl) {?><div class="painel_basico basico_colaborador_busca">
  <div class="titulos_paginas" id="colaboradores">
    <h2>
      <img src="../../../files/images/icon_tab_usuarios.png" width="63" height="75" /> 
      Colaboradores</h2>
  </div> 
  <div>    
    <div class="clear"></div>
    <fieldset>
      <legend>Buscar</legend>
      <input type="text" name="colaborador_busca_texto" id="colaborador_busca_texto" value="fa"/>
      <input type="button" class="btn_padrao" value="buscar" 
             id="btn_colaborador_buscar" 
             name="btn_colaborador_buscar"
             onclick="busca_colaborador()"/>
    </fieldset>
  </div> 
  <div class="clear"></div>
  <div class="alinha_esquerda">    
    <button onclick="btn_novo_colaborador_click()" class="btn_padrao">Novo colaborador</button>
    <inpu>
  </div>
  <div id="grid_resultados" class="box_resultados_100">    
    <div class="clear"></div>
    <table id="lista_retorno" name="lista_retorno" class="basicTable">
      <thead>
        <tr>
          <th>cod</th>
          <th>nome</th>
          <th>Ação</th>
        </tr>
      </thead>      
      <tbody>
        <?php echo $_smarty_tpl->getSubTemplate ("colaborador/grid_colaborador.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('colaborador_lista'=>$_smarty_tpl->tpl_vars['colaborador_lista']->value), 0);?>

      </tbody>      
    </table>
  </div>
  <div class="clear"></div>
</div><?php }} ?>
