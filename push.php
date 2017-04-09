<?php
$proxy = 'http://fixie:dktIJfZt6pqxvZ1@velodrome.usefixie.com:80';
$proxyauth = 'dong_t49@hotmail.com:Kikko664629';
//$strAccessToken = "g4wgtByEcy99M5Zx8bw4fIJJtqi0b/Nwq1mcI4HPXVK2SrFrrMfz/J4gF44eOeNozHuCPQjkuDB8dfk58vFh9bRlk252NZmcNh5n6VPVnT5o8HXIFb9e2H++oIm3t+Bn90HESDRCM4smmZhrd7pppwdB04t89/1O/w1cDnyilFU=";
$strAccessToken = "fkwKvvbbNc0UBTinSDyFlzY4iElRdgMl1fStQ86AOH9";

$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "U5fb851367c2bdf4b8ae3c6dddebdf8ea";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "นี้คือการทดสอบ Push Message";
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close ($ch);
echo "end loop";
?>
