 <?php
 include("web.php");
 echo $header;
 ?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 5px;
  padding-right: 5px;
}
</style>
<script>
	function stream(sumber){
      var video = document.getElementById('video');
	  video.setAttribute("src",sumber);
	  video.setAttribute("controls", "controls");
	  video.autoplay;
	}
	function playtime(time({
	var video = document.getElementById('video');
	video.currentTime = time;
	}
</script>
<h2>Naver Volleyball Data</h2><br>
<?php
error_reporting(0);
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
?>
<form action="?">
  <label for="Team">Pilih Team:</label>
  <select id="team" name="tim">
<?php
for($i=2001;$i<2008;$i++){
echo "<option value=$i>$team[$i]</option>";
}
?>
<input type="submit" value="Submit">
</form><p>



<?php
$tim=$_GET['tim'];
if(isset($tim) && $tim !==""){
	$json=json_decode(file_get_contents("https://api.kovo.co.kr/api/game/vleague/schedule?season=020&tCode=$tim"),true);
	$jumlah=count($json['result']);
	echo "<table>";
	echo "<tr><th>Tanggal</th><th>Num</th><th>Home</th><th>Score<th>Away</th></tr>";
	for($a=0;$a<$jumlah;$a++){
		$num=$json['result'][$a]['num'];
		$date=$json['result'][$a]['date'];
		$home=$team[$json['result'][$a]['homeTeamCode']];
		$away=$team[$json['result'][$a]['awayTeamCode']];
		$homepoint=$json['result'][$a]['homeSetPoint'];
		$awaypoint=$json['result'][$a]['awaySetPoint'];
		$round=$json['result'][$a]['num'];
		$hgambar="<img src=https://sports-phinf.pstatic.net/team/wkovo/default/".$json['result'][$a]['homeTeamCode'].".png width=20 height=20>";
		$agambar="<img src=https://sports-phinf.pstatic.net/team/wkovo/default/".$json['result'][$a]['awayTeamCode'].".png width=20 height=20>";
		echo "<tr><td>$date</td><td><a href=?gnum=$num>$num</td><td>$home $hgambar</td><td>$homepoint - $awaypoint</td><td>$away $agambar</td></tr>";
	}
	echo "</table><pre>";
	//var_dump($json);
}


$gnum=$_GET['gnum'];
if(isset($gnum) && $gnum !==""){
	$jsong=json_decode(file_get_contents("https://api.kovo.co.kr/api/game/summary?season=020&gPart=201&gNum=$gnum"),true);



$homeg= $jsong['result']['hTeamCode'];
$awayg= $jsong['result']['aTeamCode'];
$dateg= $jsong['result']['gDate'];
$ganti=str_replace("-","",$dateg);
$games=$ganti."020F".$gnum;
$linknaver="?game=".$games;
echo "<b><a href=$linknaver>$dateg</a> <a href=https://m.sports.naver.com/game/$games/video target=_blank>video</a></b><br>";
echo "<table><tr><th>Team<th>score<th>1<th>2<th>3<th>4<th>5";
$hset=$jsong['result']['hSetPoint'];$h1=$jsong['result']['hSet1Point'];$h2=$jsong['result']['hSet2Point'];$h3=$jsong['result']['hSet3Point'];$h4=$jsong['result']['hSet4Point'];$h5=$jsong['result']['hSet5Point'];
echo "<tr><td>$team[$homeg]<td>$hset<td>$h1<td>$h2<td>$h3<td>$h4<td>$h5";
$aset=$jsong['result']['aSetPoint'];$a1=$jsong['result']['aSet1Point'];$a2=$jsong['result']['aSet2Point'];$a3=$jsong['result']['aSet3Point'];$a4=$jsong['result']['aSet4Point'];$a5=$jsong['result']['aSet5Point'];
echo "<tr><td>$team[$awayg]<td>$aset<td>$a1<td>$a2<td>$a3<td>$a4<td>$a5";
echo "</table><p>";

//echo "gNum = $gnum, $team[$homeg] vs $team[$awayg] $dateg<br>";
//$json2= json_decode(file_get_contents("https://api.kovo.co.kr/api/game/teamRecord?season=020&gPart=201&gNum=$gamenum&hTeamCode=$home&aTeamCode=$away"),true);
$json2= json_decode(file_get_contents("https://api.kovo.co.kr/api/game/playerRecord?season=020&gPart=201&gNum=$gnum&hTeamCode=$homeg&aTeamCode=$awayg"),true);
$homerec=$json2['result']['home']['playerRecord'];
$jml=count($homerec);
//var_dump($json2);
//echo "<table style='border:none'><tr style='border:none'><td style='border:none;text-align: center'><b>".$team[$homeg]."</b><br>";
echo "<b>".$team[$homeg]."</b><br>";
echo "<table><tr><th>Nama<th>No<th>Role<th>Poin<th>%<th>attack<th>block<th>ace<th>Error";
for($i=0;$i<$jml;$i++){
	$pNum=$homerec[$i]['pNum'];
	$pName=$homerec[$i]['pName'];
	$position=$homerec[$i]['position'];
	$point=$homerec[$i]['point'];
	$atsp=$homerec[$i]['atsp'];
	$attack=$homerec[$i]['ats'];
	$block=$homerec[$i]['bs'];
	$ace=$homerec[$i]['ss'];
	$nama=$pemain[$homerec[$i]['pCode']];
	$error=$homerec[$i]['err'];
	echo "<tr><td>$nama<td>$pNum<td>($position)<td><a href='?game=$games&player=$pNum'>$point poin</a><td>($atsp%)<td>$attack attack<td>$block block<td>$ace ace<td>$error error";
	//if ($i!==($jml-1)){echo "<br>";}
}
echo "</table><p>";
$awayrec=$json2['result']['away']['playerRecord'];
$jml=count($homerec);
//echo "<td style='border:none;text-align: center'><b>".$team[$awayg]."</b><br>";
echo "<b>".$team[$awayg]."</b><br>";
echo "<table><tr><th>Nama<th>No<th>Role<th>Poin<th>%<th>attack<th>block<th>ace<th>Error";
for($i=0;$i<$jml;$i++){
	$pNum=$awayrec[$i]['pNum'];
	$pName=$awayrec[$i]['pName'];
	$position=$awayrec[$i]['position'];
	$point=$awayrec[$i]['point'];
	$atsp=$awayrec[$i]['atsp'];
	$attack=$awayrec[$i]['ats'];
	$block=$awayrec[$i]['bs'];
	$ace=$awayrec[$i]['ss'];
	$nama=$pemain[$awayrec[$i]['pCode']];
	$error=$awayrec[$i]['err'];
	echo "<tr><td>$nama<td>$pNum<td>($position)<td><a href='?game=$games&player=$pNum'>$point poin</a><td>($atsp%)<td>$attack attack<td>$block block<td>$ace ace<td>$error error";
}
echo "</table></table><p>";
echo "<pre>";
//var_dump($jsong);
//var_dump($json2);	
}


$game=$_GET['game'];
$player=$_GET['player'];
$hom=$_GET['hom'];
if(isset($game) && $game !==""){
//$jsoninfo=json_decode(file_get_contents("https://api-gw.sports.naver.com/common-poll/question/game/20231018020F8/info"),true);
$jsoninfo=json_decode(file_get_contents("https://api-gw.sports.naver.com/schedule/games/$game"),true);
$homeset=$jsoninfo['result']['game']['homeTeamScore'];
$awayset=$jsoninfo['result']['game']['awayTeamScore'];
$set=$homeset+$awayset;
//$set=$jsoninfo['result']['textRelayData']['latestSet'];
//echo "<pre>";
//var_dump($jsoninfo);
echo "<b>".$team[$jsoninfo['result']['game']['homeTeamCode']]." $homeset - $awayset ".$team[$jsoninfo['result']['game']['awayTeamCode']]."<b><br>";
echo $jsoninfo['result']['game']['gameDate']." Round ".$jsoninfo['result']['game']['round'];
echo "<table><tr><th>Team<th>Set 1<th>Set 2<th>Set 3<th>Set 4<th>Set 5";
echo "<tr><td>".$team[$jsoninfo['result']['game']['homeTeamCode']];
for($c=0;$c<count($jsoninfo['result']['game']['currentScoreBySet']);$c++){
	echo "<td>".$jsoninfo['result']['game']['currentScoreBySet'][$c]['homeScore'];
}
echo "<tr><td>".$team[$jsoninfo['result']['game']['awayTeamCode']];
for($c=0;$c<count($jsoninfo['result']['game']['currentScoreBySet']);$c++){
	echo "<td>".$jsoninfo['result']['game']['currentScoreBySet'][$c]['awayScore'];
}
echo "</table><p>";


$total=0;
//https://api-gw.sports.naver.com/schedule/games/20240204020F180/relay?set=5
//https://api-gw.sports.naver.com/schedule/games/20231018020F8/relay
for($s=1;$s<=$set;$s++){
$jsonrelay=json_decode(file_get_contents("https://api-gw.sports.naver.com/schedule/games/$game/relay?set=$s"),true);
//var_dump($jsonrelay);
$textRelays=$jsonrelay['result']['textRelayData']['textRelays'];
$jumlah=count($textRelays);
echo "<b>SET $s</b><br><table><tr><th>No<th>Detik<th>No punggung<th>H/A<th>Action<th>Home score<th>Away Score";
for($i=$jumlah-1;$i>=0;$i--){
	$score=$textRelays[$i]['textType'];
	$back=$textRelays[$i]['backNumber'];
	$action=$textRelays[$i]['action'];
	$homeScore=$textRelays[$i]['homeScore'];
	$awayScore=$textRelays[$i]['awayScore'];
	$vodEventSeconds=$textRelays[$i]['vodEventSeconds'];
	if(isset($player) && $player !==""){
	if($score=="SCORE" && $back==$player){
				if($textRelays[$i]['home']==true){$backa= "home";}else{$backa= "<font color=red>away</font>";}
				echo "<tr><td>$i<td>$vodEventSeconds<td>$back<td>$backa<td>$action<td>$homeScore<td>$awayScore";
		$total =$total+1;
	}
	}else{
		if($score=="SCORE"){
				if($textRelays[$i]['home']==true){$backa="home";}else{$backa= "<font color=red>away</font>";}
				echo "<tr><td>$i<td>$vodEventSeconds<td><a href=?game=$game&player=$back>$back<td>$backa</a><td>$action<td>$homeScore<td>$awayScore";
		$total =$total+1;
	}
	}
}
echo "</table><br>";
//var_dump($jsonrelay);
}
echo "Total Score: ".$total;
}

//VV=floating server ace
//AW Back Attack
//AA Open Spike
//VS jump serve
//AC Quick open spike
//BB Blocking
//AT spike juga
echo $footer;
