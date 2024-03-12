<head>
  <meta http-equiv="refresh" content="20000">
  <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 5px;
  padding-right: 5px;
  vertical-align: top;
}</style>
</head>
Player Record<br>
<?php
//mega atk try 48, success 22, blocked 2, error 3 = atk efficiency (22-2-3)/49= 38%
//contoj mega pas lawan rs kmaren. atk try 48, success 22, blocked 2, error 3 = atk efficiency (22-2-3)/49= 38%
//jia atk try 52, success 19, blocked 3, error 6 = atk effiiciency (19-3-6)/52= 19%

error_reporting(0);
$num=$_GET['num'];

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

$pemain = array(
"1000344" => "Megawati",
"1000343" => "Gia",
"0002228" => "HoYoung",
"0001385" => "SoYoung",
"0002117" => "EunJin",
"1000170" => "Moma",
"0000741" => "HyoJin",
"1000334" => "Wipawee",
"0002214" => "DaHyeon",
"0002106" => "Jiyun");


$jsonnext=json_decode(file_get_contents("https://api.kovo.co.kr/api/kovo/next"),true);
//var_dump($jsonnext);
$gnumcowok=$jsonnext['result'][0]['gnum'];
$gnumcewek=$jsonnext['result'][1]['gnum'];
//$gnumcewek="192";
//echo "$gnumcowok : $gnumcewek";
if(isset($num) && $num !==""){$gnumcewek=$num;}


$json=json_decode(file_get_contents("https://api.kovo.co.kr/api/game/summary?season=020&gPart=201&gNum=$gnumcewek"),true);
//var_dump($json);
$home= $json['result']['hTeamCode'];
$away= $json['result']['aTeamCode'];
$date= $json['result']['gDate'];
echo "gNum = $gnumcewek, $team[$home] vs $team[$away] $date<br>";
//$json2= json_decode(file_get_contents("https://api.kovo.co.kr/api/game/teamRecord?season=020&gPart=201&gNum=$gamenum&hTeamCode=$home&aTeamCode=$away"),true);
$json2= json_decode(file_get_contents("https://api.kovo.co.kr/api/game/playerRecord?season=020&gPart=201&gNum=$gnumcewek&hTeamCode=$home&aTeamCode=$away"),true);
$homerec=$json2['result']['home']['playerRecord'];
//var_dump($json2);
$jumlah=count($homerec);
echo "<table><tr><td>";
echo $team[$home].":<br>";
$hteamattack=0;
$hteamblock=0;
$hteamace=0;
$hteamerror=0;
for($i=0;$i<$jumlah;$i++){
	$pNum=$homerec[$i]['pNum'];
	$pName=$homerec[$i]['pName'];
	$position=$homerec[$i]['position'];
	$point=$homerec[$i]['point'];
	$atsp=$homerec[$i]['atsp'];
	$attack=$homerec[$i]['ats'];$hteamattack=$hteamattack+$attack;
	$atf=$homerec[$i]['atf'];
	$ate=$homerec[$i]['ate'];
	$att=$homerec[$i]['att'];
	$block=$homerec[$i]['bs'];$hteamblock=$hteamblock+$block;
	$ace=$homerec[$i]['ss'];$hteamace=$hteamace+$ace;
	$nama=$pemain[$homerec[$i]['pCode']];
	$error=$homerec[$i]['err'];$hteamerror=$hteamerror+$error;
	echo "$nama $pNum($position) $point poin($atsp%), attack($att-$attack-$atf-$ate), $block block, $ace ace, $error error";
	if ($i!==($jumlah-1)){echo "<br>";}
}
echo "<td>";
$awayrec=$json2['result']['away']['playerRecord'];
$jumlaha=count($awayrec);
echo $team[$away]."<br>";
$ateamattack=0;
$ateamblock=0;
$ateamace=0;
$ateamerror=0;
for($i=0;$i<$jumlaha;$i++){
	$pNum=$awayrec[$i]['pNum'];
	$pName=$awayrec[$i]['pName'];
	$position=$awayrec[$i]['position'];
	$point=$awayrec[$i]['point'];
	$atsp=$awayrec[$i]['atsp'];
	$attack=$awayrec[$i]['ats'];$ateamattack=$ateamattack+$attack;
	$atf=$awayrec[$i]['atf'];
	$att=$awayrec[$i]['att'];
	$ate=$awayrec[$i]['ate'];
	$block=$awayrec[$i]['bs'];$ateamblock=$ateamblock+$block;
	$ace=$awayrec[$i]['ss'];$ateamace=$ateamace+$ace;
	$nama=$pemain[$awayrec[$i]['pCode']];
	$error=$awayrec[$i]['err'];$ateamerror=$ateamerror+$error;
	echo "$nama $pNum($position) $point poin($atsp%), attack($att-$attack-$atf-$ate), $block block, $ace ace, $error error";
	if ($i!==($jumlaha-1)){echo "<br>";}
}

echo "</table><p>";
echo $team[$home].": "."Att $hteamattack, Blk $hteamblock, Ace $hteamace, Err $hteamerror || <br> ";
echo $team[$away].": "."Att $ateamattack, Blk $ateamblock, Ace $ateamace, Err $ateamerror <p>";
echo "<pre>";
var_dump($json2);