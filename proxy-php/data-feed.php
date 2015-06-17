<?php

use Guzzle\Http\Client;

include "guzzle-3.8.1.phar";

$isBooking = false;


$str="p_site=1";


if(isset($_REQUEST['pid'])){
$str .="&p_category=".$_REQUEST['pid'];
}
if(isset($_REQUEST['pdate'])){
$str .="&p_searchdate=".$_REQUEST['pdate'];
}
if(isset($_REQUEST['prows'])){
$str .="&p_rows=".$_REQUEST['prows'];
}
if(isset($_REQUEST['prowset'])){
$str .="&p_rowset=".$_REQUEST['prowset'];
}
if(isset($_REQUEST['pnight'])){
$str .="&p_nights=".$_REQUEST['pnight'];
}

if(isset($_REQUEST['pcal'])){
$str .="&p_cal=".$_REQUEST['pcal'];
}
if(isset($_REQUEST['pprice'])){
$str .= $_REQUEST['pprice'];
}
if(isset($_REQUEST['locid'])){
$str .="&p_location=".$_REQUEST['locid'];
}
$str.="&p_key=TASD234DFH";

$endpoint = ($isBooking)
	? "https://nres.naturalretreats.com/rest/ews/gettagdata?p_site=1&p_key=TASD234DFH"
	: "https://nres.naturalretreats.com/rest/ews/getcategories_full?".$str;

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
