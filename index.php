<?php ob_start("ob_gzhandler"); ?>
<?php
include("config.php");

// for the blog later
// connect();

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
	$('.main.menu').fadeOut(0);

	$('.main.menu .item').tab();
	$('a.red').click(function(e) {
		$('.main.menu .item').tab('change tab', 'home');
	});
	$('a.blue').click(function(e) {
		$('.main.menu .item').tab('change tab', 'blog');
	});

	if(document.cookie.length > 1){
		$('.main.menu').fadeIn(0);
		$('body').css('background-color', '#FFF');
	}

	$('a.coding').click(function(e) {
		$('.main.menu').fadeIn(1000);
		$('body').css('background-color', '#FFF');
		document.cookie = "clicked";
		
		$.ajax({
			url: "add.php",
			success: function(data){
				$('.coding').html(data);
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

<div class="ui pointing secondary main menu">
  <a class="active red item" data-tab="home">Home</a>
  <a class="blue item" data-tab="blog">Blog</a>
</div>
<div class="ui active tab" data-tab="home">
	<center>
		<div class="content">
		<a href="#" class="coding">
		 I Love Coding
		</a>
		</div>
    </center>
</div>

<div class="ui tab" data-tab="blog">
Working on it.
</div>


</body>
</html>