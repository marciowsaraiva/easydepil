<?php

// COMMAND: php -q site/cron.php --auth=ksh4242ldj --datestart=2015-11-12T00:00:00 --dateend=2015-11-12T23:59:59
// Autoload
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';

global $CFG;
$CFG = new stdClass();
$CFG->args = array();
$CFG->auth = 'ksh4242ldj';
$CFG->root = dirname(__FILE__);

/**
 * Print trance on screen
 * @name printInfo
 * @param string $text
 * @param int $nivel
 * @return null
 */
function printInfo($text, $nivel = 0) {
  if (!empty($text)) {
    $space = null;
    if ($nivel) {
      $space = implode(array_fill(0, ($nivel * 4), " "));
    }
    vprintf("%s-- %s" . PHP_EOL, array($space, $text));
  }
  return null;
}

/**
 * Format ARGS
 * @name makeArgs
 * @return bool
 */
function makeArgs(Array $argv) {
  global $CFG;
  $auth = false;
  $pattern = "/^(--)(.*)\=(.*)$/";
  foreach ($argv as $param) {
    if (preg_match($pattern, $param)) {
      $CFG->args[preg_replace($pattern, '$2', $param)] = preg_replace($pattern, '$3', $param);
    }
  }
  if ($CFG->args['auth'] == $CFG->auth) {
    $auth = true;
  }
  return $auth;
}

if (makeArgs($argv)) {
  // Sync AWS S3
  printInfo("INICIO DA SINCRONIZACAO DO STORAGE COM A AWS S3 " . Date("Y-m-d H:i:s"));
  global $CFG;
  $CFG->cron = new stdClass();
  $CFG->cron->storageName = 'storage';
  $CFG->cron->ignoreFolder = array($CFG->cron->storageName . DIRECTORY_SEPARATOR . 'tmp');
  $CFG->cron->credential = new stdClass();
  $CFG->cron->credential->url = S3_URL;
  $CFG->cron->credential->key = S3_KEY;
  $CFG->cron->credential->secret = S3_SECRET;
  $CFG->cron->credential->bucket = S3_BUCKET;
  require_once $CFG->root
      . DIRECTORY_SEPARATOR . "system"
      . DIRECTORY_SEPARATOR . 'helpers'
      . DIRECTORY_SEPARATOR . 'sync'
      . DIRECTORY_SEPARATOR . 'StorageToAWSS3.class.php';
  $awss3 = new StorageToAWSS3();
  $awss3->run();
  printInfo("TERMINO DA SINCRONIZACAO DO STORAGE COM A AWS S3 " . Date("Y-m-d H:i:s"));
  // Sync AWS S3
}
