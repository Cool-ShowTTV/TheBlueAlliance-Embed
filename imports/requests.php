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
    // Get API Key form the start of the file
    global $APIKey;

    // Start a curl and set info
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Set auth Key from env file
    $headers = array(
        "X-TBA-Auth-Key: ". $APIKey,
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    // Send Curl request and get return
    $resp = curl_exec($curl);
    curl_close($curl);

    // Convert into Json so if I ever need to edit it I can
    $resp = json_decode($resp,true);
    // If the user doesn't want it as a Json convert it back to string and pretty print it
    if(!$json){$resp = json_encode($resp,JSON_PRETTY_PRINT);}
    // Return the data back to what ever called it
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
    // Send a request to get info on a team and return it to what ever called it
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
    // Send a request to get info on events for a team and return it to what ever called it
    return sendRequest("https://www.thebluealliance.com/api/v3/team/frc{$teamNum}/events/{$year}/simple",$json);
}
