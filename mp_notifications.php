
<?php
header("HTTP/1.1 200 OK");
$json = file_get_contents('php://input');
$file = fopen("test.txt","a");
fwrite($file,"-------------------------------------------- \r\n");
fwrite($file,"".$json." \r\n");

var_dump($json);
?>

<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

