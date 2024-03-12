<head>
  <meta http-equiv="refresh" content="20000">
</head>
Player Record<br>
<?php
error_reporting(0);
//$gamenum=$_GET['gNum'];

$team = array(
"2001" => "Hyundai Hillstate",
"2002" => "Ex Hi-pass",
"2003" => "Red Sparks",
"2004" => "Pink Spiders",
"2005" => "GS Caltex",
"2006" => "IBK Altos",
"2007" => "AI Peppers",
"1001" => "Korean Air Jumbos",
"1002" => "Bluefangs",
"1004" => "KB Stars",
"1005" => "Sky Walkers",
"1006" => "Kepco Vixtorm",
"1008" => "OK Man",
"1009" => "Woori Won");

$jsonnext=json_decode(file_get_contents("https://api.kovo.co.kr/api/kovo/next"),true);
//var_dump($jsonnext);
$gnumcowok=$jsonnext['result'][0]['gnum'];
$gnumcewek=$jsonnext['result'][1]['gnum'];
//echo "$gnumcowok : $gnumcewek";



$json=json_decode(file_get_contents("https://api.kovo.co.kr/api/game/summary?season=020&gPart=201&gNum=$gnumcowok"),true);
//var_dump($json);
$home= $json['result']['hTeamCode'];
$away= $json['result']['aTeamCode'];
$date= $json['result']['gDate'];
echo "gNum = $gnumcowok, $team[$home] vs $team[$away] $date<br>";
//$json2= json_decode(file_get_contents("https://api.kovo.co.kr/api/game/teamRecord?season=020&gPart=201&gNum=$gamenum&hTeamCode=$home&aTeamCode=$away"),true);
$json2= json_decode(file_get_contents("https://api.kovo.co.kr/api/game/playerRecord?season=020&gPart=201&gNum=$gnumcowok&hTeamCode=$home&aTeamCode=$away"),true);
$homerec=$json2['result']['home']['playerRecord'];
//var_dump($json2);
echo $team[$home].": ";
for($i=0;$i<3;$i++){
	$pNum=$homerec[$i]['pNum'];
	$pName=$homerec[$i]['pName'];
	$position=$homerec[$i]['position'];
	$point=$homerec[$i]['point'];
	$atsp=$homerec[$i]['atsp'];
	echo "$pNum($position) $point poin($atsp%)";
	if ($i!==2){echo ", ";}
}
echo " ||<br> ";
$awayrec=$json2['result']['away']['playerRecord'];
echo $team[$away].": ";
for($i=0;$i<3;$i++){
	$pNum=$awayrec[$i]['pNum'];
	$pName=$awayrec[$i]['pName'];
	$position=$awayrec[$i]['position'];
	$point=$awayrec[$i]['point'];
	$atsp=$awayrec[$i]['atsp'];
	echo "$pNum($position) $point poin($atsp%)";
	if ($i!==2){echo ", ";}
}

echo "<pre>";
//var_dump($json);
