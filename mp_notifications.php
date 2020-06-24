<?php

$fileObt = "test.txt";
$myfile = fopen($fileObt, "a") or die("Unable to open file!");
//Cierra el archivo
fclose($myfile);
$new = json_decode(file_get_contents('php://input'), true);
//Escribe el numero total de peticiones nuevo aumentado ya en uno
fwrite($myfile, $new);


/*header("HTTP/1.1 200 OK");
echo file_get_contents('php://input');
$json = file_get_contents('php://input');
$file = fopen("test.txt","a");
fwrite($file,"-------------------------------------------- \r\n");
fwrite($file,"".$json." \r\n");

var_dump($json);*/
?>