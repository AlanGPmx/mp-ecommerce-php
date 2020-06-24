<?php
require 'vendor/autoload.php';

$ch = curl_init("https://api.mercadopago.com/v1/payments/".$preference->id."?access_token=APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948");
$fp = fopen("test.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);

/*header("HTTP/1.1 200 OK");
echo file_get_contents('php://input');
$json = file_get_contents('php://input');
$file = fopen("test.txt","a");
fwrite($file,"-------------------------------------------- \r\n");
fwrite($file,"".$json." \r\n");

var_dump($json);*/
?>