<?php
class GranaryXMLElement extends GranaryXMLNode {

  public function __get($name)
  {
    if ($this->attrExists($name)) {
      return $this->xml->{$name};
    } elseif($this->attrExists($name.'Id') && $this->db->tableExists(GranaryXML::pluralize($name))) {
      return $this->db->{GranaryXML::pluralize($name)}[$this->{$name.'Id'}];
    }
    return null;
  }

  // public function __call($name, $arguments) {
  //   if (method_exists($this->xml, $name)) {
  //     return $this->wrapXML(call_user_func_array(array($this->xml, $name), $arguments));
  //   }
  //   return null;
  // }

  public function attrExists($name) {
    return isset($this->xml->{$name});
  }

  private function wrapElement($xmlElem)
  {
    if(is_a($xmlElem, 'SimpleXMLElement')) {
      return new GranaryXMLElement($xmlElem, $this->db);
    }
    return $xmlElem;
  }

}
?>
