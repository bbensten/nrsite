<?php

use Guzzle\Http\Client;

include "guzzle-3.8.1.phar";

$isProd = false;

$endpoint = ($isProd)
	? "https://nres.naturalretreats.com/rest/ews/getcategories_full?p_site=1&p_category=".$_REQUEST['pid']."&p_key=TASD234DFH";
	: "https://nres.naturalretreats.com/rest/ews/getcategories_full?p_site=1&p_category=".$_REQUEST['pid']."&p_key=TASD234DFH";

/*$cacheKey = "sl-feed";
$cacheTtl = 60 * 1; //in seconds

$body = apc_fetch($cacheKey, $cacheHit);

if (!$cacheHit) {
	$client = new Client();
	$result = $client->get($endpoint)->send();

	$body = $result->getBody(true);

	if ($result->isSuccessful()) {
		apc_store($cacheKey, $body, $cacheTtl);
	}
}*/
$client = new Client();
	$result = $client->get($endpoint)->send();

	$body = $result->getBody(true);

header("Content-Type : text/plain");
echo $body;
