<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Basic Video Call -- Agora</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
if(isset($_GET['serialnumber'])){
    //echo "do stuff here";
    $serialnumber=$_GET['serialnumber'];
    include("src/RtcTokenBuilder.php");
    $serialno=$serialnumber;
    $userID=1;      //it will be alwayed 1
    if(empty($serialno) || empty($userID) )
        exit;
    $appID = "e6b7b4bfb30a485a8f5458447c18c9e5";
    $appCertificate = "beac38fcfd2840608758db7cee9a618e";
    //$channelName = "7d72365eb983485397e3e3f9d460bdda";
    $channelName = "p".$serialno;
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
        'appId'=>$appID
    ];
    //header('Content-Type: application/json; charset=utf-8');
    //echo json_encode($response);
    ?>
    <!--
  This page interacts with the Agora Voice Call for Web Next Generation SDK to easily create Video Call
  functionality in a Web page.

  This HTML page imports the next generation Agora Video SDK for Web from
  https://download.agora.io/sdk/release/AgoraRTC_N.js and local functionality from cloudProxy.js.

  The form in this page passes data and actions input by the user to cloudProxy.js. basicVideoCall
  creates an AgoraRTC client which adds and and removes local and remote users to a specific channel.
-->

  <!--
  Create the banner at the top of the page.
-->
  <div class="container-fluid banner">
    <p class="banner-text">Basic Video Call</p>
    <a style="color: rgb(255, 255, 255);fill: rgb(255, 255, 255);fill-rule: evenodd; position: absolute; right: 10px; top: 4px;"
      class="Header-link " href="https://github.com/AgoraIO/API-Examples-Web/tree/main/Demo">
      <svg class="octicon octicon-mark-github v-align-middle" height="32" viewBox="0 0 16 16" version="1.1" width="32"
        aria-hidden="true">
        <path fill-rule="evenodd"
          d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z">
        </path>
      </svg>
    </a>
  </div>

  <!--
  When a user tries to join a Video Call without supplying an AccessToken, this button
  calls #success-alert in cloudProxy.js. #success-alert refreshes this page with the
  user information.
-->
  <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> You can invite others join this channel by click </span><a href=""
      target="_blank">here</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <!--
  When a user successfully joins a Video Call channel with an AccessToken, this section displays
  a banner with a close button.
-->
  <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> Joined room successfully. </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <!--
  When a user successfully joins a Video Call channel with an AccessToken, this section displays
  a banner with a close button.
-->
  <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congratulations!</strong><span> Joined room successfully. </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="container">
    <!--
    Input fields so the user can securely join a Video Call channel.
  -->
    <form id="join-form">
      <div class="row join-info-group" style="display:none">
        <div class="col-sm sso-hidden">
          <p class="join-info-text">APP ID</p>
          <input id="appid" type="text" placeholder="Enter the appid" value="e6b7b4bfb30a485a8f5458447c18c9e5">
          <p class="tips">You find your APP ID in the <a href="https://console.agora.io/projects">Agora Console</a></p>
        </div>
        <div class="col-sm sso-hidden">
          <p class="join-info-text">Token(optional)</p>
          <input id="token" type="text" placeholder="Enter the app token" value="<?php echo $token; ?>">
        </div>
        <div class="col-sm">
          <p class="join-info-text">Channel Name</p>
          <input id="channel" type="text" placeholder="Enter the channel name" required value="<?php echo $channelName; ?>">
        </div>
        <div class="col-sm">
          <p class="join-info-text">User ID(optional)</p>
          <input id="uid" type="text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')"
            onafterpaste="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="Enter the user ID" value="<?php echo $uid; ?>">
        </div>
      </div>

      <!--
      Join or leave a Video Call channel.
    -->
      <div class="button-group" style="display:inline-block">
        <button id="join" type="submit" class="btn btn-primary btn-sm" style="height: 30px;">Join</button>
        <button id="leave" type="button" class="btn btn-primary btn-sm" style="height: 30px;" disabled>Leave</button>

        <div class="collapse-wrapper" style="height: 30px;">
          <div class="collapse-content">
            <button class="btn btn-primary btn-sm collapse-btn" type="button" data-toggle="collapse"
              data-target="#agora-collapse" aria-expanded="false" aria-controls="agora-collapse">
              ADVANCED SETTINGS
            </button>
            <!-- collapse -->
            <div class="collapse" id="agora-collapse" style="width: 100%;z-index: 9999;">
              <div class="card card-body">
                <!-- Microphone -->
                <h6 class="device-name">Microphone</h6>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Mics</button>
                    <div class="mic-list dropdown-menu"></div>
                  </div>
                  <input type="text" class="mic-input form-control" aria-label="Text input with dropdown button"
                    readonly>
                </div>
                <!-- Camera -->
                <h6 class="device-name">Camera</h6>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Cams</button>
                    <div class="cam-list dropdown-menu"></div>
                  </div>
                  <input type="text" class="cam-input form-control" aria-label="Text input with dropdown button"
                    readonly>
                </div>
                <!-- CODEC -->
                <h6 class="device-name">CODEC</h6>
                <span style="padding-left: 1.25rem;">
                  <input class="form-check-input" type="radio" name="radios" id="vp8" value="vp8"
                    checked>
                  <label class="form-check-label" for="vp8">
                    vp8
                  </label>
                </span>
                <span style="padding-left: 1.25rem;" class="mb-3">
                  <input class="form-check-input" type="radio" name="radios" id="h264" value="h264">
                  <label class="form-check-label" for="h264">
                    h264
                  </label>
                </span>
                <!-- profile -->
                <h6 class="device-name">Video Profiles</h6>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Profiles</button>
                    <div class="profile-list dropdown-menu"></div>
                  </div>
                  <input type="text" class="profile-input form-control" aria-label="Text input with dropdown button"
                    readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!--
    This local media splayer is enabled when the user has successfully joined a Video Call channel.
  -->
    <div class="row video-group">
      <div class="col">
        <p id="local-player-name" class="player-name"></p>
        <div id="local-player" class="player"></div>
      </div>
      <div class="w-100"></div>
      <div class="col">
        <div id="remote-playerlist"></div>
      </div>
    </div>
  </div>

  <!--
  Import the Agora Video Call SDK for Web and local calls to it.
-->
    <?php

}
else{
    ?>
    <form>
        <input type="text" name="serialnumber" value="" placeholder="Enter Serial number here"/>
        <input type="submit" name="submit" value="Start"/>
    </form>
    <?php
}
?>
 <script src="assets/jquery-3.4.1.min.js"></script>
  <script src="assets/bootstrap.bundle.min.js"></script>
  <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
  <script src="basicVideoCall.js"></script>
</body>

</html>
