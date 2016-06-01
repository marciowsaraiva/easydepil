                <div id="mostraragenda">    
                    <br>
                    <h2>Agenda do dia - {$diaextenso|default:''} {$nomedodia|default:''} </h2>
                    <br>
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Hora</th>
                            <th>Cliente</th>
                            <th>Tratamento</th>
                            <th>Observação</th>
                            <th>Celular</th>
                            <th>E-Mail</th>
                            <th>Valor</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$lista_agendadia item="linha"}  
                            <tr>
                                <td> <span style="color: {$linha.dsCor}">  {$linha.dsStatusAgenda|default:''} </span></td> 
                                <td> <span style="color: {$linha.dsCor}">  {$linha.Hora|default:''} </span></td> 
                                <td> <span style="color: {$linha.dsCor}">  {$linha.dsCliente|default:''} </span></td> 
                                <td> <span style="color: {$linha.dsCor}">  {$linha.dsTratamento|default:''} </span></td> 
                                <td> <span style="color: {$linha.dsCor}">  {$linha.dsAgenda|default:''} </span></td> 
                                <td> <span style="color: {$linha.dsCor}">  {$linha.dsCelular|default:''} </span></td> 
                                <td> <span style="color: {$linha.dsCor}">  {$linha.dsEmail|default:''} </span></td> 
                                <td> <span style="color: {$linha.dsCor}">  {$linha.vlTratamento|default:'0'} </span></td> 
                                <td> 
                                    {if $linha.idStatusAgenda neq 6} <a class="glyphicon glyphicon-ok" title ="Confirmar" onclick="dashboard.mudaragenda({$linha.idAgenda|default:''},'confirmar');" > Confirmar </a> |  
                                    <a class="glyphicon glyphicon-adjust" title ="Desmarcar" onclick="dashboard.mudaragenda({$linha.idAgenda|default:''},'desmarcar');" > D </a> |
                                    <a class="glyphicon glyphicon-pencil" title ="Remarcar" onclick="dashboard.mudaragenda({$linha.idAgenda|default:''},'remarcar');" > R </a> |
                                    <a class="glyphicon glyphicon-trash" title ="Cancelar" onclick="dashboard.mudaragenda({$linha.idAgenda|default:''},'cancelar');" > E </a> |
                                    <a class="glyphicon glyphicon-credit-card" title ="Atender" onclick="atendimento_modal.show({$linha.idAgenda|default:''},{$linha.idCliente|default:''},'{$linha.dsCliente|default:''}','{$linha.dsTratamento|default:''}','{$linha.idTratamento|default:''}');"> Atender </a>  {/if}
                                </td>
                            </tr>
                        {/foreach}        
                    </tbody>
                </table>
                </div>