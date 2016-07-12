{foreach from=$padrao_lista item="data"}
  <tr id="line_{$data.idDespesa}">
    <td>{$data.idDespesa}</td>
    <td>{$data.dsDespesa}</td>    
    <td>        
      <span class="link_falso" onclick="link_edita_padrao({$data.idDespesa})">
        <img src="/files/images/cad_edit.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span>
      <span class="link_falso" onclick="link_exclui_padrao({$data.idDespesa})">
        <img src="/files/images/cad_exclui.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span> 
    </td>
  </tr>   
  {foreachelse}    
  <tr>    
    <td>Nenhum Despesa Encontrado</td>
  </tr>
{/foreach}

