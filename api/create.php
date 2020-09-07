<?php
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");

    include_once '../config/database.php';
    include_once '../model/client.php';
    include_once '../model/validateClient.php';

    try {
        $database = new Database();
        $db = $database->getConnection();

        $client = new Client($db);

        $data = json_decode(file_get_contents("php://input"));

        switch($requestMethod) {
            case 'POST':
                $val = ValidateClient::validate($data);

                if (!empty($val)) {
                    throw new Exception($val);
                }

                $client->setFirstName($data->first_name);
                $client->setLastName($data->last_name);
                $client->setAddress($data->address);
                $client->setPhoneNumber($data->phone_number);
                $client->setDateAdded(date('Y-m-d H:i:s'));
                $client->setAssignedLawyer($data->assigned_lawyer);
                $client->setNotes($data->notes);

                $clientInfo = $client->createClient();

                if(!empty($clientInfo)) {
                    $js_encode = json_encode(array('status'=>'SUCCESS', 'message'=>'Client created Successfully.'), true);
                } else {
                    $js_encode = json_encode(array('status'=>'FAILED', 'message'=>'Client creation failed.'), true);
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