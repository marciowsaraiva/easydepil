<?php

class paginacao {

    public function prepara_novo($array, $itens = 25, $pagina = FALSE, $total_regs) {
        
        $paginacao['total_regs'] = $total_regs;
        $paginacao['total_pages'] = ceil($paginacao['total_regs'] / $itens);
//        $paginacao['total_pages'] = ceil($itens);
        if ($pagina == FALSE || $pagina == 1) {
            $inicio = 0;
            $paginacao['pagina_atual'] = 1;
            $paginacao['pagina_proxima'] = 2;
            $paginacao['pagina_anterior'] = 1;
            $paginacao['go_first'] = false;
            $paginacao['go_prior'] = false;
            $paginacao['go_next'] = true;
            $paginacao['go_last'] = true;
        } else {
            $paginacao['pagina_atual'] = $pagina;
            $paginacao['pagina_anterior'] = ($paginacao['pagina_atual'] - 1);

            if ($paginacao['pagina_atual'] == $paginacao['total_pages']) {
                $paginacao['pagina_proxima'] = $paginacao['pagina_atual'];
                $paginacao['go_next'] = false;
                $paginacao['go_last'] = false;
            } else {
                $paginacao['pagina_proxima'] = ($paginacao['pagina_atual'] + 1);
                $paginacao['go_next'] = true;
                $paginacao['go_last'] = true;
            }

            $inicio = (($paginacao['pagina_atual'] - 1) * $itens);
            $paginacao['go_first'] = true;
            $paginacao['go_prior'] = true;
        }

        $fim = $inicio + $itens;

        //print_a_die($inicio . " - " . $fim);
        //print_a_die($total_regs);

        if ($total_regs > $itens) {
            $dados['paginacao'] = $paginacao;            
        }
        $dados['regs'] = $array;
                
        return $dados;
    }

    public function prepara($array, $itens = 25, $pagina = FALSE) {

        $paginacao['total_regs'] = count($array);
        $paginacao['total_pages'] = ceil($paginacao['total_regs'] / $itens);
//        $paginacao['total_pages'] = ceil($itens);
        if ($pagina == FALSE || $pagina == 1) {
            $inicio = 0;
            $paginacao['pagina_atual'] = 1;
            $paginacao['pagina_proxima'] = 2;
            $paginacao['pagina_anterior'] = 1;
            $paginacao['go_first'] = false;
            $paginacao['go_prior'] = false;
            $paginacao['go_next'] = true;
            $paginacao['go_last'] = true;
        } else {
            $paginacao['pagina_atual'] = $pagina;
            $paginacao['pagina_anterior'] = ($paginacao['pagina_atual'] - 1);

            if ($paginacao['pagina_atual'] == $paginacao['total_pages']) {
                $paginacao['pagina_proxima'] = $paginacao['pagina_atual'];
                $paginacao['go_next'] = false;
                $paginacao['go_last'] = false;
            } else {
                $paginacao['pagina_proxima'] = ($paginacao['pagina_atual'] + 1);
                $paginacao['go_next'] = true;
                $paginacao['go_last'] = true;
            }

            $inicio = (($paginacao['pagina_atual'] - 1) * $itens);
            $paginacao['go_first'] = true;
            $paginacao['go_prior'] = true;
        }

        $fim = $inicio + $itens;

        //print_a_die($inicio . " - " . $fim);

        if (count($array) > $itens) {

            for ($i = $inicio; $i < $fim; $i++) {

                if (!empty($array[$i])) {
                    $dados['regs'][$i] = $array[$i];
                }
            }

            $dados['paginacao'] = $paginacao;

            return $dados;
        } else {
            $dados['regs'] = $array;
            return $dados;
        }
    }

    public function montarPaginacao($array, $range = 10) {

        if (strpos($_GET['url'], '/pagina/') !== false) {
            $value = $_GET['url'];
        } else {
            $value = $_GET['url'] . '/pagina/1';
        }

        $explode = explode("/", $value);
        //print_a_die($explode);
        $pagina_atual_explode = end($explode);

        if (!empty($explode)) {

            for ($i = 0; $i < count($explode); $i++) {

                if ($explode[$i] == 'pagina') {
                    $param[] = 'pagina';
                    $i++;
                } elseif (isset($explode[0]) && $explode[1] == 'pagina' && strpos($_GET['url'], '/index_action/') === false) {
                    $param[] = $explode[0] . '/index_action';
                } else {
                    $param[] = $explode[$i];
                }
            }
        }

        $url = "/" . implode($param, "/");

        $lista = array();
        $lista[] = ($array['go_first']) ? '<li><a href="' . $url . '/1">Primeira</a></li>' : null;
        $lista[] = ($array['go_prior']) ? '<li><a href="' . $url . '/' . ($pagina_atual_explode - 1) . '">Anterior</a></li>' : null;

        //faz o range dos resultados
        if ($array['total_pages'] > $range) {
            $array['page_start'] = ($array['pagina_atual'] - (ceil($range / 2)));
            $array['page_end'] = ($array['pagina_atual'] + (ceil($range / 2)));

            if ($array['page_start'] < 1) {
                $array['page_start'] = 1;
                $array['page_end'] = $range;
            }
            if ($array['page_end'] > $array['total_pages']) {
                $array['page_start'] = ($array['total_pages'] - $range);
                $array['page_end'] = $array['total_pages'];
            }
        } else {
            $array['page_start'] = 1;
            $array['page_end'] = $array['total_pages'];
        }

        for ($i = $array['page_start']; $i < ($array['page_end'] + 1); $i++) {

            if ($i == $array['pagina_atual']) {
                $lista[] = "<li class=\"active\"><a>$i <span class=\"sr-only\">(current)</span></a></li>";
            } else {
                $lista[] = "<li><a title=\"P??gina $i\" href=\"" . $url . "/" . $i . "\">$i</a></li>";
            }
        }

        $lista[] = ($array['go_next']) ? '<li><a href="' . $url . '/' . ($pagina_atual_explode + 1) . '">Pr??xima</a></li>' : null;
        $lista[] = ($array['go_last']) ? '<li><a href="' . $url . '/' . $array['total_pages'] . '">??ltima</a></li>' : null;

        $menu = null;
        $menu .= "<ul class=\"pagination\">";
        $menu .= implode($lista);
        $menu .= "</ul>";

        if ($array['pagina_atual'] <= $array['total_pages']) {
            $menu .= "<p class=\"clear\">Exibindo p??gina <strong>" . $array['pagina_atual'] . "</strong> de <strong>" . $array['total_pages'] . "</strong> em um total de <strong>" . $array['total_regs'] . "</strong> registro(s).";
        }

        return $menu;
    }

}
