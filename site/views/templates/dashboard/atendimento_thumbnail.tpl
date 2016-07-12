    {include file="dashboard/atendimento_detalhes.tpl"}     
    <br>
    <div class="row">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="atender">                
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="valorpago">Valor Pago </label>
                            <input type="text" id="valorpago" class="form-control" nome="valorpago" />
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="formapagamento">Forma de Pagamento </label>
                            <select class="form-control" name="idFormaPagamento" id="idFormaPagamento"> 
                                {include file="dashboard/formapagamento.tpl"}                            
                            </select>                      
                        </div>
                    </div>
                    <div class="col-xs-1">          
                         <label for="GravarAtendimento"></label>                    
                         <a class="btn btn-primary" id="btnGravarAtendimento" title="Gravar atendimento" onclick="dashboard.gravaratendimento({$idCliente|default:''}, {$idAgenda|default:''});">Gravar</a> 
                    </div>                             
                </div>
            </div>
        </div>
    </div>
