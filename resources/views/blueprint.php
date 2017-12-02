<?php

$creator = constructor::getInstance();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, min-width=400, min-device-width=400, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <title><?=$creator->headline?$creator->headline . " - " : null?><?=$creator->title?></title>
  <link rel="shortcut icon" href="content/img/favicon.png" type="image/png"/>
  <?php

  if (!empty($creator->cssfiles)){
	  foreach ($creator->cssfiles as $cssfile) {
		  echo "\t<link rel=\"stylesheet\" href=\"public/css/" . $cssfile . "\" />\r\n";
	  }
  }

  if (!empty($creator->jsfiles)){
	  foreach ($creator->jsfiles as $jsfile) {
		  echo "\t<script type=\"text/javascript\" src=\"public/js/" . $jsfile . "\"></script>\r\n";
	  }
  }

  ?>
</head>
<body>
  <div id="app">
    <?php require_once "$creator->modfile";?>
  </div>
</body>
</html>
