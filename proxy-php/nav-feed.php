<?php

use Guzzle\Http\Client;

include "guzzle-3.8.1.phar";

$isBooking = false;



$endpoint = ($isBooking)
	? "https://nres.naturalretreats.com/rest/ews/gettagdata?p_site=1&p_key=TASD234DFH&p_tagname=Nav"
	: "https://nres.naturalretreats.com/rest/ews/gettagdata?p_site=1&p_key=TASD234DFH&p_tagname=Nav";

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
