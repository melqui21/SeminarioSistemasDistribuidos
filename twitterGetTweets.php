<?php
$tipoAccion = $_POST['tipoAccion'];
$keyWord = $_POST['keyWord'];
$noTweets = $_POST['noTweets'];
//echo $tipoAccion;
//echo $keyWord;
//echo $noTweets;

session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "jcfedroid";
$notweets = 30;
$consumerkey = "dGaTGZk9jqMVRuua3cDNoJyOv";
$consumersecret = "RS5Lg91NqX2LNzhxtiAZLIYfeirab5N9rIlcjrnUBTXJCg2VLe";
$accesstoken = "745019287341916162-gHw7wPeI84Dk3GqJIScEp1HBWl619po";
$accesstokensecret = "Di4fjjHNyp1wfHqg2UWewcfOiOdVX3zrKm61BHDODJ6By";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
//$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=%23".$keyWord."&result_type=recent");
 
echo json_encode($tweets);
?>