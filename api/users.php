<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include_once "../config/database.php";
include_once "../class/Order.php";

$database = new Database();
$db = $database->getConnection();

$item = new Order($db);

$data = json_decode(file_get_contents("php://input", true));

// if(!empty($data->order_id) && !empty($data->cust_id) && !empty($data->order_placed) && !empty($data->material) && !empty($data->furnace_tempr) && !empty($data->application) && !empty($data->type) && !empty($data->sr_d) && 
// !empty($data->spiral_pitch) && !empty($data->cr_d)&& !empty($data->crod_pitch) && !empty($data->edges) && !empty($data->belt_width) && !empty($data->length) && !empty($data->sample_photos))
// {
    $item->order_id = $data->order_id;
    $item->cust_id = $data->cust_id;
    $item->order_placed = $data->order_placed;
    $item->material = $data->material;
    $item->furnace_tempr = $data->furnace_tempr;
    $item->application = $data->application;
    $item->type = $data->type;
    $item->sr_d = $data->sr_d;
    $item->spiral_pitch = $data->spiral_pitch;
    $item->cr_d = $data->cr_d;
    $item->crod_pitch = $data->crod_pitch;
    $item->edges = $data->edges;
    $item->belt_width = $data->belt_width;
    $item->length = $data->length;
    $item->sample_photos = $data->sample_photos;

    if($item->createOrders())
    {
        http_response_code(200);
        echo json_encode(["message" => "Oders are created successfully!"]);
    }
    else
    {
        http_response_code(503);
        echo json_encode(["message" => "Orders are failed to created"]);
    }

// }
// else
// {
//     http_response_code(400);
//     echo json_encode(["message" => "Unable to create orders. Data is incomplete"]);
// }


?>