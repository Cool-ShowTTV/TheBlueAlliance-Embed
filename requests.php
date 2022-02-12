<?php
$APIKey = getenv('API-Key'); //Used to get the API key from environment vars

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
    if(!$json){$resp = json_encode($resp,JSON_PRETTY_PRINT);}
    return $resp;
}

/**
 * getTeamInfo
 *
 * @param  Int $teamNum Frc team's number
 * @param  Bool $json True = return json
 * @return Json/String
 */
function getTeamInfo(Int $teamNum = null ,Bool $json=false)
{
    return sendRequest("https://www.thebluealliance.com/api/v3/team/frc{$teamNum}", $json);
}

/**
 * getEventInfo
 *
 * @param  Int $teamNum Frc team's number
 * @param  Bool $json True = return json
 * @return Json/String
 */
function getEventInfo(Int $teamNum = null ,Int $year, Bool $json=false)
{
    return sendRequest("https://www.thebluealliance.com/api/v3/team/frc{$teamNum}/events/{$year}/simple",$json);
}