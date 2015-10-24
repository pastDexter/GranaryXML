<?php
abstract class GranaryXMLNode {

  protected $root;
  protected $xml;

  function __construct($xml, $root = null) {
    $this->xml = $xml;
    $this->root = $root;
  }
}
 ?>
