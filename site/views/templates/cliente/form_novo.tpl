{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idCliente}>0} {$registro.dsCliente|default:''}{else} Inclus&atilde;o de Clientes{/if}</h1></tt>
            </div>          
            <a href="/cliente" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-cliente" 
                  action="/cliente/gravar_cliente" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idCliente}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idCliente" id="idCliente" value="{$registro.idCliente}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idCliente" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Cliente</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsCliente|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">C.P.F</label>
                        <input type="text" class="form-control" name="cdCNPJ" id="cdCNPJ" value="{$registro.cdCNPJ|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">R.G</label>
                        <input type="text" class="form-control" name="nrRG" id="nrRG" value="{$registro.nrRG|default:''}" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">U.F</label>
                        <input type="text" class="form-control" name="cdUF" id="cdUF" value="{$registro.cdUF|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Cidade</label>
                        <input type="text" class="form-control" name="dsCidade" id="dsCidade" value="{$registro.dsCidade|default:''}" >           
                    </div> 
                </div>  
                <br>                    
                <div class="row">
                    <div class="col-xs-1">
                        <label for="form-control">C.E.P</label>
                        <input type="text" class="form-control" name="cdCEP" id="cdCEP" value="{$registro.cdCEP|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Bairro</label>
                        <input type="text" class="form-control" name="dsBairro" id="dsBairro" value="{$registro.dsBairro|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Endereço</label>
                        <input type="text" class="form-control" name="dsEndereco" id="dsEndereco" value="{$registro.dsEndereco|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Fone Fixo</label>
                        <input type="text" class="form-control" name="dsFone" id="dsFone" value="{$registro.dsFone|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Celular / Whatsapp</label>
                        <input type="text" class="form-control" name="dsCelular" id="dsCelular" value="{$registro.dsCelular|default:''}" >           
                    </div> 
                </div>    
                <br>                    
                <div class="row">
                    <div class="col-xs-2">
                        <label for="form-control">Fone de Contato</label>
                        <input type="text" class="form-control" name="dsFoneContato" id="dsFoneContato" value="{$registro.dsFoneContato|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Contato</label>
                        <input type="text" class="form-control" name="dsContato" id="dsContato" value="{$registro.dsContato|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">E-Mail</label>
                        <input type="text" class="form-control" name="dsEmail" id="dsEmail" value="{$registro.dsEmail|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="tipodecliente">Tipo de Cliente</label>
                            <select class="form-control" name="idTipoCliente" id="idTipoCliente">
                                {html_options options=$lista_tipo selected=$registro.idTipoCliente}
                            </select>                      
                        </div>
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Data Nascimento</label>
                        <input type="text" class="form-control" name="dtNascimento" id="dtNascimento" value="{$registro.dtNascimento|default:''}" >           
                    </div> 
                    <div class="col-xs-1">
                        <label for="form-control">Prontuário</label>
                        <input type="text" class="form-control" name="nrProntuario" id="nrProntuario" value="{$registro.nrProntuario|default:''}" >           
                    </div> 
                </div> 
                <br>
                  <div class="col-xs-3">
                    <div class="row">
                        <input class="btn btn-primary" type="submit" value="  Gravar" name="btnGravar"/>         
                    </div> 
                  </div> 
                <br>
            </form>
            
        <!--Altere daqui pra cima-->
    </div>
</div>

<!-- JavaScript -->
<script src="/files/js/jquery-1.10.2.js"></script>
<script src="/files/js/bootstrap.js"></script>
<!-- Toast Message -->
<script src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<!-- Utils -->
<script src="/files/js/util.js"></script>
<script src="/files/js/cliente/cliente_novo.js"></script>



{include file="comuns/footer.tpl"}

