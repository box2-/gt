<?php
require_once(dirname(__FILE__) . '/db.php');

/* CURL SOME PAGE */
/*
$useragent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11';
$url = 'http://store.steampowered.com/app/28050/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);

$html = curl_exec($ch);

if (!$html)
{
  echo "ERROR NUMBER: ".curl_errno($ch);
  echo "ERROR: ".curl_error($ch);
  exit;
} else {
  $fp = fopen("example_steam.html", "w");
  fwrite($fp, $html);
}

curl_close($ch);
fclose($fp);
 */


/* PARSE SOME THINGS */
$doc = new DOMDOcument();
$doc->loadHTMLFile("example_steam.html");

$xpath = new DOMXpath($doc);

// pull all tags with an id to verify parsing
$elements = $xpath->query("//*[@id]");

if (!is_null($elements)) {
  foreach ($elements as $element) {
    echo "<br/>[". $element->nodeName. "]";

    $nodes = $element->childNodes;
    foreach ($nodes as $node) {
      echo $node->nodeValue. "\n";
    }
  }
}

?>
