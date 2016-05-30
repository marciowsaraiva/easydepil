<?php

class dashboardModel extends model {

    var $tabPadrao = 'troca';
    var $campo_chave = 'id_troca';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['id_trocas_situacao'] = NULL;
        $dados[0]['descricao'] = NULL;
        $dados[0]['stStatus'] = NULL;
        return $dados;
    }

    public function getTrocas($where = NULL) {
        $campos = array('count(*) as total');
        return $this->read($this->tabPadrao, $campos, $where, null, null, null, null);
    }

    public function getTrocasMes($where = NULL, $groupby = NULL, $idProjeto = null) {
        $fields = array("
            count(t.data_conclusao) as qtd_troca,
            t.data_conclusao,
            t.idProjeto,
            (select count(t1.id_troca_situacao) from troca t1 where t1.id_troca_situacao = 3 and date(t1.data_conclusao) = date(t.data_conclusao) and t1.idProjeto IN ({$idProjeto})) as sucesso,
            (select count(t2.id_troca_situacao) from troca t2 where t2.id_troca_situacao = 4 and date(t2.data_conclusao) = date(t.data_conclusao) and t2.idProjeto IN ({$idProjeto})) as insucesso");
        return $this->read($this->tabPadrao ." t", $fields, $where, $groupby, null, null, null);
    }

}
