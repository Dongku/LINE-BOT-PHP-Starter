<?php
$proxy = 'http://fixie:dktIJfZt6pqxvZ1@velodrome.usefixie.com:80';
$proxyauth = 'dong_t49@hotmail.com:Kikko664629';

$access_token = 'o.ipkOlaHhmMuRCp4wNM9Xoo0jyDoUO22w';
$url = 'https://api.pushbullet.com/v2/pushes';

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$access_token}";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);
echo $result;