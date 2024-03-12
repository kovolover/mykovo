 <?php
 include("web.php");
 echo $header;
 echo "<h2>Player Rank berdasarkan poin</h2>";
 ?>


<?php
$pemain = array(
"1000345" => "Silva",
"1000336" => "Abercrombie",
"1000332" => "Bukirich",
"1000170" => "Moma",
"1000153" => "Yasmine",
"0000463" => "KYK",
"1000344" => "Megawati",
"1000343" => "Gia",
"1000158" => "Jelena",
"0000741" => "HyoJin",
"0001704" => "SoHwi",
"0001212" => "JeongAh",
"0001200" => "Pyo SeungJu",
"0000759" => "Bae Yoona",
"1000322" => "Reina",
"1000333" => "Tanacha",
"0002228" => "HoYoung",
"1000334" => "Wipawee",
"0000841" => "MinKyoung",
"1000044" => "Min Choi",
"0002214" => "DaHyeon",
"0002106" => "Jiyun",
"0001853" => "SeoYeun",
"0001700" => "-",
"1000319" => "-",
"0002117" => "EunJin",
"0002130" => "-",
"0001385" => "SoYoung",
"1000312" => "-",
"0001272" => "-");

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
$data=file_get_contents("https://api.kovo.co.kr/api/stats/playerTotalRecord?sSeason=020&sRound=1&eSeason=020&eRound=1&sGPart=201&eGPart=203&sPart=2&part=point");
$json=json_decode($data,true)['result'];
echo "<table><tr><th>No<th>Player<th>Team<th>Posisi<th>Poin<th>Attack<th>Block<th>Serve";
//$jumlah=count($json);
for($i=0;$i<20;$i++){
	$peringkat = $i+1;
	$pCode=$json[$i]['pCode'];
	$player=$pemain[$pCode];
	$pPosition=$json[$i]['pPosition'];
	$teamn=$team[$json[$i]["seasonData"][0]['tCode']];
	$point=$json[$i]["seasonData"][0]['point'];
	$attack=$json[$i]["seasonData"][0]['attack'];
	$block=$json[$i]["seasonData"][0]['block'];
	$serve=$json[$i]["seasonData"][0]['serve'];
	$gambar="<img src='https://sports-phinf.pstatic.net/team/wkovo/default/".$json[$i]["seasonData"][0]['tCode'].".png?type=f25_25'>";
	//echo  '"'.$pCode.'" => "",<br>';
	echo "<tr><td>$peringkat<td>$player<td>$gambar<td>$pPosition<td>$point<td>$attack<td>$block<td>$serve";
	
}
echo "</table><p><pre>";
//var_dump($json);
echo $footer;
?>
