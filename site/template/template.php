<?php

/**
 * Description of template
 *
 * @author dcaetano
 */
class template {

    protected $title;
    protected $css = array();
    protected $js = array();
    protected $path_root;
    protected $settings;
    public $smarty;
    public $public_pages = array();
    public $permissoes;

    public function __construct($objSmarty) {
        $this->smarty = $objSmarty;
        $this->permissoes = new permissoes();

        $this->public_pages = array('login', 'erro');

        /* Loading default CSS and JS */
        $this->css[] = $this->path_root . '/files/css/style.css';
        $this->js[] = $this->path_root . '/files/js/jquery-1.9.1.js';
        $this->js[] = $this->path_root . '/files/js/jquery.mask.js';
        $this->js[] = $this->path_root . '/files/js/jquery_ui/js/jquery-ui-1.10.3.custom.min.js';
        $this->css[] = $this->path_root . '/files/js/jquery_ui/css/smoothness/jquery.ui.all.css';
        $this->js[] = $this->path_root . '/files/js/tiny_mce/tiny_mce.js';
        $this->js[] = $this->path_root . '/files/js/jquery_shapeshift/jquery.shapeshift.js';
        $this->js[] = $this->path_root . '/files/js/jquery.easing.1.3.js';
        $this->js[] = $this->path_root . '/files/js/util.js';
        $this->js[] = $this->path_root . '/files/js/jquery.ui.touch-punch.min.js';
        $this->js[] = $this->path_root . '/files/js/jquery.nicescroll.js';
        $this->js[] = $this->path_root . '/files/js/jquery_menu/fg.menu.js';
        $this->js[] = $this->path_root . '/files/js/jquery_menu/fg.menu_script.js';

        $this->css[] = $this->path_root . '/files/css/aplicacao.css';


        //notify scripts
        $this->js[] = $this->path_root . '/files/js/noty/jquery.noty.js';
        $this->js[] = $this->path_root . '/files/js/noty/layouts/bottom.js';
        $this->js[] = $this->path_root . '/files/js/noty/layouts/bottomCenter.js';
        $this->js[] = $this->path_root . '/files/js/noty/layouts/bottomLeft.js';
        $this->js[] = $this->path_root . '/files/js/noty/layouts/bottomRight.js';
        $this->js[] = $this->path_root . '/files/js/noty/layouts/center.js';
        $this->js[] = $this->path_root . '/files/js/noty/layouts/inline.js';
        $this->js[] = $this->path_root . '/files/js/noty/themes/default.js';


        if ($this->permissoes->is_logged()) {
            $this->js[] = $this->path_root . '/files/js/notificacoes.js';
            $this->js[] = $this->path_root . '/files/js/niceScroll.js';
            $this->js[] = $this->path_root . '/files/js/toastmessage/javascript/jquery.toastmessage.js';
            $this->css[] = $this->path_root . '/files/js/toastmessage/resources/css/jquery.toastmessage.css';
            $this->js[] = $this->path_root . '/files/js/centralizar.js';

            $this->js[] = $this->path_root . '/files/js/colorpicker/js/colorpicker.js';
            $this->css[] = $this->path_root . '/files/js/colorpicker/css/colorpicker.css';

            $this->js[] = $this->path_root . '/files/js/timepicker/jquery.ui.timepicker.js';
            $this->css[] = $this->path_root . '/files/js/timepicker/jquery.ui.timepicker.css';

            $this->js[] = $this->path_root . '/files/js/jquery_file_upload/js/jquery.fileupload.js';
            $this->js[] = $this->path_root . '/files/js/jquery_file_upload/js/jquery.iframe-transport.js';
            $this->css[] = $this->path_root . '/files/js/jquery_file_upload/css/jquery.fileupload-ui.css';
        }
    }

    public function setTitle($title = NOME_SITE) {
        $this->title = $title;
    }

    public function fetchCSS($css) {
        $this->css[] = $this->path_root . $css;
    }

    public function fetchJS($js) {
        $this->js[] = $this->path_root . $js;
    }

    public function top() {
        // $top = $this->smarty->fetch("comuns/top.html");
        // $this->smarty->assign('top', $top);
    }

    public function header() {
        $this->smarty->assign('path_root', $this->path_root);
        $this->smarty->assign('title', $this->title);
        $this->smarty->assign('css', $this->css);
        $this->smarty->assign('js', $this->js);

        // $head = $this->smarty->fetch("comuns/head.html");
        // $this->smarty->assign('head', $head);
    }

    public function footer() {
        //$rodape = $this->smarty->fetch("comuns/footer.html");
        // $this->smarty->assign('rodape', $rodape);
    }

    public function run() {
        //$this->permissoes->check_login($this->public_pages);
        //$this->top();
        $this->header();
        $this->footer();
    }

}

?>
