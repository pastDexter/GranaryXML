<?php

class DB {

  public static $root;

  public static function load_file($fileName)
  {
    self::$root = new DBNode(simplexml_load_file($fileName));
  }

  public static function table_exists($name) {
    return !is_null(self::$root->{self::pluralize($name)});
  }

  private static function pluralize($singular) {
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

}

class DBNode  implements ArrayAccess {

  private $xml;

  function __construct($xmlElem) {
    $this->xml = $xmlElem;
  }

  public function __get($name)
  {
    if (isset($this->xml->{$name})) {
      return new DBNode($this->xml->{$name});
    } elseif (isset($this->xml->{$name.'_id'})) {
      return "yeyID";
    }
    return null;
  }

  public function __call($name, $arguments) {
    if (method_exists($this->xml, $name)) {
      return $this->wrapXML(call_user_func_array(array($this->xml, $name), $arguments));
    }
    return null;
  }

  private function wrapXML($xmlElem)
  {
    if(is_a($xmlElem, 'SimpleXMLElement')) {
      return new DBNode($xmlElem);
    }
    return $xmlElem;
  }


// ARRAY INTERFACE

  public function offsetSet($offset,$value) {
      if (is_null($offset)) {
          $this->xml[] = $value;
      } else {
          $this->xml[$offset] = $value;
      }
  }

  public function offsetExists($offset) {
      return isset($this->xml[$offset]);
  }

  public function offsetUnset($offset) {
      if ($this->offsetExists($offset)) {
          unset($this->xml[$offset]);
      }
  }

  public function offsetGet($offset) {
      return $this->offsetExists($offset) ? $this->wrapXML($this->xml[$offset]) : null;
  }

}

?>
