<?php
$signedRequest=parse_signed_request($_REQUEST['signed_request'], '9dad413dc9db17c2f3d85ef3c697e328');
logger('POSTed signed request output is '.print_r($signedRequest, true));

if(!$signedRequest['oauth_token']){
	echo('
		<script>
		//top.location.href="http://www.facebook.com/dialog/oauth?client_id=115304078610217&redirect_uri=http://apps.facebook.com/irvington-fifteen/&scope=email,publish_stream,user_likes,user_events,user_education_history,user_birthday,user_online_presence,read_mailbox,read_stream";
		</script>
	');
}
	$tshirts=unserialize(file_get_contents('tshirts.txt'));
	foreach($tshirts as $id => $props){
		echo('
			<div class="shirt">
			 	<a title="T-shirt #'.$id.'" href="http://sheac.me/ihs2015/tshirts/'.$id.'.png" rel="lightbox">
					<img class="shirt" src="http://sheac.me/ihs2015/tshirts/'.$id.'.png">
				</a>
				<div class="voteButton"  id="shirt.'.$id.'">
					<div class="voteButtonInner">VOTE FOR THIS SHIRT</div>
				</div>
			</div>	
		');
	}
?>