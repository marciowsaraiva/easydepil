<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of util
 *
 * @author dcaetano
 */
class util {

    //put your code here

    public function generateAcessKey($length) {
        $max = ceil($length / 32);
        $random = '';
        for ($i = 0; $i < $max; $i++) {
            $random .= md5(microtime(true) . mt_rand(10000, 90000));
        }
        return substr($random, 0, $length);
    }

    public static function limpa_campo($varSal) {
        $lixo = array(" ", ".", "/", "-", "(", ")");
        $varSal = str_replace($lixo, "", $varSal);

        return str_replace(",", ".", $varSal);
    }

    public static function fixUrl($string, $slug = '-') {

        $string = strtolower(utf8_decode($string));

        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), array(240, 248));
        $ascii['u'] = range(249, 252);

        // Código ASCII dos outros caracteres
        $ascii['b'] = array(223);
        $ascii['c'] = array(231);
        $ascii['d'] = array(208);
        $ascii['n'] = array(241);
        $ascii['y'] = array(253, 255);

        foreach ($ascii as $key => $item) {
            $acentos = '';
            foreach ($item AS $codigo)
                $acentos .= chr($codigo);
            $troca[$key] = '/[' . $acentos . ']/i';
        }

        $string = preg_replace(array_values($troca), array_keys($troca), $string);

        // Slug?
        if ($slug) {
            // Troca tudo que não for letra ou número por um caractere ($slug)
            $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
            // Tira os caracteres ($slug) repetidos
            $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
            $string = trim($string, $slug);
        }

        return $string;
    }

    public static function letrasMaiusculaSemAcento($string) {

        /* $trata_string = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
          return strtoupper($trata_string); */
        if (!preg_match('/[\x80-\xff]/', $string)) {
            return strtoupper($string);
        } else {
            $chars = array(
                // Decompositions for Latin-1 Supplement
                chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
                chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
                chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
                chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',
                chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',
                chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',
                chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',
                chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',
                chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
                chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
                chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
                chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
                chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
                chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',
                chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',
                chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',
                chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',
                chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
                chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
                chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
                chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
                chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',
                chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',
                chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',
                chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',
                chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',
                chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',
                chr(195) . chr(191) => 'y',
                // Decompositions for Latin Extended-A
                chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
                chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
                chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
                chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
                chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
                chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
                chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
                chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
                chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
                chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
                chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
                chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
                chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
                chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
                chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
                chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
                chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
                chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
                chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
                chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
                chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
                chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
                chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
                chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
                chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
                chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
                chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
                chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
                chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
                chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
                chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
                chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
                chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
                chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
                chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
                chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
                chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
                chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
                chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
                chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
                chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
                chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
                chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
                chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
                chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
                chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
                chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
                chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
                chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
                chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
                chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
                chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
                chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
                chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
                chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
                chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
                chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
                chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
                chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
                chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
                chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
                chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
                chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
                chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's'
            );
            $string = strtr($string, $chars);
            return strtoupper($string);
        }
    }
    
    //Retira espaços no início e fim, barras inversas
    //Troca por entities: ampersand (&), aspas dupla ("), aspas simples ('), menor que (<), maior que (>) 
    public static function fix_string($str) {
        return trim(_no_slashes(htmlspecialchars($str, ENT_QUOTES)));
    }

    public static function apenasNumeros($str) {
        return preg_replace("/[^0-9]/i", "", $str);
    }

    public static function moeda($valor) {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $valor);
        return $valor;
    }

    public static function limitaTexto($str, $val) {
        $sp = explode(' ', $str);
        $n = sizeof($sp);
        if ($n > $val) {
            for ($i = 0; $i < $val; $i++) {
                $cach .= $sp[$i] . " ";
            }
            return $cach . "[...]";
        } else {
            return $str;
        }
    }

    public function checkUrlAmigavel($url) {

        $url_produto = explode("/", $url);

        if (isset($url_produto[2]) && $url_produto[2] != null) {
            $url_produto = $url_produto[2];

            $proModel = new produtoModel();
            $checkUrl = $proModel->getUrlProduto($url_produto);

            if (count($checkUrl) > 0) {
                $arr['controller'] = 'produto';
                $arr['action'] = 'produtos';
                $arr['params'] = $checkUrl[0]['titulo_url'];
                return($arr);
            }
        }
    }

    public static function trataCaptcha() {

        $resp = null;
        $error = null;

        $captcha = new captcha();

        if ($_POST["recaptcha_response_field"]) {
            $resp = $captcha->recaptcha_check_answer(PRIVATE_KEY_CAPTCHA, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
            if ($resp->is_valid) {
                return true;
            } else {
                echo '- Entrada incorreta no captcha';
                die;
            }
        }
        //echo recaptcha_get_html($publickey, $error);
    }

    public static function trataNomeArquivo($arquivo) {
        $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
        $filename = util::fixUrl(pathinfo($arquivo, PATHINFO_FILENAME));
        return $filename . '.' . $extensao;
    }

    public function copyr($src, $dst) {
        //caso nao exista o diretorio devo criar
        if (is_dir($dst) === false) {
            mkdir($dst, 0777);
        }
        $listFiles = scandir($src);
        foreach ($listFiles as $files) {
            if ($files != '.' && $files != '..') {
                if (is_dir($src . '/' . $files))
                    $this->copyr($src . '/' . $files, $dst . '/' . $files);
                else
                    copy($src . '/' . $files, $dst . '/' . $files);
            }
        }
    }

    public function rrmdir($dir) {
        foreach (glob($dir . '/*') as $file) {
            if (is_dir($file))
                $this->rrmdir($file);
            else
                unlink($file);
        }
        rmdir($dir);
    }

    //debug no log
    public function debug_no_log($texto, $tipo_log = 1) {
        $log_o = new logModel;
        $log_o->logPadrao($texto, $tipo_log);
    }

    //Adiciona caracteres ao lado esquerdo
    function str_pad_left($string, $padchar, $int) {
        $i = strlen($string) + $int;
        $str = str_pad($string, $i, $padchar, STR_PAD_LEFT);
        return $str;
    }

    //Cria Diretorio caso o o mesmo não exista
    //$CaminhoCompleto para o diretorio completo para o diretorio
    function criaDiretorio($caminhoCompleto) {
        //Verifica e cria ano/dia/projeto folder.           
        if (!file_exists($caminhoCompleto)) {
            mkdir($caminhoCompleto, 0777);
        };
    }

    public static function mascara($string, $mascara) {
        $replace = $string;
        if (!empty($string)) {
            if (is_array($mascara)) {
                foreach ($mascara as $key => $mask) {
                    if ($key == strlen($string)) {
                        $replace = $mask;
                        $string = str_replace(" ", "", $string);
                        for ($i = 0; $i < strlen($string); $i++) {
                            $replace[strpos($replace, "#")] = $string[$i];
                        }
                        break;
                    }
                }
            } else if (is_string($mascara)) {
                $replace = $mascara;
                $string = str_replace(" ", "", $string);
                for ($i = 0; $i < strlen($string); $i++) {
                    $replace[strpos($replace, "#")] = $string[$i];
                }
            }
        }
        return $replace;
    }

    public static function modifier_date_format($string, $format = null, $default_date = '', $formatter = 'auto') {

        if ($format === null) {
            $format = '%b %-e, %Y';
        }

        /**
         * Include the {@link shared.make_timestamp.php} plugin
         */
        require_once( PATH_ROOT . '/system/libs/smarty/plugins/shared.make_timestamp.php');
        if ($string != '' && $string != '0000-00-00' && $string != '0000-00-00 00:00:00') {
            $timestamp = smarty_make_timestamp($string);
        } elseif ($default_date != '') {
            $timestamp = smarty_make_timestamp($default_date);
        } else {
            return;
        }
        if ($formatter == 'strftime' || ($formatter == 'auto' && strpos($format, '%') !== false)) {
            if (DS == '\\') {
                $_win_from = array('%D', '%h', '%n', '%r', '%R', '%t', '%T');
                $_win_to = array('%m/%d/%y', '%b', "\n", '%I:%M:%S %p', '%H:%M', "\t", '%H:%M:%S');
                if (strpos($format, '%e') !== false) {
                    $_win_from[] = '%e';
                    $_win_to[] = sprintf('%\' 2d', date('j', $timestamp));
                }
                if (strpos($format, '%l') !== false) {
                    $_win_from[] = '%l';
                    $_win_to[] = sprintf('%\' 2d', date('h', $timestamp));
                }
                $format = str_replace($_win_from, $_win_to, $format);
            }

            return strftime($format, $timestamp);
        } else {
            return date($format, $timestamp);
        }
    }

    public static function semana_do_ano($dia, $mes, $ano) {
        //$data = explode('/', $data); // 19/08/2014
        $var = intval(date('z', mktime(0, 0, 0, $mes, $dia, $ano)) / 7) + 1;
        return $var;
    }
    
    /*
     * Params: $mes - int (1 - 12)
     * Return: Descrição do mês - String 
     */
    public static function descricao_mes($mes = 0) {
        switch($mes){
            case 1:
                return "Janeiro";
            case 2:
                return "Fevereiro";
            case 3:
                return "Março";
            case 4:
                return "Abril";
            case 5:
                return "Maio";
            case 6:
                return "Junho";
            case 7:
                return "Julho";
            case 8:
                return "Agosto";
            case 9:
                return "Setembro";
            case 10:
                return "Outubro";
            case 11:
                return "Novembro";
            case 12:
                return "Dezembro";
            default:
                return NULL;
        }
    }

}
