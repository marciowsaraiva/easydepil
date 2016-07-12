<?php

use Aws\S3\S3Client;

/**
 * Sync Storage To AWS S3
 * @name StorageToAWSS3
 * @version 201511121330
 * @author Helio de Paula Nogueira <helio.nogueira@industriafox.com>
 */
class StorageToAWSS3 {

  private $client = null;
  private $storage = null;
  private $ignoreFolder = null;
  private $datestart = 0;
  private $dateend = 0;

  public function run() {
    global $CFG;
    $this->storage = $CFG->root . DIRECTORY_SEPARATOR . $CFG->cron->storageName;
    $this->ignoreFolder = '#(' . implode('}|(', $CFG->cron->ignoreFolder) . ')#i';
    if (is_dir($this->storage)) {
      if ($this->makeSDK()) {
        $this->makeArgs();
        $this->syncStorageFiles($this->storage);
      }
    }
    return null;
  }

  private function makeArgs() {
    global $CFG;
    // Start
    if (isset($CFG->args['datestart']) && strtotime($CFG->args['datestart'])) {
      $this->datestart = strtotime($CFG->args['datestart']);
    }
    // End
    if (isset($CFG->args['dateend']) && strtotime($CFG->args['dateend'])) {
      $this->dateend = strtotime($CFG->args['dateend']);
    }
  }

  private function syncStorageFiles($DirName) {
    if (!empty($DirName) && is_dir($DirName) && !preg_match($this->ignoreFolder, $DirName)) {
      foreach (new DirectoryIterator($DirName) as $fileInfo) {
        if (!$fileInfo->isDot()) {
          if ($fileInfo->isFile()) {
            if (!$this->datestart || ($fileInfo->getMTime() >= $this->datestart)) {
              if (!$this->dateend || ($fileInfo->getMTime() <= $this->dateend)) {
                $this->syncFile($fileInfo);
              }
            }
          } else if ($fileInfo->isDir()) {
            $this->syncStorageFiles($fileInfo->getPathname());
          }
        }
      }
    }
    return null;
  }

  private function syncFile(DirectoryIterator $filedata) {
    global $CFG;
    $auth = false;
    if (!empty($filedata)) {
      $filestorage = preg_replace("#({$this->storage})#i", $CFG->cron->storageName, $filedata->getPathname());
      if (!empty($filestorage)) {
        $this->client->putObject(array(
          "Bucket" => $CFG->cron->credential->bucket,
          "Key" => $filestorage,
          "SourceFile" => $filedata->getPathname(),
          "ACL" => "public-read"
        ));
        if ($this->client->waitUntil('ObjectExists', array("Bucket" => $CFG->cron->credential->bucket, "Key" => $filestorage))) {
          $auth = $this->checkUpload($filestorage);
        }
      }
    }
    printInfo((($auth) ? "SUCESSO" : "ERROR") . ": " . Date('Y-m-d H:i:s', $filedata->getMTime()) . " | {$CFG->cron->credential->bucket} | {$filedata->getPathname()}", 1);
    return null;
  }

  private function checkUpload($filestorage) {
    global $CFG;
    $auth = false;
    if (!empty($filestorage)) {
      if ($info = $this->curl_info("{$CFG->cron->credential->url}/{$filestorage}")) {
        if (isset($info["http_code"])) {
          switch ($info["http_code"]) {
            case "200":
            case "302":
              $auth = true;
              break;
          }
        }
      }
    }
    return $auth;
  }

  private function curl_info($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    return $info;
  }

  private function makeSDK() {
    global $CFG;
    require_once $CFG->root
        . DIRECTORY_SEPARATOR . "system"
        . DIRECTORY_SEPARATOR . 'libs'
        . DIRECTORY_SEPARATOR . 'aws'
        . DIRECTORY_SEPARATOR . 'aws-autoloader.php';
    $this->client = S3Client::factory(array(
          'credentials' => array(
            'key' => $CFG->cron->credential->key,
            'secret' => $CFG->cron->credential->secret
    )));
    return ($this->client instanceof S3Client) ? true : false;
  }

}
