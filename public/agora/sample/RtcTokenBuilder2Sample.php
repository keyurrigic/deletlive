<?php
include("../src/RtcTokenBuilder2.php");

$appId = "e6b7b4bfb30a485a8f5458447c18c9e5";
$appCertificate = "2d62176933ea4927a3d8679695cd7082";
$channelName = "7d72365eb983485397e3e3f9d460bdda";
$uid = 555555555;
$uidStr = "555555555";
$tokenExpirationInSeconds = 3600;
$privilegeExpirationInSeconds = 3600;

$token = RtcTokenBuilder2::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, RtcTokenBuilder2::ROLE_PUBLISHER, $tokenExpirationInSeconds, $privilegeExpirationInSeconds);
echo 'Token with int uid: ' . $token . PHP_EOL;

$token = RtcTokenBuilder2::buildTokenWithUserAccount($appId, $appCertificate, $channelName, $uidStr, RtcTokenBuilder2::ROLE_PUBLISHER, $tokenExpirationInSeconds, $privilegeExpirationInSeconds);
echo 'Token with user account: ' . $token . PHP_EOL;

$token = RtcTokenBuilder2::buildTokenWithUidAndPrivilege($appId, $appCertificate, $channelName, $uid, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds);
echo 'Token with int uid and privilege: ' . $token . PHP_EOL;

$token = RtcTokenBuilder2::buildTokenWithUserAccountAndPrivilege($appId, $appCertificate, $channelName, $uidStr, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds, $privilegeExpirationInSeconds);
echo 'Token with user account and privilege: ' . $token . PHP_EOL;
