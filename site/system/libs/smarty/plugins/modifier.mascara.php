<?php

function smarty_modifier_mascara($string, $mascara) {
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