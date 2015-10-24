<?php

class GranaryXMLTest extends PHPUnit_Framework_TestCase {

  public function testLoadFromFileInitializesDB() {
    $db = GranaryXML::loadFromFile(__DIR__.'/fixtures/data.xml');
    $this->assertInstanceOf("GranaryXMLDatabase", $db);
  }

  public function testLoadFromFileNoFile() {
    $db = GranaryXML::loadFromFile(__DIR__.'wrong-file.xml');
    $this->assertNull($db);
  }

  // public function testTableExists() {
  //   $db = GranaryXML::loadFromFile(__DIR__.'/fixtures/data.xml');
  //   $this->assertEquals(true, $db->tableExists('movies'));
  //   $this->assertEquals(false, $db->tableExists('movie'));
  //   $this->assertEquals(false, $db->tableExists('users'));
  // }

  public function testPluralize() {
    $this->assertEquals('cats', GranaryXML::pluralize('cat'));
    $this->assertEquals('buses', GranaryXML::pluralize('bus'));
    $this->assertEquals('categories', GranaryXML::pluralize('category'));
  }

  public function testSingularize() {
    $this->assertEquals('cat', GranaryXML::singularize('cats'));
    $this->assertEquals('bus', GranaryXML::singularize('buses'));
    $this->assertEquals('category', GranaryXML::singularize('categories'));
  }

}

?>
