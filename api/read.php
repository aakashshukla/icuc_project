<?php
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    
    include_once '../config/database.php';
    include_once '../model/client.php';

    try {
        $database = new Database();
        $db = $database->getConnection();

        $client = new Client($db);

        switch($requestMethod) {
            case 'GET':
                $clientID = '';
                if(isset($_GET['id'])) {
                    $clientID = $_GET['id'];
                    $client->setClientID($clientID);
                    $clientInfo = $client->getClient();
                } else {
                    $clientInfo = $client->getClients();
                }

                if(!empty($clientInfo)) {
                    $js_encode = json_encode(array('status'=>'SUCCESS', 'clientInfo'=>$clientInfo), true);
                } else {
                    $js_encode = json_encode(array('status'=>'FAILED', 'message'=>'No Record found.'), true);
                }
                echo $js_encode;    
                break;
            
            default:
                header("HTTP/1.0 405 Method Not Allowed");
                break;
            }
        } catch (Exception $e) {
            $js_encode = json_encode(array('status'=>'FAILED', 'message'=>$e->getMessage()), true);
            echo $js_encode;
    }
?>