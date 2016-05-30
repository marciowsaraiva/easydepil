{foreach from=$padrao_lista item="data"}
  <tr id="line_{$data.id_padrao}">
    <td>{$data.id_padrao}</td>
    <td>{$data.descricao}</td>    
    <td>        
      <span class="link_falso" onclick="link_edita_padrao({$data.id_padrao})">
        <img src="/files/images/cad_edit.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span>
      <span class="link_falso" onclick="link_exclui_padrao({$data.id_padrao})">
        <img src="/files/images/cad_exclui.png" alt="Alterar" width="25" height="25" title="Alterar">
      </span> 
    </td>
  </tr>   
  {foreachelse}    
  <tr>    
    <td>Nenhum Insumo Encontrado</td>
  </tr>
{/foreach}

