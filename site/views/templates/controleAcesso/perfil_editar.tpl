{include file="comuns/head.tpl"}

<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <p><a href="/controleAcesso" class="btn btn-default">VOLTAR</a></p>
                <h1>CONTROLE DE ACESSO - PERFIL EDICAO</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">

                <h3 style="text-transform: uppercase;">#{$reg.idPerfil} | {$reg.descricao} - PERFIL</h3>

                <form name="form_controller" method="post" action="/controleAcesso/perfil/acao/salvar">

                    <input type="hidden" id="perfil" name="perfil" value="{$reg.idPerfil}" />

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="30" ><input type="checkbox" id="check_all" title="SELECIONAR TODOS" /></th>
                                    <th>NOME DO CONTROLLER</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$controllers item=controller}
                                    {assign var="check" value=""}

                                    {foreach from=$controllers_perfil item=perfil}
                                        {if $perfil.idController eq $controller.idController}
                                            {assign var="check" value=" checked"}
                                        {/if}
                                    {/foreach}

                                    <tr>
                                        <td>
                                            <input type="checkbox" id="{$controller.idController}" name="controller[]"{$check} value="{$controller.idController}" />
                                        </td>
                                        <td style="text-transform: uppercase;"><label style="font-weight: normal; " for="{$controller.idController}">{$controller.des}</label></td>
                                    </tr>
                                {foreachelse}
                                    <tr>
                                        <td colspan="100%">NENHUM REGISTRO CADASTRADO.</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12 col-lg-3">
                        <div class="row form-group">
                            <input type="submit" id="salvar" class="form-control btn btn-primary" value="SALVAR" />
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- JavaScript -->
<script type="text/javascript" src="/files/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/files/js/bootstrap.js"></script>
<script type="text/javascript" src="/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/files/js/toastmessage/javascript/jquery.toastmessage.js"></script>
<script type="text/javascript" src="/files/js/util.js"></script>
<script src="/files/js/controleAcesso/perfil_editar.js" type="text/javascript"></script>

{include file="comuns/footer.tpl"}