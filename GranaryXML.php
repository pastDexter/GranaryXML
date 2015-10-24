<?php

class GranaryXML {

  public static function loadFromFile($file)
  {
    if(!file_exists($file)) {
      return null;
    }
    return new GranaryXMLDatabase(simplexml_load_file($file));
  }

  public static function pluralize($singular) {
    $last_letter = strtolower($singular[strlen($singular)-1]);
    switch($last_letter) {
        case 'y':
            return substr($singular,0,-1).'ies';
        case 's':
            return $singular.'es';
        default:
            return $singular.'s';
    }
  }

  public static function singularize($plural) {
    if (substr($plural, -3) == 'ies') {
      return substr($plural, 0, -3).'y';
    } elseif (substr($plural, -2) == 'es') {
      return substr($plural, 0, -2);
    } else {
      return substr($plural, 0, -1);
    }
  }

}

?>
