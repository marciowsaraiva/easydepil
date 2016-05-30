<?php

class projetomudancaModel extends model {

    var $tabPadrao = 'clinProjeto';
    var $campo_chave = 'idProjeto';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idProjeto'] = NULL;
        $dados[0]['dsProjeto'] = NULL;
        return $dados;
    }
    
}
?>
