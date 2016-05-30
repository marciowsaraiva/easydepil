<?php

class maquinamudancaModel extends model {

    var $tabPadrao = 'clinMaquina';
    var $campo_chave = 'idMaquina';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idMaquina'] = NULL;
        $dados[0]['dsMaquina'] = NULL;
        return $dados;
    }
    
}
?>
