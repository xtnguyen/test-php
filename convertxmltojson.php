<?

function json_prepare_xml($domNode) {
  foreach($domNode->childNodes as $node) {
    if($node->hasChildNodes()) {
      json_prepare_xml($node);
    } else {
      if($domNode->hasAttributes() && strlen($domNode->nodeValue)){
         $domNode->setAttribute("nodeValue", $node->textContent);
         $node->nodeValue = "";
      }
    }
  }
}  

$xml = simplexml_load_file("config_firebase.xml");
echo json_prepare_xml($xml);