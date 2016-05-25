<?php
require './lib/Curl.php';

$curl = new Curl(array(
	'timeout' => 30, // time limit for request
	'strict_mode' => false, // whether CURLOPT_FAILONERROR or not
	'max_redirects' => 10 // number of redirections to follow
));


// simple GET request
$res1 = $curl->get('http://example.com');
//echo $res1;
echo '<pre>'; print_r($curl->getInfo()); echo '</pre>';


// simple POST request
$res2 = $curl->post('http://example.com', array('name'=>'Sujeet', 'age'=>25), array(CURLOPT_TIMEOUT => 20));
//echo $res2;
echo '<pre>'; print_r($curl->getInfo()); echo '</pre>';


// custom request
$res3 = $curl->sendRequest('GET', 'http://example.com');
//echo $res3;
echo '<pre>'; print_r($curl->getInfo()); echo '</pre>';


// custom request
$res4 = $curl->setOptions(array(
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => array('name'=>'Sujeet', 'age'=>25),
	CURLOPT_TIMEOUT => 25
))->execute('http://example.com');
//echo $res4;
echo '<pre>'; print_r($curl->getInfo()); echo '</pre>';


echo '<pre>'; print_r($curl->getHeaders('http://example.com')); echo '</pre>';