<?php

class GranaryXMLSet extends GranaryXMLNode implements ArrayAccess
{

  // count

  // []

  // find

  // where

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
