<head>
  <meta http-equiv="refresh" content="5">
</head>


<?php
error_reporting(0);

$date=date('Y-m-d');
$jsondate=json_decode(file_get_contents("https://api.kovo.co.kr/api/ticket/kovo/ticket/schedule?date=$date"),true);
$tgl=date('Ymd');
$cowok=$tgl."020M".$jsondate['result'][0]['gameNumber'];
$cewek=$tgl."020F".$jsondate['result'][1]['gameNumber'];
//echo $gnumcowok." ".$gnumcewek;
//var_dump($jsondate);

//$cewek="20240113020F158";
//$cowok="20240105020M143";
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

$json=json_decode(file_get_contents("https://api-gw.sports.naver.com/schedule/games/$cewek"),true);
//http://cobacoba.free.nf/korea2.php?id=20231208020F96
$homeTeamName=$team[($json['result']['game']['homeTeamCode'])];
$awayTeamName=$team[($json['result']['game']['awayTeamCode'])];
echo "$homeTeamName vs $awayTeamName<br>";
$jsona=json_decode(file_get_contents("https://api-gw.sports.naver.com/schedule/games/$cewek/relay"),true);
$realscore="SET ".$jsona['result']['textRelayData']['lineup']['set']." ".$jsona['result']['textRelayData']['textRelays'][0]['homeScore']." : ".$jsona['result']['textRelayData']['textRelays'][0]['awayScore'];
$skor = $json['result']['game']['currentScoreBySet'];
$liveset=$jsona['result']['textRelayData']['lineup']['set'];
//var_dump($skor);
for($i=0;$i<count($skor);$i++){
	$set=$skor[$i]['set'];
	if($set == $liveset){$home="<b>".$jsona['result']['textRelayData']['textRelays'][0]['homeScore']."</b>";$away="<b>".$jsona['result']['textRelayData']['textRelays'][0]['awayScore']."</b>";} else{$home=$skor[$i]['homeScore'];$away=$skor[$i]['awayScore'];}
	echo "Set $set : $home : $away<br>";
}
//exit();
echo "<p>";
$json2=json_decode(file_get_contents("https://api-gw.sports.naver.com/schedule/games/$cowok"),true);
//http://cobacoba.free.nf/korea2.php?id=20231208020M95
$homeTeamName2=$team[($json2['result']['game']['homeTeamCode'])];
$awayTeamName2=$team[($json2['result']['game']['awayTeamCode'])];
echo "$homeTeamName2 vs $awayTeamName2<br>";
$jsonb=json_decode(file_get_contents("https://api-gw.sports.naver.com/schedule/games/$cowok/relay"),true);
$realscoreb="SET ".$jsonb['result']['textRelayData']['lineup']['set']." ".$jsonb['result']['textRelayData']['textRelays'][0]['homeScore']." : ".$jsonb['result']['textRelayData']['textRelays'][0]['awayScore'];
$skor2 = $json2['result']['game']['currentScoreBySet'];
$liveset2=$jsonb['result']['textRelayData']['lineup']['set'];

for($i=0;$i<count($skor2);$i++){
	$set2=$skor2[$i]['set'];
	if($set2 == $liveset2){$home2="<b>".$jsonb['result']['textRelayData']['textRelays'][0]['homeScore']."</b>";$away2="<b>".$jsonb['result']['textRelayData']['textRelays'][0]['awayScore']."</b>";} else{$home2=$skor2[$i]['homeScore'];$away2=$skor2[$i]['awayScore'];}
	
	echo "Set $set2 : $home2 : $away2<br>";
}
//echo "<b>$realscoreb</b>";
//echo "<pre>";
//var_dump($jsona);
function antara($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
?>