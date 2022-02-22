<?php
include "imports/requests.php";
include "imports/makeSVG.php";



if (isset($_GET['num']) || isset($_GET['team'])){
    // I moved the SVG making into a function but I am too lazy to change the code so that it is its own "page"
    createSVG();
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
