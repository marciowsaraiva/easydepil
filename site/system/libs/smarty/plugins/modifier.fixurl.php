<?php

function smarty_modifier_fixurl($string) {
  if(class_exists('util'))
    return util::fixUrl($string);
  else
    return $string;
}

?>