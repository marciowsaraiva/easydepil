                <br>
                <div id="mostradadoscliente">  
                    <div class="col-xs-10">          
                        <h2>Agenda do Cliente {$nomedocliente|default:''} </h2>
                         <label for="voltaraotopo"></label>                    
                         <a class="btn btn-primary" id="btnTopo" title="Voltar ao topo" href="#topo">Voltar ao Topo</a> 
                    </div> 
                    <div class="col-xs-12">          
                        <table class="table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Data/Hora</th>
                                <th>Hora</th>
                                <th>Tratamento</th>
                                <th>Observação</th>
                                <th>Celular</th>
                                <th>E-Mail</th>
                                <th>Valor Pago</th>
                                <th>Pago em</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$lista_dadoscliente item="linha"}  
                                <tr>
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.dsStatusAgenda|default:''} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.dtAgenda|date_format:'%d/%m/%Y'|default:Date("d/m/Y")} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.Hora|default:''} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.dsTratamento|default:''} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.dsAgenda|default:''} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.dsCelular|default:''} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.dsEmail|default:''} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.vlFinanceiro|default:''} </span></td> 
                                    <td> <span style="color: {$linha.dsCor|default:'#000000'}">  {$linha.dsFormaPagamento|default:''} </span></td> 
                                </tr>
                            {/foreach}        
                        </tbody>
                        </table>
                    </div>
                </div>