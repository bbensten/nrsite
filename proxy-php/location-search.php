<?php

use Guzzle\Http\Client;

include "guzzle-3.8.1.phar";

$isBooking = false;


$str="p_site=1";


if(isset($_REQUEST['locid'])){
$str .="&p_location=".$_REQUEST['locid'];
}

$str.="&p_key=TASD234DFH";

$endpoint = ($isBooking)
	? "https://nres.naturalretreats.com/rest/ews/getcategories?".$str
	: "https://nres.naturalretreats.com/rest/ews/getcategories?".$str;

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
