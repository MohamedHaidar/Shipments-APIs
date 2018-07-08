<?php

header('Access-Control-Allow-Origin: *');



include_once "../Module/module.class.php";
$obj = new shipmentClass();



$client_type =$_REQUEST["client_type"];

if($client_type=="create"){
    //shipment data
    $shipment_type = $_REQUEST["api_type"];
    $sender_name = $_REQUEST["sender_name"];
    $sender_Address = $_REQUEST["sender_Address"];
    $reciver_name = $_REQUEST["reciver_name"];
    $reciver_Address = $_REQUEST["reciver_Address"];
    $details = $_REQUEST["details"];


    //shipment create function
    $result = $obj->creatshipment($shipment_type, $sender_name, $sender_Address, $reciver_name, $reciver_Address, $details);


    echo $result;
}
else{
    //shipment number
    $shipment_number =$_REQUEST["Shipment_num"];

    //shipment details function
    $tracking_details= $obj->track_shipment($shipment_number);

    echo json_encode( $tracking_details);
}