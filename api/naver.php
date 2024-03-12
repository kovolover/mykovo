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
<h2>DOWNLOAD LINK RECORD 720p (relay)</h2>
Contoh: https://m.sports.naver.com/game/20240101020F138/relay<br>
<form method=post>
<input type="text" name="link" size=60><input type="submit" value="Generate">
</form>
<pre>
<?php
error_reporting(0);
$link=$_POST['link'];
if(isset($link) && $link !==""){
$belah=explode("/",$link);
$id=$belah[4];
$json=json_decode(file_get_contents("https://api-gw.sports.naver.com/video/game/$id/fullvideo?fields=all"),true);
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
echo '<br><video width=100% id="video" poster="'.$cover.'" controls autoplay></video><pre>';
//var_dump($json2);
}
echo $footer;
