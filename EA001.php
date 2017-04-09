<?php
//$proxy = 'http://fixie:dktIJfZt6pqxvZ1@velodrome.usefixie.com:80';
//$proxyauth = 'dong_t49@hotmail.com:Kikko664629';

$access_token = 'o.em63fJtsdieIDm46GxFJBasM6udgSvzT';
$url = 'https://api.pushbullet.com/v2/pushes';
//$url = 'https://api.pushbullet.com/v2/users/me';

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
//$arrHeader[] = "Authorization: Bearer {$access_token}";
$arrHeader[] = "Access-Token: $access_token";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrheaders);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
