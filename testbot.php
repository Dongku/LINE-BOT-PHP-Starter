<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = 'ed498d7eb3f9ff4a0419161e80077664';
$access_token  = '7ZOo8dAN3AJre+UNo8Vo7fiKmagJ55ShMcLXf/f/qfH1fHzImu3dB+KiCFiZ7QK/mU/hjt8rev/nxQL0uxEZW5ztW5Gn+14C/U1XChNgHHypz6LpdbJgYK8U/hYv+gYAn0wdjEx7dvjKxLvinQCabwdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
echo "Verify-OK";
