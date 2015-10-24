<?php

class GranaryXMLSetTest extends PHPUnit_Framework_TestCase {

  protected static $set;

  public static function setUpBeforeClass() {
      self::$set = GranaryXML::loadFromFile(__DIR__.'/fixtures/data.xml')->movies;
  }

  public static function tearDownAfterClass() {
      self::$set = NULL;
  }

  public function testCount() {
    $this->assertEquals(2, self::$set->count());
  }

  public function testArrayAccess() {
    $this->assertInstanceOf('GranaryXMLElement', self::$set[0]);
  }

  public function testTraversable() {
    $count = 0;
    foreach (self::$set as $movie) {
      $count++;
      $this->assertInstanceOf('GranaryXMLElement', $movie);
    }
    $this->assertEquals(2, $count);
  }

}

?>
