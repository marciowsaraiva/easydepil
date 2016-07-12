{foreach from=$padrao_lista item="data"}
  <tr id="line_{$data.idReceita}">
    <td>{$data.idReceita}</td>
    <td>{$data.dsReceita}</td>    
    <td>        
      <span class="link_falso" onclick="link_edita_padrao({$data.idReceita})">
        <img src="/files/images/cad_edit.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span>
      <span class="link_falso" onclick="link_exclui_padrao({$data.idReceita})">
        <img src="/files/images/cad_exclui.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span> 
    </td>
  </tr>   
  {foreachelse}    
  <tr>    
    <td>Nenhum Receita Encontrado</td>
  </tr>
{/foreach}

