<?php

$wcg_url='http://example.com';

$r=@explode('/',$_SERVER['REQUEST_URI']);
$wcg_gallery=array_pop($r);
$wcg_gallery=str_replace('.','',$wcg_gallery);
$wcg_gallery=str_replace('/','',$wcg_gallery);
$wcg_gallery=str_replace("\\",'',$wcg_gallery);
$wcg_gallery=str_replace(' ','',$wcg_gallery);
$wcg_gallery=str_replace('%','',$wcg_gallery);
$wcg_gallery=addslashes($wcg_gallery);
@include('wcg_gallery.php');
$wcg_content = str_replace('src="','src="'.$wcg_url.'/',$wcg_content);
echo $wcg_content;

?>
