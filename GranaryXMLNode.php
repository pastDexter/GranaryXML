<?php
abstract class GranaryXMLNode {

  protected $db;
  protected $xml;

  function __construct($xml, $db = null) {
    $this->xml = $xml;
    $this->db = $db;
  }
}
 ?>
