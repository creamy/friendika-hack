<?php

$wcg_gallery = addslashes($_REQUEST['g']);

Header("Content-type: text/xml");

$xml = @join('',@file('gallery.xml'));
$images = '';

$wcg_repository='/www/html/photos/repository'; //absolute path
$wcg_www_repository='/photos/repository'; //web URL

if (@file_exists($wcg_repository.'/'.$wcg_gallery)) {

$wcg_files = scandir($wcg_repository.'/'.$wcg_gallery);

foreach ($wcg_files as $wcg_v) {
	if (stristr($wcg_v,'jpg')) {
		list($wcg_w,$wcg_h) = @getImageSize($wcg_repository.'/'.$wcg_gallery.'/'.$wcg_v);

$images .= '
<image>
   <url>'.$wcg_www_repository.'/'.$wcg_gallery.'/'.$wcg_v.'</url>
<caption></caption>
   <width>'.$wcg_w.'</width>
   <height>'.$wcg_h.'</height>
</image>
';

	}
}


$xml = str_replace('<!--GALLERY-->',$images,$xml);

Header("Content-Length: ".strlen($xml));
echo $xml;



}
@mysql_close($conn);

?>
