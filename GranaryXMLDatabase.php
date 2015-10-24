<?php

class GranaryXMLDatabase extends GranaryXMLNode
{

  public function __get($name)
  {
    if ($this->tableExists($name)) {
      return new GranaryXMLSet($this->xml->{$name}, $this);
    }
    return null;
  }

  public function tableExists($name) {
    return isset($this->xml->{$name});
  }

}

 ?>
