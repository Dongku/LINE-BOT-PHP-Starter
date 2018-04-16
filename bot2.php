<?php
$proxy = 'http://fixie:dktIJfZt6pqxvZ1@velodrome.usefixie.com:80';
$proxyauth = 'dong_t49@hotmail.com:Kikko664629';
$access_token = '7ZOo8dAN3AJre+UNo8Vo7fiKmagJ55ShMcLXf/f/qfH1fHzImu3dB+KiCFiZ7QK/mU/hjt8rev/nxQL0uxEZW5ztW5Gn+14C/U1XChNgHHypz6LpdbJgYK8U/hYv+gYAn0wdjEx7dvjKxLvinQCabwdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			// Build message to reply back
			//$text = "Hello World!";
			
			if (stripos($text, "@") !== false) {
			$text1 = str_replace("@", "", $text);
			$messages = [
				'type' => 'text',
				'text' => 'http://siamchart.com/stock-chart/'.$text1
			];
    			echo "True";
			}
			
			else {
			$messages = [
				'type' => 'text',
				'text' => 'Test Test'
			];
			}			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "Prod2-OK";
