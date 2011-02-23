<!DOCTYPE HTML>
<html lang="en">
<head>
  <link rel="stylesheet" href="/portfolioofc/css/mobile.css" media="only screen and (max-width: 480px)">
    <link rel="stylesheet" href="/portfolioofc/css/global.css" media="screen and (min-width: 481px)" />

    <!--[if IE]> <link rel="stylesheet" href="/portfolioofc/css/ie.css" /> <![endif]-->
    <meta charset="UTF-8">
    <!-- www.phpied.com/conditional-comments-block-downloads/ -->
  <!--[if IE]><![endif]-->
    <meta name="description" content="Tidy designs, made from scratch.">
	<meta name="author" content="Cody Fischel" >
<!--    <meta name="viewport" content="initial-scale=1">-->
   
<?php

$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
if($isiPad == FALSE){ ?>

    <meta name="viewport" content="user-scalable=no, width=device-width">

<?php } ?>
    <!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    
    <link rel="alternate" type="application/rss+xml" title="PortfolioofC - RSS 2.0" href="/portfolioofc/feeds/rss.php" />
    <title>Portfolio of C</title>
</head>
<body>
<div class="top_stripe"></div>
	<div class="page">
        <header>
		<div class="logo"><a href="/portfolioofc/">Portfolio of C</a></div>

		<ul class="menu">
            <li><a href="/portfolioofc/blog/">blog</a></li>
			<li><a href="/portfolioofc/design/" >media</a></li>
			<li><a href="/portfolioofc/about/">about</a></li>
		</ul>
</header>
        <div id="canvas"></div>


            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1): ?>
        <div id="controls">
    <p id="control_panel">
        You are logged in!
        <a href="/portfolioofc/inc/update.inc.php?action=logout">Log
            out</a>.
    </p></div>
<?php endif; ?>

        <div class="content">
                 
        