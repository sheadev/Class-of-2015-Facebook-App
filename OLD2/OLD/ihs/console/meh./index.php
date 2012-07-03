<?php
/*
// Load the Facebook PHP SDK
require_once("facebook.php");

//Get the main DSK object
$config = array();
$config[‘appId’] = '115304078610217';
$config[‘secret’] = '9dad413dc9db17c2f3d85ef3c697e328';
$config[‘fileUpload’] = false;
$facebook = new Facebook($config);
*/
// A c/p function which extensively parses the parameters which are passed to this page when the POST request is made for the iframe on canvas
function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

// Helper for above function
function base64_url_decode($input) {
  return base64_decode(strtr($input, '-_', '+/'));
}

// Use above function to get passed POST.
$data = parse_signed_request($_REQUEST['signed_request'], '9dad413dc9db17c2f3d85ef3c697e328');

// Has the user authorized our app? We will test by seeing whether a user id is given in the POST data. If not, give them a notice/link to an auth dialog.
if(!isset($data['user_id'])){
	echo("
		Welcome! Before we get started, this app needs a few permissions. Please click <a href=\"#\" onclick=\"
			var oauth_url = 'https://www.facebook.com/dialog/oauth/';
			oauth_url += '?client_id=115304078610217&display=popup';
			oauth_url += '&redirect_uri=' + encodeURIComponent('http://apps.facebook.com/irvington-fifteen/?just=authorized');
			oauth_url += '&scope=publish_stream, user_online_presence, user_groups';
			window.top.location = oauth_url;
		\">here</a> and accept on both pages. If you don't accept, the app will not work.
	");
	exit();
}

$userdata=json_decode(file_get_contents('http://graph.facebook.com/'.$data['user_id']), true);
$fullname=$userdata['name'];
$firstname=$userdata['first_name'];

echo("
Welcome, $firstname!
");

function request($uid){
  $app_id = '115304078610217';
  $app_secret = '9dad413dc9db17c2f3d85ef3c697e328';

  $token_url = "https://graph.facebook.com/oauth/access_token?" .
    "client_id=" . $app_id .
    "&client_secret=" . $app_secret .
    "&grant_type=client_credentials";

  $app_access_token = file_get_contents($token_url);

  $user_id = $uid;

  $apprequest_url ="https://graph.facebook.com/" .
    $user_id .
    "/apprequests?message='testingtestingmessage'" . 
    "&data='testingtestingdata'&"  .   
    $app_access_token . "&method=post";
  $result = file_get_contents($apprequest_url);
  echo("App Request sent?".$result);
}

request($data['user_id']);
echo("\n<br> done");
?>