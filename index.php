<?php
include "requests.php";
if (isset($_GET['num']) || isset($_POST['num'])){
    if (isset($_POST['num'])){
        $number = $_POST['num'];
    }else{
        $number = $_GET['num'];
    }
    $teamInfo = sendRequest("https://www.thebluealliance.com/api/v3/team/frc{$number}");
    $upcomingEvents = sendRequest("https://www.thebluealliance.com/api/v3/team/frc{$number}/events/{$year}/simple");
    echo $teamInfo;
    echo "\n";
    echo $upcomingEvents;
}else{
    echo json_encode(array("status"=>"Failed: no 'num' status"));
}

?>
