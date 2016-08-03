<?php
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';           

$html_content = scraperwiki::scrape("http://www.marctracker.com/PublicView/location.jsp");
$html = str_get_html($html_content);
$train_status = array();

 foreach ($html->find("area") as $el) { 
    $a =  $el->title;
    if (strpos($a,'Train') !== false) {
        echo $a . "\n";
        $train_status[] = $a;
    }         
}

scraperwiki::save_sqlite($unique_keys = array(), $train_status);

?>
