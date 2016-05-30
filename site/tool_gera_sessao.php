<?php
//phpinfo();die;

echo dirname(__FILE__);
$zip = new ZipArchive();
$filename = dirname(__FILE__).'/foto.jpg';
//$filename = '/foto.jpg';

if ($zip->open('teste.zip', ZipArchive::CREATE) !== TRUE) {
   exit("cannot open \n");
}
$zip->addFile('foto.jpg');        
$zip->close();
echo "<br>$filename<br>fim!<br><img src='$filename'>";

//$zip = new ZipArchive();
//$filename = "./test112.zip";
//
//if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
//    exit("cannot open <$filename>\n");
//}
//
//$zip->addFromString("testfilephp.txt" . time(), "#1 This is a test string added as testfilephp.txt.\n");
//$zip->addFromString("testfilephp2.txt" . time(), "#2 This is a test string added as testfilephp2.txt.\n");
//$zip->addFile($thisdir . "/too.php","/testfromfile.php");
//echo "numfiles: " . $zip->numFiles . "\n";
//echo "status:" . $zip->status . "\n";
//$zip->close();

?>