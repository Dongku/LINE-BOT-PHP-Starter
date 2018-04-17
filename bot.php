<?php
//$proxy = 'http://fixie:dktIJfZt6pqxvZ1@velodrome.usefixie.com:80';
//$proxyauth = 'dong_t49@hotmail.com:Surface@6646';
$access_token = 'g4wgtByEcy99M5Zx8bw4fIJJtqi0b/Nwq1mcI4HPXVK2SrFrrMfz/J4gF44eOeNozHuCPQjkuDB8dfk58vFh9bRlk252NZmcNh5n6VPVnT5o8HXIFb9e2H++oIm3t+Bn90HESDRCM4smmZhrd7pppwdB04t89/1O/w1cDnyilFU=';

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
			
			if (stripos($text, "Siamchart_") !== false) {
			$text1 = str_replace(["Siamchart_","siamchart_"], "", $text);
			$messages = [
				'type' => 'text',
				'text' => 'http://siamchart.com/stock-chart/'.$text1
			];
    			echo "True";
			}
			
			else if (stripos($text, "IDREQ") !== false) {
			$text2 = $event['source']['userId'];
			$messages = [
				'type' => 'text',
				'text' => 'ID='.$text2
			];
    			echo "True";
			}
			
			else if (stripos($text, "w.") !== false) {
			$text3 = str_replace(["w.","W."], "", $text);
			$messages = [
				'type' => 'text',
				'text' => 'https://kdservices.net/Week/'.$text3.'.png'
			,
				'type' => 'image',
				'originalContentUrl' => 'https://kdservices.net/Week/'.$text3.'.png',
				'previewImageUrl' => 'https://kdservices.net/Week/'.$text3.'.png'
			];
    			echo "True";	
			}
			
			else if (stripos($text, "helps") !== false) {
			$text4 = str_replace(["helps","Helps"], "", $text);
			$messages = [
				'type' => 'text',
				'text' => 'ลองพิม @ ตามด้วยชื่อหุ้น เช่น @SET ดูนะครับ',
				'type' => 'text',
				'text' => 'Tips! TF-Day พิม @ ตามด้วยชื่อหุ้น เช่น @SET TF-Week พิม W. ตามด้วยชื่อหุ้น เช่น W.SET'
			];
    			echo "True";	
			}
			
			else if (stripos($text, "@") !== false) {
			$text5 = str_replace("@", "", $text);
			$messages = [
				'type' => 'text',
				'text' => 'https://kdservices.net/Day/'.$text5.'.png'
			,
				'type' => 'image',
				'originalContentUrl' => 'https://kdservices.net/Day/'.$text5.'.png',
				'previewImageUrl' => 'https://kdservices.net/Day/'.$text5.'.png'
			];
    			echo "True";
			}

			else {
			$messages = [
				'type' => 'text',
				'text' => ''
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
echo "Bot-OK";
