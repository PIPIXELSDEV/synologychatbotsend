<?php
function GET_POST($para){
	$str = "";
	if(isset($_POST[$para])){
		$str = $_POST[$para];
	}else if(isset($_GET[$para])){
		$str = $_GET[$para];
	}else{
		$str = "";
	}
	return $str;
}

$domain = GET_POST("domain");
$api = GET_POST("api");
$method = GET_POST("method");
$version = GET_POST("version");
$token = GET_POST("token");
$payload = GET_POST("payload");

$url = "https://$domain/webapi/entry.cgi?api=$api&method=$method&version=$version&token=$token";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "payload=$payload"); 
$response = curl_exec($ch); 
curl_close($ch);
 
echo $response;
