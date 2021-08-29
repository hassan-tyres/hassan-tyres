<?php 
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	parse_str(parse_url($url, PHP_URL_QUERY));
	header('Location: viewer.php?l=_JeHFUq_VJOXK0QWHtoGYDw_Product-UserID&userid='.$userid);
?>

