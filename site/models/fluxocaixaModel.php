<?php

class fluxocaixaModel extends model {
    public function getFluxoCaixa($where = null) {
        $tables = 'clinFinanceiro f';
        $tables .= ' left join clinCliente c on f.idCliente = c.idCliente';
        $tables .= ' left join clinFornecedor fo on fo.idFornecedor = f.idFornecedor';
        $tables .= ' left join clinDespesa d on d.idDespesa = f.idDespesa';
        $tables .= ' left join clinReceita r on r.idReceita = f.idReceita';
        return $this->read($tables, array('f.*', 'c.dsCliente', 'fo.dsFornecedor', 'd.dsDespesa', 'r.dsReceita'), $where, null, null, null, 'f.dtFinanceiro');
    }
}
?>
