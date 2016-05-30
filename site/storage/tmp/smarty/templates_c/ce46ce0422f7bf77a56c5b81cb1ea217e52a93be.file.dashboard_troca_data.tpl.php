<?php /* Smarty version Smarty-3.1.18, created on 2016-01-18 07:40:05
         compiled from "/var/www/html/trocainteligente.com.br/public/views/templates/dashboard/troca/dashboard_troca_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:718055007569cb2f5cc75e9-15698098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce46ce0422f7bf77a56c5b81cb1ea217e52a93be' => 
    array (
      0 => '/var/www/html/trocainteligente.com.br/public/views/templates/dashboard/troca/dashboard_troca_data.tpl',
      1 => 1452515365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '718055007569cb2f5cc75e9-15698098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_troca' => 0,
    'periodoGrafDtIni' => 0,
    'periodoGrafDtFim' => 0,
    'troca_mes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_569cb2f5dceb06_79506967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569cb2f5dceb06_79506967')) {function content_569cb2f5dceb06_79506967($_smarty_tpl) {?><div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                        <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==1) {?>
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-nao-iniciada.png" alt="local_troca"/> 
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==4) {?>
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-nao-iniciada.png" alt="local_troca"/> 
                        <?php }?>
                    </div>
                    <div class="col-md-8 text-right">
                        <h4>
                            <p class="announcement-text" >Volume: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['tamanho_projeto'];?>
</p>
                            <p class="announcement-text" >Base: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['trocaNaoIniciada'];?>
 </p>
                            <p class="announcement-text" >Realizado: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['percentual_realizado'];?>
 % </p>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fa"></i>
                    </div>
                </div>
            </div>                    
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                         <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==1) {?>
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-em-rota.png" alt="local_troca"/> 
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==4) {?>
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-em-rota.png" alt="local_troca"/> 
                        <?php }?>
                        </div>
                    <div class="col-md-8 text-right">
                        <p class="announcement-heading"><?php echo $_smarty_tpl->tpl_vars['data_troca']->value['trocaEmRota'];?>
</p>
                        <p class="announcement-text">Em Rota</p>
                    </div>
                </div>
            </div>
            <div class="panel-footer announcement-bottom">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                         <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==1) {?>
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-insucesso.png" alt="local_troca"/> 
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==4) {?>
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-insucesso.png" alt="local_troca"/> 
                        <?php }?>
                        </div>
                    <div class="col-md-8 text-right">
                        <p class="announcement-heading"><?php echo $_smarty_tpl->tpl_vars['data_troca']->value['trocaInsucesso'];?>
</p>
                        <p class="announcement-text">Insucessos</p>
                    </div>
                </div>
            </div>
            <a href="/acompanhamento">
                <div class="panel-footer announcement-bottom">
                    <div class="row">
                        <div class="col-md-6">
                            Mais detalhes
                        </div>
                        <div class="col-md-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                         <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==1) {?>
                        <img src="/files/images/icones-geolocalizacao/geladeira/troca-sucesso.png" alt="local_troca"/> 
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['tipo_projeto']==4) {?>
                        <img src="/files/images/icones-geolocalizacao/lampada/troca-sucesso.png" alt="local_troca"/> 
                        <?php }?>
                        </div>
                    <div class="col-md-8 text-right">
                        <h4>
                            <p class="announcement-text" >Sucessos: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['trocaSucesso'];?>
</p>
                            <p class="announcement-text" >Faturados: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['sucesso_faturado'];?>
 </p>
                            <p class="announcement-text" >Para Comprovar: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['sucesso_sem_comprovacao'];?>
 </p>
                        </h4>
                    </div>
                </div>
            </div>
            <a href="/acompanhamento">
                <div class="panel-footer announcement-bottom">
                    <div class="row">
                        <div class="col-md-6">
                            Mais detalhes
                        </div>
                        <div class="col-md-6 text-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa"></i> Gráfico de entregas <?php if ($_smarty_tpl->tpl_vars['periodoGrafDtIni']->value==false&&$_smarty_tpl->tpl_vars['periodoGrafDtFim']->value==false) {?>: Mes Atual <?php } else { ?>: <?php echo $_smarty_tpl->tpl_vars['periodoGrafDtIni']->value;?>
 a <?php echo $_smarty_tpl->tpl_vars['periodoGrafDtFim']->value;?>
 <?php }?> </h3>
            </div>                      
            <div class="panel-body">
                <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['por_n_iniciada']==null&&$_smarty_tpl->tpl_vars['data_troca']->value['por_em_rota']==null&&$_smarty_tpl->tpl_vars['data_troca']->value['por_sucesso']==null&&$_smarty_tpl->tpl_vars['data_troca']->value['por_insucesso']==null) {?>
                    <p>Nenhuma entrega realizada neste periodo.</p>
                <?php } else { ?>
                    <div id="morris-chart-donut"></div>
                    <script>
                        Morris.Donut(
                        {element: 'morris-chart-donut', data: [
                        {label: "Não Iniciada", value: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['por_n_iniciada'];?>
},
                        {label: "Em Rota", value: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['por_em_rota'];?>
},
                        {label: "Sucesso", value: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['por_sucesso'];?>
},
                        {label: "Insucessos", value: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['por_insucesso'];?>
}
                            ],colors: ['#696969','#EEDD82','#39B580','#B22222'], formatter: function(y)
                        { return y + "%";
                        }
                        });</script>  
                    <?php }?>


            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa"></i> Gráfico de Sucessos <?php if ($_smarty_tpl->tpl_vars['periodoGrafDtIni']->value==false&&$_smarty_tpl->tpl_vars['periodoGrafDtFim']->value==false) {?>: Mes Atual <?php } else { ?>: <?php echo $_smarty_tpl->tpl_vars['periodoGrafDtIni']->value;?>
 a <?php echo $_smarty_tpl->tpl_vars['periodoGrafDtFim']->value;?>
 <?php }?> </h3>
            </div>                      
            <div class="panel-body">
                <?php if ($_smarty_tpl->tpl_vars['data_troca']->value['por_n_iniciada']==null&&$_smarty_tpl->tpl_vars['data_troca']->value['por_em_rota']==null&&$_smarty_tpl->tpl_vars['data_troca']->value['por_sucesso']==null&&$_smarty_tpl->tpl_vars['data_troca']->value['por_insucesso']==null) {?>
                    <p>Nenhuma entrega realizada neste periodo.</p>
                <?php } else { ?>
                    <div id="morris-chart-donut2"></div>
                    <script>
                                Morris.Donut(
                        {element: 'morris-chart-donut2', data: [
                        {label: "Faturado", value: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['por_sucesso_faturado'];?>
},
                        {label: "Comprovado", value: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['por_sucesso_comprovado'];?>
},
                        {label: "Comprovar", value: <?php echo $_smarty_tpl->tpl_vars['data_troca']->value['por_sucesso_sem_comprovacao'];?>
}
                                 ], colors: ['#39B580','#98FB98','#BDB76B'], formatter: function(y)
                        { return y + "%";
                        }
                        });                    </script> 


                <?php }?>

            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa"></i> Visitas Realizadas <?php if ($_smarty_tpl->tpl_vars['periodoGrafDtIni']->value==false&&$_smarty_tpl->tpl_vars['periodoGrafDtFim']->value==false) {?>: Mes Atual <?php } else { ?>: <?php echo $_smarty_tpl->tpl_vars['periodoGrafDtIni']->value;?>
 a <?php echo $_smarty_tpl->tpl_vars['periodoGrafDtFim']->value;?>
 <?php }?> </h3> 
            </div>  
            <div class="panel-body">
                <?php if ($_smarty_tpl->tpl_vars['troca_mes']->value=="null") {?>
                    <p>Nenhuma visita realizada neste periodo.</p>
                <?php } else { ?>
                    <div id="morris-chart-area">                                        
                        <script type = "text/javascript">
                                    Morris.Bar({
                                                element: 'morris-chart-area',
                                                        data: <?php echo $_smarty_tpl->tpl_vars['troca_mes']->value;?>
,
                                                        xkey: 'y',
                                                        ykeys: ['t', 'a', 'b'],
                                                        labels: ['Total', 'Sucesso', 'Insucesso'],
                                                        hideHover: 'auto',
                                                        resize: true,
                                                        barColors: ['#90C7FB', '#96EECA', '#EE9696']
                            });
                        </script>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>






</div><?php }} ?>
