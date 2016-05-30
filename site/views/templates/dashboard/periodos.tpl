                <h3> &nbsp; Use as setas para mudar de mês dentro do ano - {$mesextenso|default:''} </h3>
                <input type="hidden" id="idAgendaHorario" value="{$idAgendaHorario|default:''}"/>
                <div class="col-xs-1">          
                     <label for="Voltar"></label>                    
                     <a class="btn btn-primary" id="btnVoltar" title="Voltar" onclick="dashboard.voltar();" {if $idAgendaHorario|default:'' eq ''} disabled {/if}  >Mês Anterior</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="Avançar"></label>                    
                     <a class="btn btn-primary" id="btnAvancar" title="Avançar" onclick="dashboard.avancar();"{if $idAgendaHorario|default:'' eq ''} disabled {/if}  >Próximo Mês</a> 
                </div> 
                <div class="col-xs-1">
                     <label for="datainicio"></label>                    
                    <input type="text" class="form-control" name="datainicio" id="datainicio" value="{$datainicio|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" READONLY />           
                </div>
                <div class="col-xs-1">
                     <label for="datafinal"></label>                    
                    <input type="text" class="form-control" name="datafinal" id="datafinal" value="{$datafinal|date_format:'%d/%m/%Y'|default:Date("d/m/Y")}" READONLY />           
                </div>        
                <div class="col-xs-1">          
                     <label for="VerAgenda"></label>                    
                     <a class="btn btn-primary" id="btnVerAgenda" title="Ver Agenda" href="#agendar" {if $idAgendaHorario|default:'' eq ''} disabled {/if}  >Ver Agenda dia</a> 
                </div> 
                <div class="col-xs-1">          
                     <label for="Agendar"></label>                    
                     <a class="btn btn-primary" id="btnNovaAgenda" title="Agendar" href="#agendar" {if $idAgendaHorario|default:'' eq ''} disabled {/if}  >Novo Horário</a> 
                </div> 
                <div class="col-xs-1">          
                     <label for="GravarAgenda"></label>                    
                     <a class="btn btn-primary" id="btnGravarAgenda" title="Gravar agenda" onclick="dashboard.gravarhorario();" {if $idAgendaHorario|default:'' eq ''} disabled {/if}  >Gravar Horário</a> 
                </div> 
                <div class="col-xs-1">          
                     <label for="GravarAtendimento"></label>                    
                     <a class="btn btn-primary" id="btnGravarAtendimento" title="Gravar atendimento" onclick="dashboard.gravaratendimento();" {if $idAgendaHorario|default:'' eq ''} disabled {/if}  >Gravar Atendimento</a> 
                </div> 
                