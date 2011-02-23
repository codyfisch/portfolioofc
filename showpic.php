<?php
  header("Content-type: text/html");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: no-store, no-cache,
          must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0",
          false);
  header("Pragma: no-cache");
  $pic = strip_tags( $_GET['pic'] );
  if ( ! $pic ) {
    die("No picture specified.");
  }
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title><?php echo($pic); ?></title>
<meta
  http-equiv="Content-Type"
  content="text/html; charset=iso-8859-1"
>
</head>
<body>
<p>
  <img src="/<?php echo($pic); ?>" alt="Image">
</p>
<p>
  Image from
  <a href="http://www.portfolioofc.com/">
  Portfolio of C</a>.
</p>
</body>
</html>