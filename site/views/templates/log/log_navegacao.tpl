{include file="comuns/head.tpl"}
<div id="wrapper">
    <!-- Sidebar -->
    {include file="comuns/sidebar.tpl"}    
    <div id="page-wrapper">
        <!-- Sidebar -->
        {include file="comuns/sidebar.tpl"}        
        <!--Altere daqui pra baixo-->


        <div id="page-wrapper">
             <a href="/log" class="btn btn-primary"> Voltar</a><br>
            <div class="row">
                <div class="col-lg-12">

                    {* Mostrando Informacoes *}
                    Página {$smarty.session.paginacao.atual} de {$smarty.session.paginacao.total_paginas} Paginas. Total de {$smarty.session.paginacao.total_registros} Registros.
                    <hr>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>mensagem</th>                   
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$results item="linha"}
                                <tr>
                                    <td>{$linha.idLog}</td>
                                    <td>{$linha.mensagem}</td>                  
                                {foreachelse}
                                <tr><td colspan="6">Nenhum registro encontrado</td></tr>
                            {/foreach}        
                        </tbody>
                    </table>
{*                    <div class="col-lg-6">                       
                        <ul class="pager">
                            <li class="previous  {if ($smarty.session.paginacao.atual==1)}disabled{/if}">{$smarty.session.paginacao.botoes.anterior}</li>
                            <li class="next {if $smarty.session.paginacao.atual==$smarty.session.paginacao.total_paginas}disabled{/if}">{$smarty.session.paginacao.botoes.proximo}</li>
                        </ul>
                    </div>   *}           
                    <ul class="pagination">
                        <li>{$smarty.session.paginacao.botoes.primeiro}</li>
                            {$smarty.session.paginacao.botoes.meio} 
                        <li>{$smarty.session.paginacao.botoes.ultimo}</li>
                    </ul>  

                  












                </div>
            </div><!-- /.row -->

        </div><!-- /#page-wrapper -->

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
<!-- Blank JS -->
<!--<script src="/files/js/blank/blank.js"></script> -->
{include file="comuns/footer.tpl"}
