
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 5px;
  padding-right: 5px;
  font-size:12px;
}
.blue {color: blue;}
.red {color: red;}
</style>
<?php
error_reporting(0);
$data="
1,1001,1005,2023-10-14
2,2002,2004,2023-10-14
3,1009,1002,2023-10-15
4,2001,2007,2023-10-15
5,1006,1004,2023-10-17
6,2003,2006,2023-10-17
7,1009,1005,2023-10-18
8,2001,2004,2023-10-18
9,1002,1001,2023-10-19
10,2007,2002,2023-10-19
11,1008,1006,2023-10-20
12,2005,2003,2023-10-20
13,1004,1009,2023-10-21
14,2006,2001,2023-10-21
15,1005,1002,2023-10-22
16,2004,2007,2023-10-22
17,1004,1008,2023-10-24
18,2006,2005,2023-10-24
19,1009,1001,2023-10-25
20,2001,2002,2023-10-25
21,1006,1005,2023-10-26
22,2004,2003,2023-10-26
23,1002,1008,2023-10-27
24,2007,2005,2023-10-27
25,1001,1004,2023-10-28
26,2002,2006,2023-10-28
27,1006,1009,2023-10-29
28,2003,2001,2023-10-29
29,1008,1005,2023-10-31
30,2005,2004,2023-10-31
31,1004,1002,2023-11-01
32,2006,2007,2023-11-01
33,1006,1001,2023-11-02
34,2003,2002,2023-11-02
35,1008,1009,2023-11-03
36,2005,2001,2023-11-03
37,1005,1004,2023-11-04
38,2004,2006,2023-11-04
39,1002,1006,2023-11-05
40,2007,2003,2023-11-05
41,1001,1008,2023-11-07
42,2005,2002,2023-11-07
43,1004,1005,2023-11-08
44,2006,2004,2023-11-08
45,1009,1006,2023-11-09
46,2001,2003,2023-11-09
47,1008,1002,2023-11-10
48,2005,2007,2023-11-10
49,1004,1001,2023-11-11
50,2006,2002,2023-11-11
51,1005,1009,2023-11-12
52,2004,2001,2023-11-12
53,1006,1008,2023-11-14
54,2005,2003,2023-11-14
55,1001,1002,2023-11-15
56,2002,2007,2023-11-15
57,1009,1004,2023-11-16
58,2001,2006,2023-11-16
59,1005,1008,2023-11-17
60,2004,2005,2023-11-17
61,1001,1006,2023-11-18
62,2002,2003,2023-11-18
63,1002,1004,2023-11-19
64,2007,2006,2023-11-19
65,1006,1005,2023-11-21
66,2003,2004,2023-11-21
67,1008,1001,2023-11-22
68,2005,2002,2023-11-22
69,1002,1009,2023-11-23
70,2007,2001,2023-11-23
71,1004,1006,2023-11-24
72,2006,2003,2023-11-24
73,1005,1001,2023-11-25
74,2004,2002,2023-11-25
75,1009,1008,2023-11-26
76,2001,2005,2023-11-26
77,1006,1002,2023-11-28
78,2003,2007,2023-11-28
79,1008,1004,2023-11-29
80,2005,2006,2023-11-29
81,1001,1009,2023-11-30
82,2002,2001,2023-11-30
83,1002,1005,2023-12-01
84,2007,2004,2023-12-01
85,1006,1004,2023-12-02
86,2003,2006,2023-12-02
87,1008,1009,2023-12-03
88,2005,2001,2023-12-03
89,1005,1002,2023-12-05
90,2004,2007,2023-12-05
91,1004,1008,2023-12-06
92,2006,2005,2023-12-06
93,1009,1001,2023-12-07
94,2001,2002,2023-12-07
95,1002,1006,2023-12-08
96,2007,2003,2023-12-08
97,1008,1005,2023-12-09
98,2004,2005,2023-12-09
99,1001,1004,2023-12-10
100,2002,2006,2023-12-10
101,1009,1002,2023-12-12
102,2001,2007,2023-12-12
103,1006,1001,2023-12-13
104,2003,2002,2023-12-13
105,1005,1004,2023-12-14
106,2004,2006,2023-12-14
107,1002,1008,2023-12-15
108,2007,2005,2023-12-15
109,1006,1009,2023-12-16
110,2003,2001,2023-12-16
111,1001,1005,2023-12-17
112,2002,2004,2023-12-17
113,1004,1002,2023-12-19
114,2006,2007,2023-12-19
115,1009,1005,2023-12-20
116,2004,2001,2023-12-20
117,1008,1006,2023-12-21
118,2003,2005,2023-12-21
119,1002,1001,2023-12-22
120,2007,2002,2023-12-22
121,1004,1009,2023-12-23
122,2006,2001,2023-12-23
123,1005,1006,2023-12-24
124,2004,2003,2023-12-24
125,1001,1008,2023-12-25
126,2002,2005,2023-12-25
127,1009,1004,2023-12-27
128,2006,2001,2023-12-27
129,1005,1006,2023-12-28
130,2003,2004,2023-12-28
131,1008,1001,2023-12-29
132,2002,2005,2023-12-29
133,1002,1004,2023-12-30
134,2007,2006,2023-12-30
135,1005,1009,2023-12-31
136,2004,2001,2023-12-31
137,1001,1006,2024-01-01
138,2002,2003,2024-01-01
139,1008,1002,2024-01-02
140,2005,2007,2024-01-02
141,1004,1005,2024-01-04
142,2006,2004,2024-01-04
143,1001,1009,2024-01-05
144,2002,2001,2024-01-05
145,1006,1008,2024-01-06
146,2003,2005,2024-01-06
147,1002,1005,2024-01-07
148,2007,2004,2024-01-07
149,1004,1001,2024-01-09
150,2006,2002,2024-01-09
151,1009,1008,2024-01-10
152,2001,2005,2024-01-10
153,1006,1002,2024-01-11
154,2003,2007,2024-01-11
155,1005,1001,2024-01-12
156,2004,2002,2024-01-12
157,1008,1004,2024-01-13
158,2005,2006,2024-01-13
159,1009,1006,2024-01-14
160,2001,2003,2024-01-14
161,1001,1002,2024-01-16
162,2002,2007,2024-01-16
163,1005,1008,2024-01-17
164,2005,2004,2024-01-17
165,1004,1006,2024-01-18
166,2006,2003,2024-01-18
167,1002,1009,2024-01-19
168,2007,2001,2024-01-19
169,1001,1005,2024-01-30
170,2002,2004,2024-01-30
171,1009,1002,2024-01-31
172,2001,2007,2024-01-31
173,1006,1004,2024-02-01
174,2003,2006,2024-02-01
175,1008,1005,2024-02-02
176,2005,2004,2024-02-02
177,1002,1001,2024-02-03
178,2007,2002,2024-02-03
179,1006,1009,2024-02-04
180,2003,2001,2024-02-04
181,1002,1008,2024-02-06
182,2007,2005,2024-02-06
183,1001,1004,2024-02-07
184,2002,2006,2024-02-07
185,1005,1006,2024-02-08
186,2004,2003,2024-02-08
187,1008,1009,2024-02-09
188,2005,2001,2024-02-09
189,1004,1002,2024-02-10
190,2006,2007,2024-02-10
191,1006,1001,2024-02-11
192,2003,2002,2024-02-11
193,1009,1005,2024-02-12
194,2001,2004,2024-02-12
195,1001,1008,2024-02-14
196,2002,2005,2024-02-14
197,1005,1004,2024-02-15
198,2004,2006,2024-02-15
199,1002,1006,2024-02-16
200,2007,2003,2024-02-16
201,1009,1001,2024-02-17
202,2001,2002,2024-02-17
203,1004,1008,2024-02-18
204,2006,2005,2024-02-18
205,1005,1002,2024-02-20
206,2004,2007,2024-02-20
207,1008,1006,2024-02-21
208,2005,2003,2024-02-21
209,1004,1009,2024-02-22
210,2001,2006,2024-02-22
211,1001,1002,2024-02-23
212,2002,2007,2024-02-23
213,1006,1005,2024-02-24
214,2003,2004,2024-02-24
215,1008,1004,2024-02-25
216,2005,2006,2024-02-25
217,1001,1006,2024-02-27
218,2002,2003,2024-02-27
219,1009,1008,2024-02-28
220,2001,2005,2024-02-28
221,1002,1004,2024-02-29
222,2007,2006,2024-02-29
223,1005,1001,2024-03-01
224,2004,2002,2024-03-01
225,1009,1006,2024-03-02
226,2001,2003,2024-03-02
227,1008,1002,2024-03-03
228,2005,2007,2024-03-03
229,1004,1005,2024-03-05
230,2006,2004,2024-03-05
231,1001,1009,2024-03-06
232,2002,2001,2024-03-06
233,1006,1008,2024-03-07
234,2003,2005,2024-03-07
235,1002,1005,2024-03-08
236,2007,2004,2024-03-08
237,1009,1004,2024-03-09
238,2001,2006,2024-03-09
239,1008,1001,2024-03-10
240,2005,2002,2024-03-10
241,1005,1009,2024-03-12
242,2001,2004,2024-03-12
243,1006,1002,2024-03-13
244,2003,2007,2024-03-13
245,1004,1001,2024-03-14
246,2006,2002,2024-03-14
247,1005,1008,2024-03-15
248,2004,2005,2024-03-15
249,1002,1009,2024-03-16
250,2007,2001,2024-03-16
251,1004,1006,2024-03-17
252,2006,2003,2024-03-17
253,2093,2095,2024-03-20
254,1008,1005,2024-03-21
255,2004,2003,2024-03-22
256,1009,1008,2024-03-23
257,2003,2004,2024-03-24
258,1008,1009,2024-03-25
259,2004,2003,2024-03-26
260,1009,1008,2024-03-27
261,2001,2004,2024-03-28
262,1001,1008,2024-03-29
263,2001,2004,2024-03-30
264,1001,1008,2024-03-31
265,2004,2001,2024-04-01
266,1008,1001,2024-04-02
267,2004,2001,2024-04-03
268,1008,1001,2024-04-04
269,2001,2004,2024-04-05
270,1001,1008,2024-04-06";
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

$num=$_GET['num'];
if(isset($num) && $num !==""){$num=$num;}
else{$num=1;}

$datax=explode("\r\n",$data);
$numx=explode(",",$datax[$num]);
$home=$numx[1];
$away=$numx[2];
$date=$numx[3];
//echo "$date $team[$home] vs $team[$away]<p>Note: t=try ; s=success ; f=foul ; e=error ; b=bounce back<p>";
	$file="stat/".$num.".json";
	if (file_exists($file)) {
		$json=json_decode(file_get_contents($file),true);
	}else{
		if($num==254){$part="204";}
		if($num >=255 && $num <= 260){$part="202";}
		if($num >=261){$part="203";}
		if($num <=252){$part="201";}
		$link="https://api.kovo.co.kr/api/game/playerRecord?season=020&gPart=$part&gNum=$num&hTeamCode=$home&aTeamCode=$away";
		//https://api.kovo.co.kr/api/game/playerRecord?season=020&gPart=204&gNum=254&hTeamCode=1008&aTeamCode=1005
		$json=json_decode(file_get_contents($link),true);
		//echo "PART = $part<p>";
	}
	//var_dump($json);
	$homerec=$json['result']['home']['playerRecord'];
//var_dump($json2);
$jumlah=count($homerec);
//echo "<table><tr><td  style='text-align:top'>";
//echo $team[$home].": ";
$hteamattack=0;
$hteamblock=0;
$hteamace=0;
$hteamerror=0;
$hteamdata="";
/*
echo "<table><tr><th rowspan=2 width=70px>Player<th rowspan=2>No<th rowspan=2>Pos<th rowspan=2>Poin<th rowspan=2>Rate<th colspan=4>Attack
<th colspan=5>Blocking<th colspan=3>Serve<th colspan=4>Dig<th colspan=3>Recieve<th colspan=3>Set<th rowspan=2>Error
<tr><th>t<th>s<th>f<th>e
<th>t<th>s<th>b<th>f<th>e
<th>t<th>s<th>e
<th>t<th>s<th>f<th>e
<th>t<th>s<th>f
<th>t<th>s<th>e";
*/
echo "<table><tr><td>";
echo $team[$home].":<br>";
for($i=0;$i<$jumlah;$i++){
	$pNum=$homerec[$i]['pNum'];
	$pName=$homerec[$i]['pName'];
	$position=$homerec[$i]['position'];
	$point=$homerec[$i]['point'];
	$atsp=$homerec[$i]['atsp'];
	$attack=$homerec[$i]['ats'];$hteamattack=$hteamattack+$attack;
	$atf=$homerec[$i]['atf'];
	$att=$homerec[$i]['att'];
	$ate=$homerec[$i]['ate'];
	$block=$homerec[$i]['bs'];$hteamblock=$hteamblock+$block;
	$bt=$homerec[$i]['bt'];
	$blkvb=$homerec[$i]['blkvb'];
	$bf=$homerec[$i]['bf'];
	$blke=$homerec[$i]['blke'];
	$ace=$homerec[$i]['ss'];$hteamace=$hteamace+$ace;
	$st=$homerec[$i]['st'];
	$se=$homerec[$i]['se'];
	$ssp=$homerec[$i]['ssp'];
	$nama=$homerec[$i]['pCode'];
	$dt=$homerec[$i]['dt'];
	$ds=$homerec[$i]['ds'];
	$df=$homerec[$i]['df'];
	$de=$homerec[$i]['de'];	
	$rt=$homerec[$i]['rt'];
	$rs=$homerec[$i]['rs'];
	$rf=$homerec[$i]['rf'];	
	
	$sett=$homerec[$i]['sett'];
	$sets=$homerec[$i]['sets'];
	$sete=$homerec[$i]['sete'];	
	
	$error=$homerec[$i]['err'];$hteamerror=$hteamerror+$error;
	//echo "<tr><td>$pName<td>$pNum<td>$position<td><b class=blue>$point<td>$atsp%<td>$att<td><b><b class=blue>$attack<td>$atf<td><b class=red>$ate<td>$bt<td><b class=blue>$block<td>$blkvb<td>$bf<td><b class=red>$blke<td>$st<td><b class=blue>$ace<td><b class=red>$se<td>$dt<td>$ds<td>$df<td><b class=red>$de<td>$rt<td>$rs<td>$rf<td>$sett<td>$sets<td><b class=red>$sete<td><b class=red>$error";
	echo "$pNum($position) $point poin($atsp%), attack($att-$attack-$atf-$ate), $block block, $ace ace, $error error";
	if ($i!==($jumlah-1)){echo "<br>";}
	if($i<3){$hteamdata .= "$pNum ($position) $point poin ($atsp%)";}
	if ($i<2){$hteamdata .= ", ";}
//	if ($i!==($jumlah-1)){echo "<br>";}
}
//echo "</table><td style='text-align:top'>";
//echo "</table><p>";
echo " || <br>";
$awayrec=$json['result']['away']['playerRecord'];
$jumlaha=count($awayrec);
echo "<td>";
echo $team[$away].":<br>";
$ateamattack=0;
$ateamblock=0;
$ateamace=0;
$ateamerror=0;
/*
echo "<table><tr><th rowspan=2  width=70px>Player<th rowspan=2>No<th rowspan=2>Pos<th rowspan=2>Poin<th rowspan=2>Rate<th colspan=4>Attack
<th colspan=5>Blocking<th colspan=3>Serve<th colspan=4>Dig<th colspan=3>Recieve<th colspan=3>Set<th rowspan=2>Error
<tr><th>t<th>s<th>f<th>e
<th>t<th>s<th>b<th>f<th>e
<th>t<th>s<th>e
<th>t<th>s<th>f<th>e
<th>t<th>s<th>f
<th>t<th>s<th>e";
*/

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
	$bt=$awayrec[$i]['bt'];
	$blkvb=$awayrec[$i]['blkvb'];
	$bf=$awayrec[$i]['bf'];
	$blke=$awayrec[$i]['blke'];
	$ace=$awayrec[$i]['ss'];$ateamace=$ateamace+$ace;
	$st=$awayrec[$i]['st'];
	$se=$awayrec[$i]['se'];
	$ssp=$awayrec[$i]['ssp'];
	$nama=$awayrec[$i]['pCode'];
	$dt=$awayrec[$i]['dt'];
	$ds=$awayrec[$i]['ds'];
	$df=$awayrec[$i]['df'];
	$de=$awayrec[$i]['de'];
	$rt=$awayrec[$i]['rt'];
	$rs=$awayrec[$i]['rs'];
	$rf=$awayrec[$i]['rf'];
	$sett=$awayrec[$i]['sett'];
	$sets=$awayrec[$i]['sets'];
	$sete=$awayrec[$i]['sete'];	
	$error=$awayrec[$i]['err'];$ateamerror=$ateamerror+$error;
		//echo "<tr><td>$pName<td>$pNum<td>$position<td><b class=blue>$point<td>$atsp%<td>$att<td><b><b class=blue>$attack<td>$atf<td><b class=red>$ate<td>$bt<td><b class=blue>$block<td>$blkvb<td>$bf<td><b class=red>$blke<td>$st<td><b class=blue>$ace<td><b class=red>$se<td>$dt<td>$ds<td>$df<td><b class=red>$de<td>$rt<td>$rs<td>$rf<td>$sett<td>$sets<td><b class=red>$sete<td><b class=red>$error";
	echo "$pNum($position) $point poin($atsp%), attack($att-$attack-$atf-$ate), $block block, $ace ace, $error error";
	if ($i!==($jumlah-1)){echo "<br>";}
	if($i<3){$ateamdata .= "$pNum ($position) $point poin ($atsp%)";}
	if ($i<2){$ateamdata .= ", ";}
//	if ($i!==($jumlaha-1)){echo "<br>";}
}
echo "</table>";
//echo "</table></table><p>";
echo "<p>";
echo $team[$home].": ".$hteamdata." ↔ ".$team[$away].": ".$ateamdata;
echo "<p>";
echo $team[$home].": "."Att $hteamattack, Blk $hteamblock, Ace $hteamace, Err $hteamerror █ ";
echo $team[$away].": "."Att $ateamattack, Blk $ateamblock, Ace $ateamace, Err $ateamerror <p><pre>";

var_dump($json);



