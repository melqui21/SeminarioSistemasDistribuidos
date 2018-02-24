<?php
//API: https://developer.twitter.com/en/docs/tweets/search/api-reference/get-search-tweets.html
// 
//$tipoAccion = $_POST['tipoAccion'];

$textoClave = $_POST['textoClave'];
$cantidad = $_POST['cantidad'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$radio = $_POST['radio'];
//echo $latitud;
//echo $longitud;
//echo $radio;

session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
require 'twitterFunctions.php';
 
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
$query = "https://api.twitter.com/1.1/search/tweets.json?q=%23".$textoClave."&result_type=recent&lang=es&count=".$cantidad;
if($longitud && $latitud && $radio){
	//echo 'GEOCODE SI';
	$query = $query . '&geocode=' .$latitud .',' .$longitud . ',' . $radio . 'km';
}

$tweets = $connection->get($query);

$data = (array) $tweets;
$max = sizeof($data['statuses']);
$resultado = 
'<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Texto</th>
    </tr>
  </thead>
  <tbody>';

for($i=0;$i<$max;$i++){
	insertarInformacion($data['statuses'][$i]->user->id,$data['statuses'][$i]->user->name,$textoClave,$data['statuses'][$i]->text,$latitud,$longitud,$radio);
	$resultado = $resultado . '<tr>'		
		. '<th scope="row">'. $i .'</td>'
		. '<td>'.$data['statuses'][$i]->user->name.'</td>'
		. '<td>'.$data['statuses'][$i]->text.'</td>'
	. '</tr>';
		
}
$resultado = $resultado . '</tbody> </table>';
echo $resultado;

//echo $data['statuses'][0]->text;
//var_dump($data); 
//var_dump($tweets);
//$tweets_text = json_encode($tweets);
//echo $tweets_text;



//foreach($tweets as $prop => $value)
   //echo '<br/>'. $prop.' : '. $value;

//echo $tweets;
//$json_result = json_encode($tweets,true);	
//$json = json_decode($json_result,true);
//$texto_tweets = '';
//foreach ($json as $tweet) {
  //  echo $tweet;
//}
//foreach($json as $prop => $value)
   //echo '<br/>'. $prop.' : '. $value;
   //$texto_tweets = $texto_tweets . '<br/>'. $prop.' : '. $value; 
 //var_dump($tweets);
//
//$json_result_decode = json_decode($json_result);
//print $json_result_decode
//echo $json;
?>