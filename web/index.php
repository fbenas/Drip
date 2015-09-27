<?php 

// Set up the html page
$view       = "index.html";
$scripts[]  = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js";
$scripts[]  = "https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js";
$scripts[]  = "index.js";
$styles[]   = "index.css";
$title      = "Drip";
// Include the frame
include "frame.html";

// Set up the view