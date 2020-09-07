<?php
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: DELETE");
    
    include_once '../config/database.php';
    include_once '../model/client.php';

    try {
    
        $database = new Database();
        $db = $database->getConnection();
        
        $client = new Client($db);

        switch($requestMethod) {
            case 'DELETE':
                $clientID = '';
                if(isset($_GET['id'])) {
                    $clientID = $_GET['id'];
                    $client->setClientID($clientID);
                } else {
                    throw new Exception("API not found.");
                }
                
                $clientInfo = $client->deleteClient();

                if(!empty($clientInfo)) {
                    $js_encode = json_encode(array('status'=>'SUCCESS', 'message'=>'Client deleted Successfully.'), true);
                } else {
                    $js_encode = json_encode(array('status'=>'FAILED', 'message'=>'No such ID found.'), true);
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