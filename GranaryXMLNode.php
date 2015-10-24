<?php
abstract class GranaryXMLNode {

  protected $db;
  protected $xml;

  function __construct($xml, $db = null) {
    $this->xml = $xml;
    $this->db = $db;
  }

  protected function wrapElement($xmlElem)
  {
    if(is_a($xmlElem, 'SimpleXMLElement')) {
      return new GranaryXMLElement($xmlElem, $this->db);
    }
    return $xmlElem;
  }
  
}
 ?>
