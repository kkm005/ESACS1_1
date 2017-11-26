<?php
$access_token = 'e7j8LZupeYDsw1/VE9+xrQu6QxMvmYSwO2vSNcl3ttHhyjc8LS7XJDr4qTqDRsIhaefBDgXdPURZtLiGp+xF9dEIAqSYV17mjIbo/6XFvYQNDCeNvMi034wWBKU7cPUGALZ3vpCq+zQ3b9gFnNVhZAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
