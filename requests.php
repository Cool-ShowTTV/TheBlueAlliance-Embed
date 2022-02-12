<?php
$APIKey = getenv('API-Key'); //Used to get the API key from environment vars
$year = date("Y");//Get current year

/**
 * Send a request to $url with needed Auth Key
 *
 * @param  string $url
 * @param  bool $json
 * @return data
 */
function sendRequest(string $url, bool $json = false){
    global $APIKey;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "X-TBA-Auth-Key: ". $APIKey,
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    $resp = json_decode($resp,true);
    $resp[] = array("status"=>"Success");
    if(!$json){$resp = json_encode($resp);}
    return $resp;
}