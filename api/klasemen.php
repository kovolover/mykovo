<?php
 include("web.php");
 echo $header;
 ?>
 <h2>Klasemen KOVO</h2>
<?php
$team = array(
"2001" => "Hyundai Hillstate",
"2002" => "Ex Hi-pass",
"2003" => "Red Sparks",
"2004" => "Pink Spiders",
"2005" => "GS Caltex",
"2006" => "IBK Altos",
"2007" => "AI Peppers",
"1001" => "KAL Jumbos",
"1002" => "Bluefangs",
"1004" => "KB Stars",
"1005" => "Sky Walkers",
"1006" => "Kepco Vixtorm",
"1008" => "OK Man",
"1009" => "Woori Won");
//https://api.kovo.co.kr/api/game/vleague/teamrank?season=020&gPart=201&sPart=1
$json=json_decode(file_get_contents("https://api.kovo.co.kr/api/game/vleague/teamrank?season=020&gPart=201&sPart=1"),true);
$jumlah=count($json['result']);
for($i=0;$i<$jumlah;$i++){
	$tcode=$json['result'][$i]['tcode'];
	echo $team[$tcode]." ".$json['result'][$i]['winPoint'];
	if($i<$jumlah-1){echo ", ";}
}
echo "<p><table><tr><th>Rank<th>Team<th>Poin<th>Game<th>Menang<th>Kalah<th>Set M<th>Set K<th>Skor M<th>Skor K";
for($a=0;$a<$jumlah;$a++){
	$tcode=$json['result'][$a]['tcode'];
	$tname=$team[$tcode];
	$rank = $json['result'][$a]['rank'];
	$totalGames = $json['result'][$a]['totalGames'];
	$winPoint = $json['result'][$a]['winPoint'];
	$win = $json['result'][$a]['win'];
	$lost = $json['result'][$a]['lost'];
	$setWin = $json['result'][$a]['setWin'];
	$setLost = $json['result'][$a]['setLost'];
	$point = $json['result'][$a]['point'];
	$losePoint = $json['result'][$a]['losePoint'];
	echo "<tr><td>$rank<td>$tname<td>$winPoint<td>$totalGames<td>$win<td>$lost<td>$setWin<td>$setLost<td>$point<td>$losePoint";
//	if($a<$jumlah-1){echo ", ";}
}
echo "</table><p>";
$json2=json_decode(file_get_contents("https://api.kovo.co.kr/api/game/vleague/teamrank?season=020&gPart=201&sPart=2"),true);
$jumlah=count($json['result']);
for($i2=0;$i2<$jumlah;$i2++){
	$tcode=$json2['result'][$i2]['tcode'];
	echo $team[$tcode]." ".$json2['result'][$i2]['winPoint'];
	if($i2<$jumlah-1){echo ", ";}
}
echo "<p><table><tr><th>Rank<th>Team<th>Poin<th>Game<th>Menang<th>Kalah<th>Set M<th>Set K<th>Skor M<th>Skor K";
for($a=0;$a<$jumlah;$a++){
	$tcode=$json2['result'][$a]['tcode'];
	$tname=$team[$tcode];
	$rank = $json2['result'][$a]['rank'];
	$totalGames = $json2['result'][$a]['totalGames'];
	$winPoint = $json2['result'][$a]['winPoint'];
	$win = $json2['result'][$a]['win'];
	$lost = $json2['result'][$a]['lost'];
	$setWin = $json2['result'][$a]['setWin'];
	$setLost = $json2['result'][$a]['setLost'];
	$point = $json2['result'][$a]['point'];
	$losePoint = $json2['result'][$a]['losePoint'];
	echo "<tr><td>$rank<td>$tname<td>$winPoint<td>$totalGames<td>$win<td>$lost<td>$setWin<td>$setLost<td>$point<td>$losePoint";
//	if($a<$jumlah-1){echo ", ";}
}

echo "</table><p>";
//var_dump($json)
echo $footer;
?>
