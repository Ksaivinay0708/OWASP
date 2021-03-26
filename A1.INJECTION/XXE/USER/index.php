<?php
// Uncomment the method, that you need to use

/*---------------------CREATE XML FROM DOM----------------
//Create XML-string and XML-document with DOM help
$dom = new DomDocument('1.0');
//Add root <books>
$books = $dom->appendChild($dom->createElement('books'));
//Add element <book> to <books>
$book = $books->appendChild($dom->createElement('book'));
// Add element <title> to <book>
$title = $book->appendChild($dom->createElement('title'));
// Add text node <title> to <title>
$title->appendChild($dom->createTextNode('Very Interesting Book'));
//Generate xml
$dom->formatOutput = true; // Set formatOutput attribute
                           // domDocument to true value
// save XML as string or file
$test1 = $dom->saveXML(); // pass string to test1
$dom->save('test1.xml'); // Save File
-------------------------------------------------------------*/


/*-----------------CREATE DOM FROM XML STRING----------------
$sxe = simplexml_load_string('<books><book><title>'.
                                    'Great American Novel</title></book></books>');
if ($sxe === false) {
  echo 'Error while parsing the document';
  exit;
}
$dom_sxe = dom_import_simplexml($sxe);
if (!$dom_sxe) {
  echo 'Error while converting XML';
  exit;
}

$dom = new DOMDocument('1.0');
$dom_sxe = $dom->importNode($dom_sxe, true);
$dom_sxe = $dom->appendChild($dom_sxe);

echo $dom->save('test2.xml');
-------------------------------------------------------------*/

/*--------------------DOM XML PARSING-------------------------*/
$doc = new DomDocument;

// Check the document before refer to ID
//$doc->validateOnParse = true;
$doc->preserveWhiteSpace = false;
$doc->Load('example.xml', LIBXML_PARSEHUGE);
//$is_valid_xml = $doc -> schemaValidate('http://localhost/test/schema.xsd'); // Schema validation

/* XPath block
$xpath = new DOMXPath($doc);
$query = '//all_obj/people_list/person/foo';
$entries = $xpath->query($query);
echo ($entries[0]->textContent);*/
/*foreach ($entries as $entry) {
  echo "Found {$entry->previousSibling->previousSibling->nodeValue}," . " by {$entry->previousSibling->nodeValue}\n";
}*/

/* Xinclude block
$doc->xinclude();
echo $doc->getElementsByTagName("footer")[0]->nodeValue;*/

echo "The element whose id is myelement is: " . $doc->getElementsByTagName("foo")[0]->nodeValue . "\n";
/*--------------------------------------------------------------*/

/*-------------------SIMPLE XML PARSING------------------------*/
//libxml_disable_entity_loader(false);
//$file = file_get_contents("example.xml");
//$xml = new SimpleXMLElement($file);
//$xml = simplexml_load_file("example.xml", null, LIBXML_PARSEHUGE | LIBXML_PEDANTIC);
//print_r($xml);
//var_dump($xml->people_list->person->foo);*/
/*-----------------------------------------------------------------*/


/*-----------------------DOM OVER XML-FILE---------------------------*/
/*libxml_disable_entity_loader (false);
$file = file_get_contents("php://input");
$dom = new DomDocument;
$dom -> loadXML($file, LIBXML_DTDLOAD | LIBXML_NOENT);
$book = simplexml_import_dom($dom);
$a = $book->id;
$b = $book->title;
echo "your book id is $a";*/
/*-------------------------------------------------------------------*/
?>
