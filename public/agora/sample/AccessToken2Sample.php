<?php
include("../src/AccessToken2.php");

$appID = "e6b7b4bfb30a485a8f5458447c18c9e5";
$appCertificate = "2d62176933ea4927a3d8679695cd7082";
$channelName = "deletproperty123";
$uid = 555555555;
$uidStr = "555555555";
$expireTimeInSeconds = 600;

// $token = RtmTokenBuilder::buildToken($appID, $appCertificate, $user, $role, $privilegeExpiredTs);
$accessToken = new AccessToken2($appID, $appCertificate, $expireTimeInSeconds);

// grant rtc privileges
$serviceRtc = new ServiceRtc($channelName, $uid);
$serviceRtc->addPrivilege($serviceRtc::PRIVILEGE_JOIN_CHANNEL, $expireTimeInSeconds);
$accessToken->addService($serviceRtc);

// grant rtm privileges
$serviceRtm = new ServiceRtm($uidStr);
$serviceRtm->addPrivilege($serviceRtm::PRIVILEGE_LOGIN, $expireTimeInSeconds);
$accessToken->addService($serviceRtm);

// grant chat privileges
$serviceChat = new ServiceChat($uidStr);
$serviceChat->addPrivilege($serviceChat::PRIVILEGE_USER, $expireTimeInSeconds);
$accessToken->addService($serviceChat);

$token = $accessToken->build();
echo 'Token with RTC, RTM, CHAT privileges: ' . $token . PHP_EOL;

?>
