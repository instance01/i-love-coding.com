<?php
session_start();
$filename = "likes.txt";
if(!isset($_GET['u'])){
	return;
}

$file;
if(file_exists($filename) && filesize($filename) > 0){
	$file = fopen($filename, "r+");
	$content = fread($file, filesize($filename));
	fclose($file);
	if(strlen($_GET['u']) > 1 && strrpos($content, $_GET['u']) === FALSE){
		$content .= ", ".$_GET['u'];
		$_SESSION['visited'] = "true";
	}
	$txt = $content;
	echo($txt);
	$file = fopen($filename, "w");
	fwrite($file, $txt);
	fclose($file);
}else{
	// This won't work on my hoster, I need to create the file and give enough file permissions (777) for the script to work.
	$file = fopen($filename, "w");
	fwrite($file, "instance");
	fclose($file);
	echo("instance");
}

?> 