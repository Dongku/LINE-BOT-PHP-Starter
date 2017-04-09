<?php
//$url = 'https://api.pushbullet.com/v2/users/me';
$url = 'https://api.pushbullet.com/v2/pushes';
$access_token = 'o.em63fJtsdieIDm46GxFJBasM6udgSvzT';

$headers = array('Content-Type: application/json', 'Access-Token:'. $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
