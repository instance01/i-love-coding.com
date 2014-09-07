<?php
ob_start("ob_gzhandler");
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="InstanceLabs">
<meta name="description" content="I love coding, programming, development, everything">
<title>I LOVE CODING</title>

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="s/css/semantic.min.css">
<link rel="stylesheet" type="text/css" href="index.css">
<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="s/javascript/s.js"></script>
<script type="text/javascript" src="s/javascript/jquery.address.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	if(document.cookie.length > 1){
		$('body').css('background-color', '#FFF');
	}

	$('a.coding').click(function(e) {
		$('body').css('background-color', '#FFF');
		document.cookie = "clicked";
		
		$.ajax({
			url: "add.php?u=" + $('#u').val(),
			success: function(data){
				location.reload();
				$('.content').html(data);
			}
		}); 
	});

	document.title = "_";
	var i = 0;
	var str = 'I LOVE CODING';
	var interval;
	interval = setInterval(function(){
		var title = document.title;
		if(i < str.length){
			title = title.substr(0, title.length - 1);
			if(str.charAt(i) == ' '){
				title += '\u00A0';
			}
			title += str.charAt(i) + "_";
			i++;
			document.title = title;
		} else {
			document.title = "_";
			setInterval(function(){
				var title = document.title;
				if(i > str.length - 1){
					document.title = (title == str ? "I LOVE CODING_" : str);
				} else {
					if(str.charAt(i) == ' '){
						title += '\u00A0';
					}
					title += str.charAt(i) + "_";
					i++;
					document.title = title;
				}
			}, 700);
			clearInterval(interval);
		}
	}, 150);

});

</script>

</head>
<body>

<center>
<?php
if (!isset($_SESSION['visited']))
{
	echo('<div class="ui action input"><input placeholder="Username" type="text" id="u"><a href="#" class="ui black button coding">I Love Coding</a></div></div>');
}
?>
</center>

<h3>Persons who love coding</h3>
<div class="content">
<?php
$file;
if(file_exists("likes.txt") && filesize("likes.txt") > 0){
	$file = fopen("likes.txt", "r+");
	$content = fread($file, filesize("likes.txt"));
	echo($content);
	fclose($file);
}


?> 
</div>

</body>
</html>