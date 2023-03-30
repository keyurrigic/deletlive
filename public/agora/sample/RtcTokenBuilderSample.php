<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, access-control-allow-methods, Access-Control-Allow-Headers, X-Requested-With, Authorization");
header('Content-Type: application/json; charset=utf-8');
include("../src/RtcTokenBuilder.php");
$data = json_decode(file_get_contents('php://input'), true);
$serialno=$data['serialid'];        //it is a property id
$userID=$data['userid'];
if(empty($serialno) || empty($userID) )
    exit;
/* dev 
$appID = "e6b7b4bfb30a485a8f5458447c18c9e5";
$appCertificate = "beac38fcfd2840608758db7cee9a618e";
*/
/* live */
$appID = "2ce084ae41e245cbb6e48888a0b422f5";
$appCertificate = "524cd4f6706f4060b84cf8d01797c6ef";
/* live end */
//$channelName = "7d72365eb983485397e3e3f9d460bdda";
//$channelName = substr("p".$serialno,0,6);
//$channelName = "7d72365eb983485397e3e3f9d460bdda";
$channelName="p".$serialno;
$uid = $userID;
//$uidStr = "0555555555";
$role = RtcTokenBuilder::RoleAdmin;
$expireTimeInSeconds = 3600;
$currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

$token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
//echo 'Token with int uid: ' . $token . PHP_EOL;
$response=[
    'channelname'=>$channelName,
    'userId'=>$userID,
    'agiraToken'=>$token,
    'appId'=>$appID,
    'webUrl'=>"https://delet.com/agora/deletdevcall.php?token=".urlencode($token)."&channel=$channelName&uid=$userID",
    'fcm'=>null,
    'fcmtoken'=>null,
];

//here now we need to check if there is a property and fcm token is available or not...
$mysqli = new mysqli("localhost","ubwg3unggoxrg","p796pffenz6m","dbtlldrxygdqkn");
$sql="select * from fcmtokens where propertyid='".$serialno."' order by id desc limit 0,1";
$result = $mysqli->query($sql);
$notification=null;
if($result->num_rows==0){
    //exit;
    $response['fcm']="NO Serial Nu";
}
else{
    //send notification
    $row = $result->fetch_assoc();
    $fcmtoken=$row['fcmtoken'];
    if(!empty($fcmtoken)){
        //generate token for mobile as user id = 1 (tablet)
        $currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;
        $mobileToken = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, "1", $role, $privilegeExpiredTs);
        //echo 'Token with int uid: ' . $token . PHP_EOL;
        $fcmnotificationRequest=[
            "to"=>$fcmtoken,
            "priority"=>"high",
            "click_action"=>"FLUTTER_NOTIFICATION_CLICK",
            "data"=>[
                'click_action'=>'FLUTTER_NOTIFICATION_CLICK',
                'channelname'=>$channelName,
                'userId'=>"1",
                'agiraToken'=>$mobileToken,
                'appId'=>$appID,
            ],
            "notification"=>[
                "title"=>"Delet",
                "body"=>"Agent is Online",
                "text"=>"Agent is online"
            ]
        ];
        //send notification
        $response['fcmtoken']=$fcmtoken;
        $notification=sendFCMNotification(json_encode($fcmnotificationRequest));
        //echo json_encode($fcmnotificationRequest);
        //exit;
    }
    else{
        //exit;
    }
    //exit;
}
$response['fcm']=$notification;
echo json_encode($response);
exit;
/*$token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);
echo 'Token with user account: ' . $token . PHP_EOL;*/
function sendFCMNotification($payload){
    $url = 'https://fcm.googleapis.com/fcm/send';
    //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
    $server_key = 'AAAAGoiKm3A:APA91bG9ALyzjkKVmzTcSVRAyEGn5R0WNRATwsBZprcC0xPlMRNK58iixcTC1Mak5-PfuviJnWNQZphivIqw2U_W-oFUAPXq1mSgOOqdrCFateuJnvC5efa5CR3qfyTRmb2tlKok3-KB';
    //header with content_type api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$server_key
    );
    //CURL request to route notification to FCM connection server (provided by Google)
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    $result = curl_exec($ch);
    if ($result === FALSE) {
        //die('Oops! FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}
?>
