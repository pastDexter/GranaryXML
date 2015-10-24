<?php

class GranaryXMLDatabseTest extends PHPUnit_Framework_TestCase {

  protected static $db;

  public static function setUpBeforeClass() {
    self::$db = GranaryXML::loadFromFile(__DIR__.'/fixtures/data.xml');
  }

  public static function tearDownAfterClass() {
    self::$db = NULL;
  }

  public function testAccessTableAsSet() {
    $this->assertInstanceOf('GranaryXMLSet', self::$db->movies);
  }

  public function testAccessNonExisitngTable() {
    $this->assertNull(self::$db->users);
  }

  public function testTableExists() {
    $this->assertTrue(self::$db->tableExists('movies'));
    $this->assertFalse(self::$db->tableExists('users'));
  }

}

?>
