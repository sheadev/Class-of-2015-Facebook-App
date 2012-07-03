<?php
/*
// Load the Facebook PHP SDK
require_once("facebook.php");

//Get the main DSK object
$config = array();
$config[ÔappIdÕ] = '115304078610217';
$config[ÔsecretÕ] = '9dad413dc9db17c2f3d85ef3c697e328';
$config[ÔfileUploadÕ] = false;
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
		Hey there! Before we get started, please click <a href=\"#\" onclick=\"
			var oauth_url = 'https://www.facebook.com/dialog/oauth/';
			oauth_url += '?client_id=115304078610217&display=popup';
			oauth_url += '&redirect_uri=' + encodeURIComponent('http://apps.facebook.com/irvington-fifteen/?just=authorized');
			oauth_url += '&scope=publish_stream, user_online_presence, user_groups';
			window.top.location = oauth_url;
		\">here</a> and accept on both pages. This will allow you to use the new features that we have planned for the future. In a few seconds, you can jump right into using the app!
	");
	exit();
}

$userdata=json_decode(file_get_contents('http://graph.facebook.com/'.$data['user_id']), true);
$fullname=$userdata['name'];
$firstname=$userdata['first_name'];

echo('
<script>
var votes=0;
</script>
<div class="welcome">
	Welcome, '.$firstname.'!
	This is the official Class of 2015 Facebook App.
</div>
<div class="notice">
	We\'re currently brainstorming ideas for this app. A few of them are:
	<ul>
		<li>You would be able to sign up to get reminders the night before whenever there is an assignment (or anything else you need) due for your classes.</li>
		<li>You\'d be able to ask questions and a few people with the class that its about would get notification to answer it. (don\'t worry, there wouldn\'t be spam)</li>
	</ul>
	If you\'d be interested in that, hit the button below. If enough people are, then we will go ahead and do it.
	<input type="button" value="I\'d be interested." id="interested">
	<textarea id="ideas">Got ideas for this app, our Facebook precense, or activities we could do? Type \'em in here and hit send.</textarea>
	<input type="button" value="Send in my idea." id="ideas">
</div>
<div class="maindirections">
	Use this app to vote for your favorite Class of 2015 T-shirt designs.
	Please hit the vote button on the three designs that you like best. Thanks for voting!
</div>
<div class="wrap">');

foreach($design as $key=>$value){
	echo("
	<div class=\"shirt\">
		<img src=\"http://sheac.me/15/shirts/{$key}.png\" />
		<p>{$value['description']}</p>
		<input onclick=\"
			$.get('http://sheac.me/15/vote.php?shirt={$key}&uid={$data['user_id']}');
			if((votes+1)==3){alert('You\'ve chosen three shirts. Thanks! If you try to cast any further votes, they will not work.');}
		\" 'type=\"submit\" value=\"Vote!\" />
	</div>
	");
}
echo('</div>');
/*
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
*/
?>