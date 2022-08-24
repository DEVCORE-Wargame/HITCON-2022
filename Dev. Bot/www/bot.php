<?php
    include('config.php');
    if(!isset($_GET['url'])) die('Noooooooo!');
	$url = $_GET['url'];
	$components = parse_url($url);
	if(!filter_var($url, FILTER_VALIDATE_URL) || $components['host'] !== 'sandbox.local' || $components['path'] !== "/sandbox/$uuid/math.txt" || isset($components['query']) || isset($components['fragment'])){
		die('What are you doing?');
	}
    $q = file_get_contents($url);
    if(!$q) die('What are you doing?');
    try {
        eval($q);
    } catch (ParseError $e) {
        die('I don\'t know. QQ');
    }
    if(!isset($result)) die('I don\'t know. QQ');
    echo $result;
?>
