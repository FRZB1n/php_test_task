<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: PUT, POST, GET, DELETE, PATCH");
header('Content-type: application/json; charset=utf-8');    
require "core.php";
require "connect.php";
$method = $_SERVER['REQUEST_METHOD'];
// $params = $_GET['rout'] ?? '';




if ($method === 'POST') {
    echo json_encode(RandomNumberGenerator::generateRandomNumber($con));
} else if ($method === 'GET') {
    $id = $_GET['id'] ?? null;
    echo json_encode(RandomNumberGenerator::getGeneratedNumber($con, $id));
} else {
    echo json_encode(['error' => 'Invalid method']);
}




