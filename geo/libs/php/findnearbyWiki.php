<?php

	

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	$executionStartTime = microtime(true);

	$url='http://api.geonames.org/findNearbyWikipediaJSON?formatted=true&lat=' . $_REQUEST['lat'] . '&title=' . $_REQUEST['title'] . '&jamesacrawford=flightltd&style=full';
	//http://api.geonames.org/findNearbyWikipediaJSON?formatted=true&lat=47&lng=9&username=jamesacrawford&style=full
    //http://api.geonames.org/earthquakesJSON?formatted=true&north=44.1&south=-9.9&east=-22.4&west=55.2&username=jamesacrawford&style=full
    //http://api.geonames.org/neighbourhoodJSON?formatted=true&lat=40.78343&lng=-73.96625&username=jamesacrawford&style=full
    
    //
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);

	$result=curl_exec($ch);

	curl_close($ch);

	$decode = json_decode($result,true);	

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = intval((microtime(true) - $executionStartTime) * 1000) . " ms";
	$output['data'] = $decode['geonames'];
	
	header('Content-Type: application/json; charset=UTF-8');

	echo json_encode($output); 

?>
