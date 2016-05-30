{foreach from=$log_tipo_lista item="linha"}
  <tr id="line_{$data.idLogTipo}">
    <td>{$data.idLogTipo}</td>
    <td>{$data.descricao}</td>    
    <td>{$data.stStatus}</td>    
    <td>
         <tr>
            <td><a href="/log_tipo/novo_log_tipo/idLogTipo/{$linha.idLogTipo}">{$linha.idLogTipo}</a></td>
            <td>{$linha.descricao}</td>
            <td>{$linha.stStatus}</td>
            <td> <a class="glyphicon glyphicon-pencil" href="/log_tipo/novo_log_tipo/idLogTipo/{$linha.idLogTipo}">Editar</a> |
                <a class="glyphicon glyphicon-trash" href="/log_tipo/dellog_tipo/idLogTipo/{$linha.idLogTipo}">Excluir</a> </td>
        </tr>
    </td>
  </tr>   
  {foreachelse}    
  <tr>    
    <td>Nenhum Registro Encontrado</td>
  </tr>
{/foreach}


