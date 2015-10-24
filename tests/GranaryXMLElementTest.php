<?php

class GranaryXMLElementTest extends PHPUnit_Framework_TestCase {

  protected static $db;

  public static function setUpBeforeClass() {
      self::$db = GranaryXML::loadFromFile(__DIR__.'/fixtures/data.xml');
  }

  public static function tearDownAfterClass() {
      self::$db = NULL;
  }

  // public function testAccessAttributes() {
  //   $this->assertEquals()
  // }

}

?>
