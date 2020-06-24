<?php

$TextoPeticionesGoogle = "test.txt";
//Obtiene el ultimo digito de peticiones totales
$myfile = fopen($TextoPeticionesGoogle, "a+") or die("Unable to open file!");
//Aumenta en uno la nueva peticion ya teniendo guardada el ultimo estado de peticiones totales
$new = intval(fgets($myfile)) + 1;
//Cierra el archivo
fclose($myfile);
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