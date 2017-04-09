<?php
$access_token = 'g4wgtByEcy99M5Zx8bw4fIJJtqi0b/Nwq1mcI4HPXVK2SrFrrMfz/J4gF44eOeNozHuCPQjkuDB8dfk58vFh9bRlk252NZmcNh5n6VPVnT5o8HXIFb9e2H++oIm3t+Bn90HESDRCM4smmZhrd7pppwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
