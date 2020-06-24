<?php
http_response_code(200);

foreach ($_GET as $key => $value) {
    $response .= htmlspecialchars($key)."=".htmlspecialchars($value)."&";
}

$myfile = fopen("test.txt", "a");
fwrite($myfile, "******************************************************************");
fwrite($myfile, "*** \t\t" . date('m/d/Y h:i:s a', time()));
fwrite($myfile, "*** \t\t" . $response);
fwrite($myfile, file_get_contents("php://input"));
fwrite($myfile, "******************************************************************");
fclose($myfile);


if ($_GET["topic"] == 'payment'){

	$curl = "curl -X GET 'https://api.mercadopago.com/v1/payments/".$_GET["id"]."?access_token=APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948'";
  
	$output = shell_exec($curl); 

	$myfile = fopen("test.txt", "w");
	fwrite($myfile, $output);
	fclose($myfile);

}
?>