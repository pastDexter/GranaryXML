<?php
class GranaryXMLElement extends GranaryXMLNode {

  public function __get($name)
  {
    if ($this->attrExists($name)) {
      return $this->xml->{$name};
    } elseif($this->attrExists($name.'Id') && $this->db->tableExists(GranaryXML::pluralize($name))) {
      $table = $this->db->{GranaryXML::pluralize($name)};
      return $table->find($this->{$name.'Id'});
    }
    return null;
  }

  public function attrExists($name) {
    return isset($this->xml->{$name});
  }

}
?>
