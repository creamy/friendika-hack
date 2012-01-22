<?php

if ((int)$wcg_keeper<1) $wcg_keeper=0;
$wcg_keeper++;

$convert = '/usr/local/bin/convert';

$wcg_repository='/www/html/photos/repository'; //absolute directory path
$wcg_www_repository='/photos/repository'; //absolute URL path
$wcg_url = 'http://example.com';

if (@file_exists($wcg_repository.'/'.$wcg_gallery)) {

//build thumbails if they haven't yet been generated. To refresh to cache, wipe out the axe directory in the repo directory.

if (!@file_exists($wcg_repository.'/'.$wcg_gallery.'/axe')) {
	@mkdir($wcg_repository.'/'.$wcg_gallery.'/axe');
	$wcg_files = scandir($wcg_repository.'/'.$wcg_gallery);
	foreach ($wcg_files as $wcg_v) {
		if (stristr($wcg_v,'jpg')) {
			system($convert.' -size 210x210 -scale 210x210 -quality 90 '.$wcg_repository.'/'.$wcg_gallery.'/'.$wcg_v.' '.$wcg_repository.'/'.$wcg_gallery.'/axe/'.$wcg_v);


		}
	}
}

$wcg_files = scandir($wcg_repository.'/'.$wcg_gallery.'/axe');

$wcg_content = '
<style class="text/css">.wcg_c'.$wcg_keeper.' { float:left;width:214px;height:214px;border:1px solid #fff;margin:5px;padding:1px;background-color:#000; } </style>
<div><div>'.(count($wcg_files)-2).' Photos &middot; <strong>Click on any photo to view larger size. &middot; <a href="'.$wcg_url.'/photos/g.php?g='.urlencode($wcg_gallery).'" target="_blank" style="color:#ff0000;">View images as Slideshow</a></strong></div>';


foreach ($wcg_files as $wcg_v) {
	if (stristr($wcg_v,'jpg')) {
		list($wcg_w,$wcg_h) = @getImageSize($wcg_repository.'/'.$wcg_gallery.'/axe/'.$wcg_v);
		$wcg_pad_w=intval((210-$wcg_w)/2); //center image in the box
		$wcg_pad_h=intval((210-$wcg_h)/2);

		$link=$wcg_url.'/g.php?g='.urlencode($wcg_gallery);

		$wcg_content .= '<div class="wcg_c'.$wcg_keeper.'"><a href="'.$link.'" target="_blank"><img src="'.$wcg_www_repository.'/'.$wcg_gallery.'/axe/'.$wcg_v.'" alt="'.$wcg_v.'" border="0" style="margin-left:'.$wcg_pad_w.'px;margin-top:'.$wcg_pad_h.'px;padding:0;border:0;"/></a></div>';
	}
}
$wcg_content .= '</div><br clear="all" />';

}

?>
