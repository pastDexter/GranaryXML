<?php

class GranaryXMLElementTest extends PHPUnit_Framework_TestCase {

  protected static $elem;

  public static function setUpBeforeClass() {
    self::$elem = GranaryXML::loadFromFile(__DIR__.'/fixtures/data.xml')->movies[0];
  }

  public static function tearDownAfterClass() {
    self::$elem = NULL;
  }

  public function testAccessAttribute() {
    $this->assertEquals(self::$elem->name, "Foo");
  }

  public function testAccessNonAttribute() {
    $this->assertNull(self::$elem->wrongAttr);
  }

  public function testAccessBelongsToRealtion() {
    $this->assertEquals('Romance', self::$elem->category->name);
  }

}

?>
