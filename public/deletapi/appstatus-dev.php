<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

require_once 'vendor/autoload.php';

// Takes raw data from the request
$json = file_get_contents('php://input');
if(empty($json))
{
    $data = array('success'=>false,"message"=>"Please enter serial number");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die;
}
// Converts it into a PHP object
$data = json_decode($json);
if(empty($data->serialno))
{
    $data = array('success'=>false,"message"=>"Please enter serial number");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die;
}

//1. get the pproperty and user from the hardware collection
/*$client = new MongoDB\Client(
    'mongodb+srv://keyurrigic:GDBKMY7KWnyrtydM@cluster0.s70wwrj.mongodb.net/?retryWrites=true&w=majority'
);*/
/* live */
$client = new MongoDB\Client(
    'mongodb+srv://info:H4Pg1xBPQzZXlU1h@test-env-server-db.2bysx9q.mongodb.net/delet-mvp'
);

$db = $client->{'delet-mvp'};
$collection = $db->hardwares;
//1. find the hardware 
$hardware = $collection->findOne(['serial' => $data->serialno]);
//http://18.116.112.179/
// get the user 

$user=$hardware->user;
$property=$hardware->property;
$property_id=null;
if(empty($user)){
    $data = array('success'=>false,"message"=>"User assigned to this tablet");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}
if(empty($property))
{
    // get kit info 
    $kit=$hardware->kit;
    if(!empty($kit)){
        //now from kit we need to get property
        $collection = $db->kits;
        //1. find the hardware 
        $kit_obj = $collection->findOne(['_id' => $kit]);
        $property=$kit_obj->property;
        if(empty($property))
        {
            $data = array('success'=>false,"message"=>"Property not assigned to this tablet");
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            die; 
        }
        else{
            $property_id=$property;
        }
    }
    else{
        $data = array('success'=>false,"message"=>"Property not assigned to this tablet");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        die;
    }
    
}
else{
    $property_id=$property;
}
//now get the property and user data 
//$arr[] = new MongoDB\BSON\ObjectId($json);
$collection = $db->users;
//1. find the hardware 
$users = $collection->findOne(['_id' => $user]);

$collection = $db->properties;
//1. find the hardware 
//$properties = $collection->findOne(['_id' => $property_id]);
$pingtime=time();
$collection->updateOne(['_id' => $property_id], ['$set' => ['lastPing' => $pingtime]]);   

$data=array(
    'success'=>true,
    'lastPing'=>$pingtime,
    /*'user'=>$users,
    'property'=>$properties*/
);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
die;
