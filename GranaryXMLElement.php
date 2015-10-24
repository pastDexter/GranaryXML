<?php
class GranaryXMLElement extends GranaryXMLNode {

  // public function __get($name)
  // {
  //   if (isset($this->xml->{$name})) {
  //     return new GranaryXMLElement($this->xml->{$name});
  //   } elseif (isset($this->xml->{$name.'_id'})) {
  //     return "yeyID";
  //   }
  //   return null;
  // }
  //
  // public function __call($name, $arguments) {
  //   if (method_exists($this->xml, $name)) {
  //     return $this->wrapXML(call_user_func_array(array($this->xml, $name), $arguments));
  //   }
  //   return null;
  // }
  //
  // private function wrapXML($xmlElem)
  // {
  //   if(is_a($xmlElem, 'SimpleXMLElement')) {
  //     return new GranaryXMLElement($xmlElem);
  //   }
  //   return $xmlElem;
  // }

}
?>
