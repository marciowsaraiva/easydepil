{include file="comuns/head.tpl"}

<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <h1>CONTROLE DE ACESSO - PERFIL</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>PERFIL</th>
                            <th>ACAO</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$regs item=reg}
                            <tr>
                                <td style="text-transform: uppercase;">{$reg.descricao}</td>
                                <td>
                                    {if $reg.idPerfil neq 1}
                                        <a href="/controleAcesso/perfil/acao/editar/perfil/{$reg.idPerfil}">EDITAR</a>
                                    {/if}
                                </td>
                            </tr>
                        {foreachelse}
                            <tr>
                                <td colspan="100%">NENHUM REGISTRO CADASTRADO.</td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-xs-12">
                        {$paginacao|default:''}
                    </div>
                </div>

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

{include file="comuns/footer.tpl"}