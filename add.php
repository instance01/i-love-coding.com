<?php
$file;
if(file_exists("likes.txt") && filesize("likes.txt") > 0){
	$file = fopen("likes.txt", "r+");
	$content = fread($file, filesize("likes.txt"));
	fclose($file);
	$content++;
	$txt = $content;
	echo($txt);
	$file = fopen("likes.txt", "w");
	fwrite($file, $txt);
	fclose($file);
}else{
	// This won't work on my hoster, I need to create the file and give enough file permissions (777) for the script to work.
	$file = fopen("likes.txt", "w");
	fwrite($file, "1");
	fclose($file);
	echo("1");
}

?> 