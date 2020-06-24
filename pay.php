<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'vendor/autoload.php';

$access_token = 'APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948';
//'APP_USR-6588866596068053-041607-428a530760073a99a1f2d19b0812a5b6-491494389'; 
//              'APP_USR-8058997674329963-062418-89271e2424bb1955bc05b1d7dd0977a8-592190948'; 
$integrator_id = '​dev_24c65fb163bf11ea96500242ac130004';
$public_key = 'APP_USR-158fff95-0bdf-4149-9abc-c8b0ac7f289f';
$clientID = '592190948';
$url = 'https://alangpmx-mp-ecommerce-php.herokuapp.com';

MercadoPago\SDK::initialize(); 
MercadoPago\SDK::setAccessToken($access_token);
MercadoPago\SDK::setIntegratorId($integrator_id);
//MercadoPago\SDK::setPublicKey($public_key);
//MercadoPago\SDK::setClientId($clientID);

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
    "number" => "​5549737300",
);
$payer->address = array(
    "street_name" => "Insurgentes Sur",
    "street_number" => 1602,
    "zip_code" => "03940",
);

$preference->payer = $payer;


/* Armo Item*/
$item = new MercadoPago\Item();
$item->id = 1234;
$item->title = $_POST['title'];
$item->description = 'Dispositivo móvil de Tienda e-commerce';
$item->quantity = 1;
$item->unit_price = $_POST['price'];
$item->picture_url = $url."/".str_replace("./","",$_POST['img']);

$preference->items = array($item);

$preference->save();
?>

