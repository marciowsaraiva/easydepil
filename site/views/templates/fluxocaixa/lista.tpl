    <div id='mostrarresultado'>
        {assign var="totaldespesa" value=0}        
        {assign var="totalreceita" value=0}        
        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Fornecedor/Cliente</th>
                    <th>Descricao da Receita/Despesa</th>
                    <th>Valor da Receita</th>
                    <th>Valor da Despesa</th>
                    <th>Observação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$registro item="linha"}  
                <tr>
                    <td>{$linha.dtFinanceiro|date_format:'%d/%m/%Y'}</td> 
                    {if $linha.stTipo == 'C'}
                        <td>{$linha.dsCliente}</td> 
                        <td>{$linha.dsReceita}</td> 
                        <td>{$linha.vlFinanceiro}</td> 
                        <td></td> 
                        {$totalreceita = $totalreceita + $linha.vlFinanceiro}        
                    {else}
                        <td>{$linha.dsFornecedor}</td> 
                        <td>{$linha.dsDespesa}</td> 
                        <td></td> 
                        <td>{$linha.vlFinanceiro}</td> 
                        {$totaldespesa = $totaldespesa + $linha.vlFinanceiro}        
                    {/if}
                    <td>{$linha.dsObservacao}</td> 
                    <td><a class="glyphicon glyphicon-trash" href="/fluxocaixa/dellancamento/idFinanceiro/{$linha.idFinanceiro}">  Excluir</a></td>
                </tr>
                {/foreach}                   
            </tbody>
            <tfoot>
                <td></td>
                <td></td>
                <td><strong>TOTAL:</strong></td>
                <td><strong>{$totalreceita}</strong></td>
                <td><strong>{$totaldespesa}</strong></td>            
                <td></td>
                <td></td>
            </tfoot>
        </table>
    </div>