<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'vendor/autoload.php';

$access_token = 'APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398'; //'APP_USR-6718728269189792-112017-dc8b338195215145a4ec035fdde5cedf-491494389'; 
$integrator_id = '​dev_24c65fb163bf11ea96500242ac130004';
$public_key = 'APP_USR-5b9a3e27-3852-407d-8f49-e08bd5990007';
$clientID = '491494389';
$url = 'https://alangpmx-mp-ecommerce-php.herokuapp.com';

MercadoPago\SDK::initialize(); 
MercadoPago\SDK::setAccessToken($access_token);
MercadoPago\SDK::setIntegratorId($integrator_id);
MercadoPago\SDK::setPublicKey($public_key);
MercadoPago\SDK::setClientId($clientID);

/* Armo preferencia de pago */
$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => $url."/pago-aprobado.php",
    "failure" => $url."/pago-rechazado.php",
    "pending" => $url."/pago-pendiente.php"
);
$preference->auto_return = "approved";
$preference->external_reference = 'alansgp@outlook.com';
$preference->notification_url = $url.'/mp_notifications.php';
$preference->payment_methods = array(
    "excluded_payment_methods" => array(
        array("id" => "amex")
    ),
    "excluded_payment_types" => array(
        array("id" => "atm")
    ),
    "installments" => 6
);

/* ARMO PERFIL DE COMPRADOR */
$payer = new MercadoPago\Payer();
$payer->id = 535650015;
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_58295862@testuser.com";
$payer->phone = array(
    "area_code" => "52",
    "number" => "​5549737300"
);
$payer->address = array(
    "street_name" => "Insurgentes Sur",
    "street_number" => 1602,
    "zip_code" => "0394​0"
);
$preference->payer = $payer;


/* Armo Item*/
$item = new MercadoPago\Item();
$item->id = 1234;
$item->title = $_POST['title'];
$item->description = 'Dispositivo móvil de Tienda e-commerce';
$item->quantity = 1;
$item->unit_price = $_POST['price'];
$item->picture_url = $url.str_replace("./","",$_POST['img']);

$preference->items = array($item);

$preference->save();
?>