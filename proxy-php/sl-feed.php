<?php

use Guzzle\Http\Client;

include "guzzle-3.8.1.phar";

$isProd = true;

$endpoint = ($isProd)
	? "http://192.168.100.105:8080/apex/rest/hp/getslfeed?p_key=JSD06623SD"
	: "https://nres.naturalretreats.com/rest/hp/getslfeed?p_key=JSD06623SD";

$cacheKey = "sl-feed";
$cacheTtl = 60 * 1; //in seconds

$body = apc_fetch($cacheKey, $cacheHit);

if (!$cacheHit) {
	$client = new Client();
	$result = $client->get($endpoint)->send();

	$body = $result->getBody(true);

	if ($result->isSuccessful()) {
		apc_store($cacheKey, $body, $cacheTtl);
	}
}

header("Content-Type : text/plain");
echo $body;
