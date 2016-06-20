<?php
	$url = $_SERVER['REQUEST_URI'];
	$url = explode('/admin',$url);
	define('WEBROOT',$url[0].'/');

