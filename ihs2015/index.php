<html>
<head>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/ui-lightness/jquery-ui.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script src="lightbox.js"></script>
	<link rel="stylesheet" href="lightbox.css">
	<style type="text/css">
	/* =============================================================================
   HTML5 Boilerplate CSS: h5bp.com/css
   ========================================================================== */

article, aside, details, figcaption, figure, footer, header, hgroup, nav, section { display: block; }
audio, canvas, video { display: inline-block; *display: inline; *zoom: 1; }
audio:not([controls]) { display: none; }
[hidden] { display: none; }

html { font-size: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
html, button, input, select, textarea { font-family: sans-serif; color: #222; }
body { margin: 0; font-size: 1em; line-height: 1.4; background-image:url('noisy.gif'); background-repeat:repeat;}

::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
::selection { background: #fe57a1; color: #fff; text-shadow: none; }

a { color: #00e; text-decoration:none; }
a:visited { color: #551a8b; }
a:hover { color: #06e; }
a:focus { outline: thin dotted; }
a:hover, a:active { outline: 0; }

abbr[title] { border-bottom: 1px dotted; }
b, strong { font-weight: bold; }
blockquote { margin: 1em 40px; }
dfn { font-style: italic; }
hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
ins { background: #ff9; color: #000; text-decoration: none; }
mark { background: #ff0; color: #000; font-style: italic; font-weight: bold; }
pre, code, kbd, samp { font-family: monospace, serif; _font-family: 'courier new', monospace; font-size: 1em; }
pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; }
q { quotes: none; }
q:before, q:after { content: ""; content: none; }
small { font-size: 85%; }

sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
sup { top: -0.5em; }
sub { bottom: -0.25em; }

ul, ol { margin: 1em 0; padding: 0 0 0 40px; }
dd { margin: 0 0 0 40px; }
nav ul, nav ol { list-style: none; list-style-image: none; margin: 0; padding: 0; }

img { border: 0; -ms-interpolation-mode: bicubic; vertical-align: middle; }

svg:not(:root) { overflow: hidden; }

figure { margin: 0; }

form { margin: 0; }
fieldset { border: 0; margin: 0; padding: 0; }
label { cursor: pointer; }
legend { border: 0; *margin-left: -7px; padding: 0; white-space: normal; }
button, input, select, textarea { font-size: 100%; margin: 0; vertical-align: baseline; *vertical-align: middle; }
button, input { line-height: normal; }
button, input[type="button"], input[type="reset"], input[type="submit"] { cursor: pointer; -webkit-appearance: button; *overflow: visible; }
button[disabled], input[disabled] { cursor: default; }
input[type="checkbox"], input[type="radio"] { box-sizing: border-box; padding: 0; *width: 13px; *height: 13px; }
input[type="search"] { -webkit-appearance: textfield; -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box; }
input[type="search"]::-webkit-search-decoration, input[type="search"]::-webkit-search-cancel-button { -webkit-appearance: none; }
button::-moz-focus-inner, input::-moz-focus-inner { border: 0; padding: 0; }
textarea { overflow: auto; vertical-align: top; resize: vertical; }
input:valid, textarea:valid {  }
input:invalid, textarea:invalid { background-color: #f0dddd; }

table { border-collapse: collapse; border-spacing: 0; }
td { vertical-align: top; }

.chromeframe { margin: 0.2em 0; background: #ccc; color: black; padding: 0.2em 0; }
.ir { display: block; border: 0; text-indent: -999em; overflow: hidden; background-color: transparent; background-repeat: no-repeat; text-align: left; direction: ltr; *line-height: 0; }
.ir br { display: none; }
.hidden { display: none !important; visibility: hidden; }
.visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }
.visuallyhidden.focusable:active, .visuallyhidden.focusable:focus { clip: auto; height: auto; margin: 0; overflow: visible; position: static; width: auto; }
.invisible { visibility: hidden; }
.clearfix:before, .clearfix:after { content: ""; display: table; }
.clearfix:after { clear: both; }
.clearfix { *zoom: 1; }
	html, body{
		width:100%;
		height:100%;
		overflow:hidden;
		background-image:url('http://sheac.me/css/noisy.gif');
		background-repeat:repeat;
	}
	div.shirt{
		width:49%;
		float:left;
		padding:0;
		margin:-2px;
		border:1px solid gray;
		margin-bottom:-1.6em;
	}
	img.shirt{
		width:100%;
	}
	div.voteButton{
		position:relative;
		bottom:2.5em;
		z-index:105;
		height:25px;
		text-align:center;
	}
	div.voteButtonInner{
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border-radius: 7px; /* future proofing */
		-khtml-border-radius: 7px; /* for old Konqueror browsers */
		border:5px solid #0284C9;
		display:inline;
		padding-left:5px;
		padding-right:5px;
		background-color:#D7ECF7;
		font-family:Impact;
		font-size:150%;
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		-o-transition: all 0.5s ease;
		-ms-transition: all 0.5s ease;
		transition: all 0.5s ease;
		-webkit-box-shadow: 0px 0px 20px rgba(50, 50, 50, 0.75);
		-moz-box-shadow:    0px 0px 20px rgba(50, 50, 50, 0.75);
		box-shadow:         0px 0px 20px rgba(50, 50, 50, 0.75);
		text-shadow: 1 1px 1px #FFF;
	}
	div.voteButtonInner:hover{
		border:5px solid #E89C20;
		background-color:#EBD5B2;
		-webkit-box-shadow: 0px 5px 20px rgba(50, 50, 50, 0.75);
		-moz-box-shadow:    0px 5px 20px rgba(50, 50, 50, 0.75);
		box-shadow:         0px 5px 20px rgba(50, 50, 50, 0.75);
	}
	#main{
		width:100%
		height:69%;
		overflow:scroll;
	}
	#banner{
		width:auto;
		height:29%;
		#background-color:skyblue;
		z-index:200;
		padding:20px;
		font-family: Verdana, Geneva, sans-serif;
		font-size:1.2em;
		margin-bottom:20px;
		overflow:hidden;
	}
	#low{
		width:100%;
		border-top:1px solid black;
		padding-top:5px;
		margin-top:5px;
	}
	#directions{
		float:left;
		width:65%;
	}
	#left{
		float:right;
		width:35%;
	}
	</style>
</head>

<body>

	<div id="banner">
	<h1>Welcome</h1>
	Welcome to the IHS Class of 2015's Facebook app! We're currently working on a bunch of new features for it. By sophomore year, you'll be able to use it for getting notifications about when homework is due, getting help with homework, and voting on Sophomore class matters.
	Right now, you can use it to cast your vote on which design you want to be used on our class shirt (which will be available to buy soon after school starts).
		<div id="low">
			<div id="directions">
			 <h2>Directions</h2>
			 <b>1)</b> Pick your top three favorite shirt designs by clicking the "VOTE FOR THIS SHIRT" button on their pictures.<br>
			 <b>2)</b> Scroll to the bottom and hit "SUBMIT MY VOTE".<br>
			 <b>3)</b> Click accept on both Facebook permission request pages. (this is a one-time thing, and you'll be able to use the app forever without having to do it again).<br>
	 		 And voila! You've submitted your vote!
	 		</div>
	 		<div id="left">
	 		<h3>
	 		<span>You've picked</span><br>
	 		<span><span id="qwe">0</span>/3</span><br>
	 		<span>shirts</span>
	 		</h3>
	 		</div>
	 	</div>
	</div>
	
	<div id="main">
	<?php
	require_once('functions.php');
	require_once('main.php');
	?>
	<div class="clearfix"></div>
	</div>
	
	<script>
	</script>
</body>

</html>