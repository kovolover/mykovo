<?php
 include("web.php");
 echo $header;
 ?>
<script>
	function play(sumber){
      var video = document.getElementById('video');
	  video.setAttribute("src",sumber);
	  video.setAttribute("controls", "controls");
	  video.autoplay;
	}
</script>
<h2>DOWNLOAD LINK RECORD 1080p (video)</h2>
contoh link: https://m.sports.naver.com/video/1130068<br>

<form method=post>
<input type="text" name="link" size=60><input type="submit" value="Generate">
</form>
<pre>
<?php
error_reporting(0);
$link=$_POST['link'];
//echo $link;
if(isset($link) && $link !==""){
$belah=explode("/",$link);
$id=$belah[4];
$json=json_decode(file_get_contents("https://api-gw.sports.naver.com/video/$id?fields=all"),true);
//var_dump($json);
//https://api-gw.sports.naver.com/video/1131947?fields=all
$vid= $json['result']['masterVid'];
$key= $json['result']['inkey'];
$json2=json_decode(file_get_contents("https://apis.naver.com/rmcnmv/rmcnmv/vod/play/v2.0/$vid?key=$key"),true);
$jml=count($json2['videos']['list']);
for($i=0;$i<$jml;$i++){
$res= $json2['videos']['list'][$i]['encodingOption']['name'];
$mp4= $json2['videos']['list'][$i]['source'];
//echo "$res : <a href='$mp4'>$mp4</a>\n";
$ukuran=remote_filesize($mp4);
$ukuran2=formatBytes($ukuran);
echo "<button style='width:100px' onclick='play(\"$mp4\");'>Play $res</button> <a href='$mp4'>Download $ukuran2</a><br>";
//9.936.015.522
}
$durasi=$json['result']['playTime'];
echo "<br>Durasi: $durasi<br>";

echo '<br><video width=100% id="video" controls autoplay></video><pre>';
//var_dump($json);
//var_dump($json2);
}


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

echo $footer;
