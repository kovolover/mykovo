 <?php
 include("web.php");
 echo $header;
 ?>
<script>
	function stream(sumber){
      var video = document.getElementById('video');
	  video.setAttribute("src",sumber);
	  video.setAttribute("controls", "controls");
	  video.autoplay;
	}
</script>
<style>
a{text-decoration: none;color:blue}
</style>
<h2>Hasil Pertandingan</h2>
<?php
error_reporting(0);

$gameid=$_GET['game'];
if(isset($gameid) && $gameid !==""){
$json=json_decode(file_get_contents("https://api-gw.sports.naver.com/video/game/$gameid/fullvideo?fields=all"),true);
//var_dump($json);
$vid= $json['result']['masterVid'];
$key= $json['result']['inkey'];

$json2=json_decode(file_get_contents("https://apis.naver.com/rmcnmv/rmcnmv/vod/play/v2.0/$vid?key=$key"),true);
$jml = count($json2['videos']['list']);
for($i=0;$i<$jml;$i++){
$res = $json2['videos']['list'][$i]['encodingOption']['name'];
$a=$json2['videos']['list'][$i]['source'];
//echo "$res : <a href=$a>$a</a><br>";
echo "<button style='width:100px' onclick=\"stream('$a');\">Play $res</button> <a href='$a'>Download $res</a><br>";
}

$cover=$json2['meta']['cover']['source'];
echo '<br><div><video width=100% id="video" poster="'.$cover.'" controls autoplay></video><div id="wm"></div></div><p>';
//var_dump($json2);
}

$fullhd=$_GET['fhd'];
if(isset($fullhd) && $fullhd!==""){
	$json=json_decode(file_get_contents("https://api-gw.sports.naver.com/video/game/$fullhd"),true);
	//var_dump($json);
	$list=$json['result']['vodList'];
	$jumlah=count($list);
	for($i=0;$i<$jumlah;$i++){
		$fileSize=$list[$i]['fileSize'];
		if($fileSize > 1000000000){
		$id=$list[$i]['sportsVideoId'];
		//echo $list[$i]['sportsVideoId']." : ".$fileSize."<p>";
		$jsonv=json_decode(file_get_contents("https://api-gw.sports.naver.com/video/$id?fields=all"),true);
		$vid= $jsonv['result']['masterVid'];
		$key= $jsonv['result']['inkey'];
		$json2=json_decode(file_get_contents("https://apis.naver.com/rmcnmv/rmcnmv/vod/play/v2.0/$vid?key=$key"),true);
		$jml=count($json2['videos']['list']);
		for($j=0;$j<$jml;$j++){
		$res= $json2['videos']['list'][$j]['encodingOption']['name'];
		$mp4= $json2['videos']['list'][$j]['source'];
		$ukuran=remote_filesize($mp4);
		$ukuran2=formatBytes($ukuran);
		echo "<button style='width:100px' onclick='stream(\"$mp4\");'>Play $res</button> <a href='$mp4'>Download $ukuran2</a><br>";
		}
		$durasi=$jsonv['result']['playTime'];
		$cover=$json2['meta']['cover']['source'];
		echo "<br>Durasi: $durasi<br>";

		echo '<br><div><video width=100% id="video" poster="'.$cover.'" controls autoplay></video>
		<div id="wm"></div></div>';
		//var_dump($json2);
	}
}
	
	
}

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
"1009" => "Woori Won",
"1094" => "PO Winner f",
"1091" => "1st Reg f",
"2094" => "PO winner m",
"2091" => "1st Reg m",
"1096" => "준PO승 f",
"2096" => "준PO승 m",
"2095" => "4th Reg m",
"1093" => "3rd Reg f",
"1092" => "2ns Reg m"
);
//$jsonall=json_decode(file_get_contents("jadwal.json"),true);
$jsonall=json_decode(file_get_contents("https://api.kovo.co.kr/api/game/vleague/schedule?season=020"),true);
$jumlah=count($jsonall['result']);
echo "<table>";
	echo "<tr><th>Tanggal / Jam</th><th>Num</th><th>Home</th><th>Score<th>Away</th><th>Video<th>Stat";
	for($a=$jumlah;$a>=0;$a--){
		$num=$jsonall['result'][$a]['num'];
		$date=$jsonall['result'][$a]['date'];
		$time=$jsonall['result'][$a]['time'];
	    $home=$team[$jsonall['result'][$a]['homeTeamCode']];
		$away=$team[$jsonall['result'][$a]['awayTeamCode']];
		$homepoint=$jsonall['result'][$a]['homeSetPoint'];
		$awaypoint=$jsonall['result'][$a]['awaySetPoint'];
		$round=$jsonall['result'][$a]['num'];
		$dateg= $jsonall['result'][$a]['date'];
		$ganti=str_replace("-","",$dateg);
		$gender= $jsong['result']['gender'];
		if($num % 2==1){$kodegender="020M";}else{$kodegender="020F";};
		$games=$ganti.$kodegender.$num;
		$nonton="?game=".$games;
		$fhd="?fhd=".$games;
		//if($home=NULL){$home=$jsonall['result'][$a]['homeTeam'];$away==$jsonall['result'][$a]['awayTeam'];}
		if($homepoint ==0 && $awaypoint ==0){}else{
		echo "<tr><td>$date $time</td><td>$num</td><td>$home</td><td>$homepoint - $awaypoint</td><td>$away</td><td><a href=$nonton>720p</a> <a href=$fhd>1080p</a><td><a href=stat.php?num=$num>stat</a></tr>";
		}
	}
	echo "</table><pre>";

//var_dump($jsonall);
echo $footer;

function remote_filesize($url) {
    static $regex = '/^Content-Length: *+\K\d++$/im';
    if (!$fp = @fopen($url, 'rb')) {
        return false;
    }
    if (
        isset($http_response_header) &&
        preg_match($regex, implode("\n", $http_response_header), $matches)
    ) {
        return (int)$matches[0];
    }
    return strlen(stream_get_contents($fp));
}
function formatBytes($bytes, $precision = 2) {
    $kilobyte = 1024;
    $megabyte = $kilobyte * 1024;
    $gigabyte = $megabyte * 1024;
    
    if ($bytes < $kilobyte) {
        return $bytes . ' B';
    } elseif ($bytes < $megabyte) {
        return round($bytes / $kilobyte, $precision) . ' KB';
    } elseif ($bytes < $gigabyte) {
        return round($bytes / $megabyte, $precision) . ' MB';
    } else {
        return round($bytes / $gigabyte, $precision) . ' GB';
    }
}
