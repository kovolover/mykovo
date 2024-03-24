<?php

$url=(parse_url($_SERVER['REQUEST_URI'])['path']);
if($url=="/naver.php"){$title="Naver Sport Relay Downloader (720p)";}
if($url=="/naver2.php"){$title="Naver Sport Video Downloader (1080p)";}
if($url=="/klasemen.php"){$title="Klasemen Korean VLeague";}
if($url=="/player.php"){$title="Ranking Player Women's Korean VLeague";}
if($url=="/hasil.php"){$title="Hasil Pertandingan Korean VLeague";}
if($url=="/"){$title="Nonton Live Streaming Naver Sport";}
if($url=="/team.php"){$title="Team";}


$header='<!DOCTYPE html>
<html>
<head>
<title>'.$title.'</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.menu {
  float: left;
  width: 20%;
  text-align: center;
}

.menu a {
  background-color: #e5e5e5;
  padding: 8px;
  margin-top: 7px;
  display: block;
  width: 100%;
  color: black;
}

.main {
  float: left;
  width: 60%;
  padding: 0 20px;
  font-size: 12px;
}

.right {
  background-color: #e5e5e5;
  float: left;
  width: 20%;
  padding: 15px;
  margin-top: 7px;
  text-align: center;
}

@media only screen and (max-width: 620px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width: 100%;
  }
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 5px;
  padding-right: 5px;
  font-size: 12px;
}
</style>

</head>
<body style="font-family:Verdana;">

<div style="background-color:#e5e511;padding:15px;text-align:center;">
  <h1>WELCOME</h1>
</div>

<div style="overflow:auto">
  <div class="menu">
    <a href="/">Naver Sport Live</a>
    <a href="/naver.php">Relay Video Downloader</a>
    <a href="naver2.php">Naver Sport Video Downloader</a>
    <a href="klasemen.php">Klasemen Kovo</a>
    <a href="player.php">Player Rank</a>
    <a href="hasil.php">Hasil Pertandingan</a>
    <a href="https://m.sports.naver.com/volleyball/schedule/index" target=_blank>Naver Volley</a>
  </div>

  <div class="main">';
 //   <h2>Lorum Ipsum</h2>
 //   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
$footer='  </div>

  <div class="right">
    <h2>CBox</h2>
    <p><iframe src="https://www5.cbox.ws/box/?boxid=949122&boxtag=tS3vT6" width="100%" height="450" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe></p>
  </div>
</div>

<div style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">Powered by PHP</div>

</body>
</html>
';
?>
