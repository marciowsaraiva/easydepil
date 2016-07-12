{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!--Altere daqui pra baixo-->
        <div class="panel-body">
            <div class="alert alert-info" >
                <tt><h1>{if {$registro.idFornecedor}>0} {$registro.dsFornecedor|default:''}{else} Inclus&atilde;o de Fornecedores{/if}</h1></tt>
            </div>          
            <a href="/fornecedor" class="btn btn-primary"> Voltar</a><br>

            <form name="frm-fornecedor" 
                  action="/fornecedor/gravar_fornecedor" 
                  method="POST" 
                  enctype="multipart/form-data"
                  onsubmit="return validaFormulario();">
                <br>
                <div class="row">
                    <div class="col-xs-1">
                        {if {$registro.idFornecedor}>0}
                                <label for="form-control">Código</label>
                                <input type="text" class="form-control" name="idFornecedor" id="idFornecedor" value="{$registro.idFornecedor}" READONLY>           
                        {else}
                                 <label for="form-control">Código</label>
                                 <input type="text" class="form-control" name="idFornecedor" value="" READONLY>           
                        {/if}                     
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Nome do Fornecedor</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{$registro.dsFornecedor|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">C.N.P.J</label>
                        <input type="text" class="form-control" name="cdCNPJ" id="cdCNPJ" value="{$registro.cdCNPJ|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Endereço</label>
                        <input type="text" class="form-control" name="dsEndereco" id="dsEndereco" value="{$registro.dsEndereco|default:''}" >           
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
                    <div class="col-xs-1">
                        <label for="form-control">U.F</label>
                        <input type="text" class="form-control" name="cdUF" id="cdUF" value="{$registro.cdUF|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Contato</label>
                        <input type="text" class="form-control" name="dsContato" id="dsContato" value="{$registro.dsContato|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <label for="form-control">Fone</label>
                        <input type="text" class="form-control" name="dsFone" id="dsFone" value="{$registro.dsFone|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">Celular</label>
                        <input type="text" class="form-control" name="dsCelular" id="dsCelular" value="{$registro.dsCelular|default:''}" >           
                    </div> 
                    <div class="col-xs-3">
                        <label for="form-control">E-Mail</label>
                        <input type="text" class="form-control" name="dsEmail" id="dsEmail" value="{$registro.dsEmail|default:''}" >           
                    </div> 
                </div>    
                <br>                    
                <div class="row">
                    <div class="col-xs-2">
                        <label for="form-control">Site</label>
                        <input type="text" class="form-control" name="dsSite" id="dsSite" value="{$registro.dsSite|default:''}" >           
                    </div> 
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="nomemaoobra">Tipo de Fornecedor</label>
                            <select class="form-control" name="idTipoFornecedor" id="idTipoFornecedor">
                                {html_options options=$lista_tipo selected=$registro.idTipoFornecedor}
                            </select>                      
                        </div>
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
<script src="/files/js/fornecedor/fornecedor_novo.js"></script>



{include file="comuns/footer.tpl"}

