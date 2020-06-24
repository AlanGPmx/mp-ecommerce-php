<?php
http_response_code(200);

foreach ($_GET as $key => $value) {
    $response .= htmlspecialchars($key)."=".htmlspecialchars($value)."&";
}

$myfile = fopen("webhooks_output.txt", "a");
fwrite($myfile, date('m/d/Y h:i:s a', time()) . " " . $response . "|||" . file_get_contents("php://input"));
fclose($myfile);


if ($_GET["topic"] == 'payment'){

	$curl = "curl -X GET 'https://api.mercadopago.com/v1/payments/".$_GET["id"]."?access_token=APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398'";
  
	$output = shell_exec($curl); 

	$myfile = fopen("test.txt", "w");
	fwrite($myfile, $output);
	fclose($myfile);

}
?>