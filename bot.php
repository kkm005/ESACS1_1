<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = 'd73365ebde71f4933f8cd6866f1fa509';
$access_token  = 'e7j8LZupeYDsw1/VE9+xrQu6QxMvmYSwO2vSNcl3ttHhyjc8LS7XJDr4qTqDRsIhaefBDgXdPURZtLiGp+xF9dEIAqSYV17mjIbo/6XFvYQNDCeNvMi034wWBKU7cPUGALZ3vpCq+zQ3b9gFnNVhZAdB04t89/1O/w1cDnyilFU=';

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
