<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, access-control-allow-methods, Access-Control-Allow-Headers, X-Requested-With, Authorization");
header('Content-Type: application/json; charset=utf-8');
//include("../src/RtcTokenBuilder.php");
$data = json_decode(file_get_contents('php://input'), true);
$propertyid=$data['propertyid'];
$fcmtoken=$data['fcmtoken'];
if(empty($propertyid) || empty($fcmtoken) )
    exit;
//now check with the database
$mysqli = new mysqli("localhost","ubwg3unggoxrg","p796pffenz6m","dbtlldrxygdqkn");
// Check connection
if ($mysqli->connect_errno) {
    $response=[
        'success'=>false,
    ];
  //echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  echo json_encode($response);
  exit();
}
$sql="select * from fcmtokens where propertyid='".$propertyid."'";
$result = $mysqli->query($sql);
if($result->num_rows==0){
    //insert 
    $sql="insert into fcmtokens(propertyid,fcmtoken) values('".$propertyid."','".$fcmtoken."')";
    $mysqli->query($sql);
}
else{
    //update
    $sql="update fcmtokens set fcmtoken='".$fcmtoken."' where propertyid='".$propertyid."'";
    $mysqli->query($sql);
}
$response=[
    'success'=>true,
];
echo json_encode($response);
?>