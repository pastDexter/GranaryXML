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
    $this->assertEquals(3, self::$set->count());
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
    $this->assertEquals(3, $count);
  }

  public function testFind() {
    $movie = self::$set->find(1);
    $this->assertInstanceOf('GranaryXMLElement', $movie);
    $this->assertEquals("Bar", $movie->name);
  }

  public function testFindNonElement() {
    $this->assertNull(self::$set->find(99));
  }

  public function testWhere() {
    $movies = self::$set->where("rating>=4");
    $this->assertTrue(is_array($movies));
    $this->assertEquals(2, count($movies));
    $this->assertInstanceOf('GranaryXMLElement', $movies[0]);
  }

}

?>
