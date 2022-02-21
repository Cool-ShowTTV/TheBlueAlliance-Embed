<?php
include "imports/requests.php";
include "imports/makeSVG.php";



if (isset($_GET['num']) || isset($_GET['team'])){
    header('Content-Type: image/svg+xml');

    // The messiest way to get input I have ever done don't look
    if (isset($_GET['num'])){
        $number = $_GET['num'];
    }elseif (isset($_GET['team'])){
        $number = $_GET['team'];
    }

    // Check if user put a custom color
    if (isset($_GET['color'])){
        $svgColor = $_GET['color'];
    }else{
        $svgColor = "d7d3cb";
    }

    // Check if user put a custom font name
    // I have no idea what font names are valid though
    if (isset($_GET['font'])){
        $fontName = $_GET['font'];
    }else{
        $fontName = "Courier, Monospace";
    }

    createSVG($number,$svgColor,$fontName);
}else{
    // Check if home file exists and if hosted on localhost
    //if (file_exists("pages/home.html") && $_SERVER ['SERVER_NAME'] == "localhost") {
    
    // Check if home file exists and if so load it
    if (file_exists("pages/home.html")) {

        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Content-Length:".filesize("pages/home.html"));
        readfile("pages/home.html");
        die();        
    } else {
        echo("<style>
        body {
            font-family: \"Montserrat\", sans-serif;
            background-color: black;
            height: 100vh;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }
        error{
            color: red;
        }
        message{
            color: green;
        }
        </style>");
        //die("<message>Home page is in the works.</message><message>Please don't worry it will be here soon!</message>");
        die("<error>Error: The home page was not found please submit a issue on <a href='https://github.com/Cool-showTTV/TheBlueAlliance-Embed'>github</a>.</error><br><error>In the report please give the link because this is strange!</error>");
    } 
}
