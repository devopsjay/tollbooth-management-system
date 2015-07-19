<?php
require_once 'C:\xampp\htdocs\tb\unirest-php-master\src\Unirest.php';
include 'core/init.php'; 
include 'includes/overall/header_loggedin.php'; 

// Unirest\Request::proxy('172.31.1.3', 8080, CURLPROXY_HTTP);
// Unirest\Request::proxyAuth('iec2012075', '');

// $ch = curl_init("http://iiita.ac.in");
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$response = Unirest\Request::get("https://site2sms.p.mashape.com/index.php?msg=bolyaarsushant&phone=7275065468&pwd=sushant&uid=7275065468",
// $response = Unirest\Request::get("https://site2sms.p.mashape.com/index.php?msg=bolyaarsushant&phone=7897356101&pwd=sushant&uid=7275065468",
  array(
    "X-Mashape-Key" => "2AMQ553BWimshuYmDk9khdX7gKlKp1SUNzujsnbQkwxgQv2FyS",
    "Accept" => "application/json"
  )
);
