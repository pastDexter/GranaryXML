# GranaryXML
Simple static XML data mapper with relations support

# Example

    <example>
      <categories>
        <category>
          <id>0</id>
          <name>Romance</name>
        </category>
        <category>
          <id>1</id>
          <name>Horror</name>
        </category>
      </categories>
    
      <movies>
        <movie>
          <id>0</id>
          <name>Foo</name>
          <categoryId>0</categoryId>
          <rating>4</rating>
        </movie>
        <movie>
          <id>1</id>
          <name>Bar</name>
          <categoryId>1</categoryId>
          <rating>5</rating>
        </movie>
      </movies>
    </example>

## Initialize database

    $db = GranaryXML::loadFromFile('data.xml');
    
## Attributes and relations access

    $db->movies->count()                // 2
    $db->movies[0]->name                // 'Foo'
    $db->movies[1]->category->name      // 'Horror'
    
## Finding and querying

    $db->categories->find(1)->name      // 'Horror'
    $db->movies->where("ratings>4")     // [ GranaryXMLElement([id] => 1 ...) ]
    $db->movies->where("name='Foo'")[0] // GranaryXMLElement([id] => 0 ...)

# Tests
To run the tests you need to install `PHPUnit` and the run the following command: 

    $> phpunit --bootstrap tests/autoload.php tests
