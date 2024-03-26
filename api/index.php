 <?php
 include("web.php");
 echo $header;
 ?>
<?php
//$footer='<p><script async src="https://telegram.org/js/telegram-widget.js?22" data-telegram-discussion="livesports_ID/389" data-comments-limit="5" data-color="29B127" data-dark-color="72E350"></script>'.$footer;
?>
<script src="https://hlsjs.video-dev.org/dist/hls.js"></script>
<script>
	function stream(sumber){
      var video = document.getElementById('video');
      var hls = new Hls({debug: true,});
      hls.loadSource(sumber);
        hls.attachMedia(video);
        hls.on(Hls.Events.MEDIA_ATTACHED, function () {
          video.muted = false;
          video.play();
        });
	}
</script>
<h2>NAVER Live</h2>
Note: Waktu adalah jam Korea (WIB +2)<p>
<?php
error_reporting(0);
//$chatbox='<p><iframe src="https://www5.cbox.ws/box/?boxid=949122&boxtag=tS3vT6" width="100%" height="450" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>';
$link = "https://api-gw.sports.naver.com/cms/templates/mobile_sports_home";
$json=json_decode(file_get_contents($link),true);
//var_dump($json);
$jumlah=count($json['result']['templates'][0]['json']['liveBoxList']);
for($i=0;$i<$jumlah;$i++)
{
    $judul=$json['result']['templates'][0]['json']['liveBoxList'][$i]['title'];
    $kategori=$json['result']['templates'][0]['json']['liveBoxList'][$i]['superCategoryId'];
    $gameid=$json['result']['templates'][0]['json']['liveBoxList'][$i]['gameId'];
    $jam=$json['result']['templates'][0]['json']['liveBoxList'][$i]['gameTimeHHmm'];
    //echo "<a href='?id=$gameid'>$judul - $kategori - $jam </a><br>";
	$onair=$json['result']['templates'][0]['json']['liveBoxList'][$i]['isOnAirTv'];
	if($onair =="Y" || $onair =="N"){
    echo "<a href='?id=$gameid'>$judul - $kategori - $jam - $onair</a><br>";
    }
    
    
}
echo "<p>";
$id=$_GET['id'];
if(isset($id) && $id !==""){
   // echo "<h2>$id</h2>";
    
    $jsona=json_decode(file_get_contents("https://api-gw.sports.naver.com/schedule/games/$id"),true);
    $liveid = $jsona['result']['game']['liveList'][0]['liveId'];
    $thumbhome=$jsona['result']['game']['homeTeamEmblemUrl'];
	$thumbaway=$jsona['result']['game']['awayTeamEmblemUrl'];
	if($thumbhome !== NULL){echo "<img src='$thumbhome' width=150 height=150>  <img src='$thumbaway' width=150 height=150><br>";}
	//var_dump($jsona);
	
    //echo "$id \n";
    
    //echo "$liveid \n";
    $jsonl=json_decode(file_get_contents("https://proxy-gateway.sports.naver.com/livecloud/lives/$liveid/playback?countryCode=KR&devt=HTML5_MO"),true);
    //var_dump($jsonl);
    $m3u8= $jsonl['media'][0]['path'];
    $jadwal= $jsonl['live']['start'];
    //echo "m3u8 = $m3u8 \n";
    if($m3u8 == ""){
        if($jadwal==""){echo "tidak ada live video, <a href='https://m.sports.naver.com/game/$id' target='_blank'>livescore</a> saja";echo $footer;exit;}
        else{echo "live belum mulai, tunggu $jadwal waktu Korea";echo $footer;;exit;}
    }
    $data=file_get_contents($m3u8);
    
    $baris=explode("\n",$data);
	echo "<table><tr>";
    for ($a=0;$a<count($baris);$a++){
    if (ada($baris[$a],"m3u8")){
    $depan=antara($m3u8,"https","playlist.m3u8");
    $belakang=antara($baris[$a],"hdntl","m3u8");
    //echo $data;
    $src= "https".$depan."hdntl".$belakang."m3u8";
    $res=antara($src,'chunklist_','.').'p';
    echo "<td><button onclick=\"stream('$src');\">Play $res</button><br><a href='$src'>link m3u8</a> ";
    }
	
}
echo "</table>";
echo '<p><video width=100% id="video" controls></video>';
//echo $footer;
//var_dump($jsonl);
//echo $data;
}
echo $footer;

function antara($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
function curlget($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
$data=curl_exec($ch);
curl_close($ch);
return $data;
}
function ada($haystack, $needle) {
return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}
?>
