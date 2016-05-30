<?php

//Configuracao do Ambiente
@define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
@define('SMARTYDIR', PATH_ROOT . 'storage/tmp/smarty');
@define('LIBS', 'system/libs');
@define('HTTP_ROOT', 'http://' . $_SERVER['HTTP_HOST']);
@define('MEUDIR', dirname(__FILE__));
@define('SERVIDOR_ALTERNATIVO', '');
@define('DEBUG_APP', false);
@define('TEMPO_LIMITE', 1800); //Tempo limite da Sessao Expirar em Segundos
@define('NOME_APLICACAO', 'Easy Depil');
@define('SINCDAYLIMIT', 6);
@define('STORAGE_ROOT', 'storage/');
@define('EMAIL_SAC', 'jreislemos@outlook.com');

/*
 * Configuração do Banco de Dados 
 */
@define('DBHOST', '127.0.0.1');
@define('DBPORT', '3306');
@define('DBUSER', 'root');
@define('DBPASS', 'Foxit258');
@define('DBNAME', 'easydepil');
@define('DBENCODING', 'utf8');

/*
 *  Configuração de email
 */

@define('SMTPHOST', '');
@define('SMTPAUTH', true);
@define('SMTPSECURE'  , 'ssl');
@define('SMTPPORT', '587');
@define('SMTPUSER', '');
@define('SMTPPASS', '');
@define('SMTPFROM', '');
@define('SMTPFROMNAME', '');
@define('HTML', true);


//LOG
@define('LOG_TYPE', 'MySQL');
