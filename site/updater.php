<?php
@define('LIBS', '../../../system/libs');
require_once(LIBS . "/debuglib/debuglib.php");
require_once('../../../system/helpers/util.php');

$func = isset($_GET['func']) ? $_GET['func'] : null;
$htmlListFolders = '';
$util = new util();
$path_tmp = $_SERVER['DOCUMENT_ROOT'] . 'tmp/';
$path_system = $_SERVER['DOCUMENT_ROOT'];

switch ($func) {
    case 'upload':
        upload_zip();
        break;
    case 'list_folders':
        create_list_folders();
        break;
    case 'execute':
        execute();
        break;
}

function upload_zip() {
    global $util, $htmlListFolders, $path_tmp, $path_system;
    if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['name'])) {

        if (!is_dir($path_tmp)) {
            mkdir($path_tmp, 0777);
        }

        copy($_FILES['arquivo']['tmp_name'], $path_tmp . "/" . $_FILES['arquivo']['name']);
        $zip = new ZipArchive;
        if ($zip->open($path_tmp . "/" . $_FILES['arquivo']['name']) === TRUE) {
            if (is_dir($path_tmp . "/" . date("Y_m_d"))) {
                $util->rrmdir($path_tmp . "/" . date("Y_m_d"));
            }
            mkdir($path_tmp . "/" . date("Y_m_d"), 0777);
            $zip->extractTo($path_tmp . "/" . date("Y_m_d"));
            $zip->close();
        }
        $htmlListFolders = "<div><h4>Deseja enviar os arquivos abaixo?</h4><div>";
        $htmlListFolders .= makeDirectoryTree($path_tmp . "/" . date("Y_m_d"));
        $htmlListFolders .= '<div><input type="submit" value="Confirmar" onclick="execute();" /></div>';
    } else {
        header('Location:/updater.php');
    }
}

function makeDirectoryTree($pathname) {
    $path = realpath($pathname);

    if (!is_dir($path)) {
        return "Path does not exist!";
    }

    $foldertree = new DOMDocument();

    /*
     * the rootelement of the tree 
     */
    $ul[""] = $foldertree->createElement('ul');
    $ul[""]->setAttribute('id', 'foldertree_root');
    $foldertree->appendChild($ul[""]);

    /*
     * Files in rootfolder
     * if not iterated separately, these files will appear alphabetically between the folders
     * instead of on top of the list
     *
     */
    $iterator = new DirectoryIterator($path);
    foreach ($iterator as $fileinfo) {
        if ($fileinfo->isFile()) {
            /*
             * the random id could be useful if you want to manipulate an element with JS
             * for instance to 'open' or 'close' the folders
             * also, add an optional classname to files and folders, so you can
             * do some markup with CSS, for instance:
             * .folder {color: #f00; list-style-image: url('path/to/images/folder.png');}
             * .file {color: #999; list-style-image: url('path/to/images/file.png');}
             */
            $random_id = md5(microtime());
            $li_element = $foldertree->createElement('li', $fileinfo->getFilename());
            $li_element->setAttribute('id', 'li_' . str_ireplace(' ', '', $random_id));
            $li_element->setAttribute('class', 'file'); //optional classname
            $ul[""]->appendChild($li_element);
        }
    }

    /*
     * iterate through the other folders
     */
    $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);

    foreach ($objects as $name => $value) {
        if ($value->isDir()) {
            $relative_path = str_ireplace($path . DIRECTORY_SEPARATOR, "", $value->getPathname());
            $path_array = explode(DIRECTORY_SEPARATOR, $relative_path);

            $new_dir = array_pop($path_array);
            $directory_up = implode(DIRECTORY_SEPARATOR, $path_array);

            $random_id = md5(microtime());

            $li[$relative_path] = $foldertree->createElement('li', $new_dir);
            $li[$relative_path]->setAttribute('id', 'li_' . str_ireplace(' ', '', $random_id));
            $li[$relative_path]->setAttribute('class', 'folder'); //optional classname

            $ul[$relative_path] = $foldertree->createElement('ul');
            $ul[$relative_path]->setAttribute('id', 'ul_' . str_ireplace(' ', '', $random_id));

            $li[$relative_path]->appendChild($ul[$relative_path]);
            $ul[$directory_up]->appendChild($li[$relative_path]);

            $iterator = new DirectoryIterator($value->getPathname());
            foreach ($iterator as $fileinfo) {
                if ($fileinfo->isFile()) {
                    $random_id = md5(microtime());
                    $li_element = $foldertree->createElement('li', $fileinfo->getFilename());
                    $li_element->setAttribute('id', 'li_' . str_ireplace(' ', '', $random_id));
                    $li_element->setAttribute('class', 'file'); //optional classname
                    $ul[$relative_path]->appendChild($li_element);
                }
            }
        }
    }

    return $foldertree->saveHTML();
}

function execute() {
    global $path_tmp, $util, $path_system;
    $arrFolders = scandir($path_tmp . "/" . date("Y_m_d"));
    foreach ($arrFolders as $folders) {
        if ($folders != '.' && $folders != '..') {
            if (is_dir($path_tmp . "/" . date("Y_m_d") . '/' . $folders))
                $util->copyr($path_tmp . "/" . date("Y_m_d") . "/" . $folders, $path_system . "/" . $folders);
            else
                copy($path_tmp . "/" . date("Y_m_d") . "/" . $folders, $path_system . "/" . $folders);
        }
    }
    $util->rrmdir($path_tmp);
    echo "success";
    die;
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="/files/css/uploader.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="/files/js/updater.js"></script>
    </head>

    <body>
        <div id="content">
            <div>
                <span><h2><center>CLARUS IN</center></h2></span>
                <span><h4>Módulo de upload de arquivos</h4></span>
            </div>
            <div id="content_form">
                <form action="updater.php?func=upload" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div>
                            <label>Arquivo:</label>
                            <input type="file" name="arquivo" id="arquivo" />
                        </div>
                        <div>
                            <input type="submit" value="enviar" />
                        </div>
                    </fieldset>
                </form>
            </div>
            <div>
                <?php echo $htmlListFolders; ?>
            </div>
        </div>
    </body>
</html>
