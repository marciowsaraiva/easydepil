                    <table class="table">
                    <thead>
                        <tr>
                            <th>Profissional</th>
                            <th>Cargo</th>
                            <th>Celular</th>
                            <th>E-Mail</th>
<!--                            <th>Ação</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$lista_agendaprofissional item="linha"}  
                            <tr>
                                <td>{$linha.dsProfissional|default:''}</td> 
                                <td>{$linha.dsCargo|default:''}</td> 
                                <td>{$linha.dsCelular|default:''}</td> 
                                <td>{$linha.dsEmail|default:''}</td> 
<!--                                <td> 
                                    <a class="glyphicon glyphicon-trash" title ="Excluir" onclick="delcolaborador({$linha.idProfissional});" > Excluir </a>
                                </td>-->
                            </tr>
                        {/foreach}        
                    </tbody>
                </table>