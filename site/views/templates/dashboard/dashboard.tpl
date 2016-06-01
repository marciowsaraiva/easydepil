<div id="topo">
    
</div>
{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}
    <script type="text/javascript" src="/files/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/files/js/bootstrap.js"></script>
{*    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script type="text/javascript" src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
*}
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$totalagendado|default:''}</div>
                                    <div>TOTAL AGENDADOS</div>
                                </div>
                            </div>
                        </div>
                        <a onclick="dashboard.agendageral('1');">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$totalconfirmado|default:''}</div>
                                    <div>CONFIRMADOS</div>
                                </div>
                            </div>
                        </div>
                        <a onclick="dashboard.agendageral('2');">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pause fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$totalparaconfirmar|default:''}</div>
                                    <div>PARA CONFIRMAR</div>
                                </div>
                            </div>
                        </div>
                        <a onclick="dashboard.agendageral('3');">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$totaldesmarcado|default:''}</div>
                                    <div>DESMARCADOS</div>
                                </div>
                            </div>
                        </div>
                        <a onclick="dashboard.agendageral('4');">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="profissional">Escoha o Profissional para agenda</label>
                        <select class="form-control" name="idProfissional" id="idProfissional" onchange="dashboard.agendaprofissional();"> 
                            {html_options options=$lista_profissional selected=$profissional_padrao}
                        </select>                      
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="cliente">Escoha o Cliente para Informações</label>
                        <select class="form-control" name="idClienteP" id="idClienteP" onchange="dashboard.verdadoscliente();"> 
                            {html_options options=$lista_cliente}
                        </select>                      
                    </div>
                </div>
            </div>
            <div id="mostrarprofissionales">
                 {include file="dashboard/agendahorarioprofissional.tpl"}
            </div>
          
            <div class="row">
                <div id="mostrarperiodos">
                   {include file="dashboard/periodos.tpl"}
                </div> 
            </div>
            </br>
                
            <div id="mostraragendacompleta">
                 {include file="dashboard/agendaanalitica.tpl"}
            </div>
            
            <div id="mostraragendadodia">
                <br>
                <div id="listaagendadia">
                     {include file="dashboard/agendadia.tpl"}
                </div>
            </div>
            <h2>Novo Agendamento</h2>
            <div class="row">
                <div id="agendar">                
                    <div class="col-xs-1">          
                         <label for="voltaraotopo"></label>                    
                         <a class="btn btn-primary" id="btnTopo" title="Voltar ao topo" href="#topo">Voltar ao Topo</a> 
                    </div> 
                    <div class="col-xs-1">          
                         <label for="GravarAgenda"></label>                    
                         <a class="btn btn-primary" id="btnGravarAgenda" title="Gravar agenda" onclick="dashboard.gravarhorario();" {if $idAgendaHorario|default:'' eq ''} disabled {/if}  >Gravar Horário</a> 
                    </div>                                 </div>
            </div>    
            <br>
            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="cliente">Cliente </label>
                        <select class="form-control" name="idCliente" id="idCliente"> 
                            {html_options options=$lista_cliente selected=null}
                        </select>                      
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="tratamento">Tratamento </label>
                        <select class="form-control" name="idTratamento" id="idTratamento" onchange='dashboard.lertratamento();'> 
                            {html_options options=$lista_tratamento selected=null}
                        </select>                      
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="observacao">Observação</label>
                        <input type="text" id="observacao" class="form-control" nome="observacao"/>
                    </div>
                </div>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="hora">Hora </label>
                        <input type="text" id="hora" class="form-control" nome="hora" maxlength="5" placeholder="HH:MM"/>
                    </div>
                </div>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="hora">Duração</label>
                        <input type="text" id="duracao" class="form-control" nome="duracao"  disabled/>
                    </div>
                </div>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="hora">Valor</label>
                        <input type="text" id="valor" class="form-control" nome="valor"  disabled/>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class='row'>
                <div id="listaagendageral">
                     {include file="dashboard/agendageral.tpl"}
                </div>
            </row>
            <br>
            <br>
            <div id="listadadoscliente">
                 {include file="dashboard/listadadoscliente.tpl"}
            </div>
                            
            {include file="dashboard/atendimento_modal.tpl"}                            
            <!-- /.row -->
{*            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-dollar fa-fw"></i> Financeiro
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pedido/Parcela</th>
                                                    <th>Vencimento</th>
                                                    <th>Fornecedor</th>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from=$registrosfinanceiro item="linha"}                                                  
                                                <tr>
                                                    <td>{$linha.nrPedido|default:''}-{$linha.nrParcela|default:''}</td>
                                                    <td>{$linha.dtVencimento|date_format:'%d/%m/%Y'|default:Date("d/m/Y")|default:''}</td>
                                                    <td>{$linha.dsFornecedor|default:''}</td>
                                                    <td>{$linha.dsObservacao|default:''}</td>
                                                    <td>R$ {$linha.vlParcela|number_format:2:",":"."|default:''}</td>
                                                    <td>
                                                        <a class="glyphicon glyphicon-pencil" href="/pedido/novo_pedido/idPedido/{$linha.idPedido}"> Ver</a>
                                                    </td>                                                    
                                                </tr>
                                                {/foreach}        
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <div class="col-lg-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Mes</th>
                                                    <th>Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from=$registrosfinanceiromes item="linha"}                                                  
                                                <tr>
                                                    <td>{$linha.datavencimento|default:''}</td>
                                                    <td>R$ {$linha.total|number_format:2:",":"."|default:''}</td>
                                                </tr>
                                                {/foreach}        
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                            
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa {$classea} fa-fw"></i> Detalhes das O.S
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
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
                                                {foreach from=$os item="linha"}  
                                                <tr>
                                                    <td>{$linha.idOS}</td>
                                                    <td>{$linha.nrOS|default:''}</td>
                                                    <td>{$linha.dtOS|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}</td> 
                                                    <td>{$linha.dsSolicitante|default:''}</td> 
                                                    <td>{$linha.dsSetor|default:''}</td> 
                                                    <td>{$linha.dsTipoManutencao|default:''}</td> 
                                                    <td>{$linha.dsStatusOS|default:''}</td> 
                                                    <td>
                                                        <a class="glyphicon glyphicon-pencil" href="/os/novo_os/idOS/{$linha.idOS}"> Ver</a>
                                                       {if $linha.idStatusOS eq 1} 
                                                        <a class="glyphicon glyphicon-trash" onclick="os.delOS('{$linha.idOS}');">  Excluir</a>
                                                        {/if}
                                                    </td>                                                    
                                                </tr>
                                                {/foreach}        
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->*}
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        
</div>

<!-- JavaScript -->
<script type="text/javascript" src="/files/js/jquery.mask.js"></script>
<script type="text/javascript" src="/files/js/jquery.price/jquery.price_format.1.3.js"></script>
<script type="text/javascript" src="/files/js/tablesorter/jquery.tablesorter.js"></script>
<script type="text/javascript" src="/files/js/tablesorter/tables.js"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script type="text/javascript" src="/files/js/util.js"></script>
<script type="text/javascript" src="/files/js/dashboard/dashboard.js"></script>

{*    <!-- jQuery -->
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../../bower_components/raphael/raphael-min.js"></script>
    <script src="../../../bower_components/morrisjs/morris.min.js"></script>
    <script src="../../../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../../dist/js/sb-admin-2.js"></script>*}

{include file="comuns/footer.tpl"}
