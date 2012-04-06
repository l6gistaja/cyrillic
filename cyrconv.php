<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<HTML> 
<HEAD> 
<TITLE> Cyrillic Converter </TITLE> 
<?php 

foreach(array(
	"x_charset","x","y_charset","y","strip_tags","base64","codetable"
) as $rv) { $GLOBALS[$rv] = $_REQUEST[$rv]; }

	function kuva_ripploend($omadused, $valikud, $valitu) 
		{ 
		  echo "<SELECT $omadused>\n"; 
          foreach($valikud as $v6ti => $v22rtus)  
			{ 
			  $valitud=($valitu==$v6ti)?' SELECTED':''; 
			  echo " <OPTION VALUE=\"$v6ti\"$valitud>$v22rtus</option>\n"; 
			} 
		  echo "</SELECT>\n";  
		} 

$CONV_TABLES=array(
	'lat_w1251'=>array(
		'lat_ar'=>array(
'/S[Hh][Cc][Hh]/', 
'/s[Hh][Cc][Hh]/', 
'/J[Oo]/', 
'/Z[Hh]/', 
'/C[Hh]/', 
'/S[Hh]/', 
'/J[Uu]/', 
'/J[Aa]/', 
'/j[Oo]/', 
'/z[Hh]/', 
'/c[Hh]/', 
'/s[Hh]/', 
'/j[Uu]/', 
'/j[Aa]/', 
'/No\./'
		),
		'lat_as'=>array(
'Shch', 
'shch', 
'Jo', 
'Zh', 
'Ch', 
'Sh', 
'Ju', 
'Ja', 
'jo', 
'zh', 
'ch', 
'sh', 
'ju', 
'ja', 
'No.'
		),
		'win1251_a'=>array(
"\xD9", 
"\xF9", 
"\xA8", 
"\xC6", 
"\xD7", 
"\xD8", 
"\xDE", 
"\xDF", 
"\xB8", 
"\xE6", 
"\xF7", 
"\xF8", 
"\xFE", 
"\xFF", 
"\xB9"
		),
		'lat_s'=>"ABVGDEZIJKLMNOPRSTUFHCXY\"Qabvgdezijklmnoprstufhcxy'q", 
		'win1251_s'=>"\xC0\xC1\xC2\xC3\xC4\xC5\xC7\xC8\xC9\xCA\xCB\xCC\xCD\xCE\xCF\xD0\xD1\xD2\xD3\xD4\xD5\xD6\xDA\xDB\xDC\xDD\xE0\xE1\xE2\xE3\xE4\xE5\xE7\xE8\xE9\xEA\xEB\xEC\xED\xEE\xEF\xF0\xF1\xF2\xF3\xF4\xF5\xF6\xFA\xFB\xFC\xFD"
	)
);

function lat2w1251($x) 
{ 
	return strtr(preg_replace(
		$GLOBALS['CONV_TABLES']['lat_w1251']['lat_ar'],
		$GLOBALS['CONV_TABLES']['lat_w1251']['win1251_a']
		,$x), 
		$GLOBALS['CONV_TABLES']['lat_w1251']['lat_s'],
		$GLOBALS['CONV_TABLES']['lat_w1251']['win1251_s']); 
} 

function w12512lat($x) 
{ 
	return strtr(str_replace(
		$GLOBALS['CONV_TABLES']['lat_w1251']['win1251_a'],
		$GLOBALS['CONV_TABLES']['lat_w1251']['lat_as']
		,$x), 
		$GLOBALS['CONV_TABLES']['lat_w1251']['win1251_s'],
		$GLOBALS['CONV_TABLES']['lat_w1251']['lat_s']); 
} 

function win12512unicodemnemonic($x)
{
	$xo=ord($x);
	$y=$x;
	if($xo>191){$y='&#'.($xo+848).';';}
	if($xo==168){$y='&#1025;';}
	if($xo==184){$y='&#1105;';}
	return $y;
}

function unicodemnemonic2win1251($x)
{
	$xo=0+substr($x,2,4);
	$y=$x;
	if(($xo>1039)&&($xo<1104)){$y=chr($xo-848);}
	if($xo==1025){$y=chr(168);}
	if($xo==1105){$y=chr(184);}
	return $y;
}

function ru_utf8mnemonic($x1,$x2) 
	{ 
		# catch $x's with preg_replace('/([\xD0\xD1])([\W\S])/mseS',"ru_utf8mnemonic('\\1','\\2')", $x); 
		$x1o=ord($x1); 
		$x2o=ord($x2); 
		return (($x1o==208&&$x2o>143&&$x2o<192)||($x1o==209&&$x2o>127&&$x2o<144))?'&#'.((($x1o%32)<<6)+($x2o%64)).';':$x1.$x2; 
	} 

function ru_mnemonicutf8($x) 
	{ 
		# catch $x's with preg_replace('/&#(1[01]\d{2});/mseS',"ru_mnemonicutf8('\\1')", $x); 
		$y="&#$x;";
		if( 	(($x>1039)&&($x<1104))
			||($x==1025)
			||($x==1105))
				{$y=chr(192+($x>>6)).chr(128+($x%64));} 
		return $y;
	} 

function rus_convert($x,$xcs,$ycs)
{
	$y='';
	if($xcs==$ycs)
	{
		$y='### There\'s nothing to convert, charsets are the same ! ###';
	}
	else if($xcs.$ycs=='u8')
	{
		$y=preg_replace('/&#(1[01]\d{2});/mseS',"ru_mnemonicutf8('\\1')", $x);
	}
	else if($xcs.$ycs=='8u')
	{	
		$y=preg_replace('/([\xD0\xD1])([\W\S])/mseS',"ru_utf8mnemonic('\\1','\\2')",$x);
	}
	else
	{
		$y=$x;
		$real_xcs=$xcs;
		$real_ycs=$ycs;
		if($real_xcs=='8')
		{
			$y=preg_replace('/([\xD0\xD1])([\W\S])/mseS',"ru_utf8mnemonic('\\1','\\2')",$y);
			$real_xcs='u';
		}
		if($real_xcs=='u')
		{
			$y=preg_replace('/(&#1[01]\d{2};)/eS',"unicodemnemonic2win1251('\\1')", $y);
			$real_xcs='w';
		}
		if($xcs=='L')
		{
			$y=lat2w1251($y);
			$real_xcs='w';
		}
		if(!(strstr('Lu8',$ycs)===false))
		{
			$real_ycs='w';
		}
		
		$y=convert_cyr_string($y, $real_xcs, $real_ycs);
		
		if(($ycs.$real_ycs)=='Lw')
		{
			$y=w12512lat($y);
		}
		if((($ycs.$real_ycs)=='uw')||(($ycs.$real_ycs)=='8w'))
		{
			$y=preg_replace('/([\W\S])/eS',"win12512unicodemnemonic('\\1')", $y);
		}
		if(($ycs.$real_ycs)=='8w')
		{
			$y=preg_replace('/&#(1[01]\d{2});/mseS',"ru_mnemonicutf8('\\1')", $y);
		}


	}
	return $y;
}

$cyr_charsets=array( 
'k'=>'koi8-r',  
'w'=>'windows-1251',  
'i'=>'iso8859-5', 
'a'=>'x-cp866',  
'm'=>'x-mac-cyrillic',
'L'=>'Latinnica',
'u'=>'Unicode-mnemonic',
'8'=>'utf-8');  

$y_charset=(preg_match('/^[kwiamLu8]$/',$y_charset))?$y_charset:'8';
$x_charset=(preg_match('/^[kwiamLu8]$/',$x_charset))?$x_charset:'8';

$show_charset=($y_charset=='L')?$x_charset:$y_charset;
$show_charset=(preg_match('/^[kwiam8]$/',$show_charset))?$show_charset:'8';

echo '<META HTTP-EQUIV="content-type" CONTENT="text/html;charset='.$cyr_charsets[$show_charset].'">'; 
$x=stripslashes($x); 
 ?> 
</HEAD> 
<BODY> 
<?php include preg_replace('/\/[^\/]+$/','',$HTTP_SERVER_VARS['SCRIPT_FILENAME']).'/menu.inc'; ?> 
<FORM METHOD=POST ACTION="<?php echo $HTTP_SERVER_VARS[SCRIPT_NAME]; ?>" NAME="v"> 
<table border="0">
<tr>
<td valign="top"><?php echo kuva_ripploend('NAME="x_charset"',$cyr_charsets, $x_charset); ?><br><br>Original text =&gt;</td>
<td><TEXTAREA NAME="x" ROWS="10" COLS="60" WRAP="virtual"><?php echo $x; ?></TEXTAREA></td>
</tr>
<tr>
<td colspan="2"><INPUT TYPE="submit" VALUE="Convert" NAME="submit">&nbsp;&nbsp;<A HREF="#" onClick="document.forms['v'].x.value=document.forms['v'].y.value;document.forms['v'].x_charset.selectedIndex=document.forms['v'].y_charset.selectedIndex;return false;">Copy up</A></td>
</tr>
<tr>
<td valign="top"><?php echo kuva_ripploend('NAME="y_charset"', $cyr_charsets, $y_charset); ?><br><br>Conversion result =&gt;</td>
<td> 


<!-- ##### RESULTS ##### RESULTS ##### RESULTS ##### RESULTS ##### --> 
 
<TEXTAREA NAME="y" ROWS="10" COLS="60" WRAP="virtual"><?php 

$y=rus_convert($x, $x_charset, $y_charset);
if($strip_tags){$y=strip_tags($y);}
echo $y;

 ?></TEXTAREA> 
 
<!-- ##### RESULTS ##### RESULTS ##### RESULTS ##### RESULTS ##### --> 
 
 
</td>
</table>



<BR><INPUT TYPE="checkbox" NAME="strip_tags" VALUE="1"<?php echo ($strip_tags)?' CHECKED':''; ?>> remove HTML &amp; PHP tags  
<BR><INPUT TYPE="checkbox" NAME="base64" VALUE="1"<?php echo ($base64)?' CHECKED':''; ?>> show base64 string
<BR><INPUT TYPE="checkbox" NAME="codetable" VALUE="1"<?php echo ($codetable)?' CHECKED':''; ?>> show Latinnica codetable 
</FORM> 
<?php 
if($base64) { echo "<HR>=?{$cyr_charsets[$y_charset]}?B?".base64_encode($y).'?='; } 
if($codetable) 
{ 
echo '<HR>'; 
$WIN1251NLAT=array( 
0=>array('A',192,'a',224), 
1=>array('B',193,'b',225), 
2=>array('V',194,'v',226), 
3=>array('G',195,'g',227), 
4=>array('D',196,'d',228), 
5=>array('E',197,'e',229), 
6=>array('JO',168,'jo',184), 
7=>array('ZH',198,'zh',230), 
8=>array('Z',199,'z',231), 
9=>array('I',200,'i',232), 
10=>array('J',201,'j',233), 
11=>array('K',202,'k',234), 
12=>array('L',203,'l',235), 
13=>array('M',204,'m',236), 
14=>array('N',205,'n',237), 
15=>array('O',206,'o',238), 
16=>array('P',207,'p',239), 
17=>array('R',208,'r',240), 
18=>array('S',209,'s',241), 
19=>array('T',210,'t',242), 
20=>array('U',211,'u',243), 
21=>array('F',212,'f',244), 
22=>array('H',213,'h',245), 
23=>array('C',214,'c',246), 
24=>array('CH',215,'ch',247), 
25=>array('SH',216,'sh',248), 
26=>array('SHCH',217,'shch',249), 
27=>array('X',218,'x',250), 
28=>array('Y',219,'y',251), 
29=>array('"',220,"'",252), 
30=>array('Q',221,'q',253), 
31=>array('JU',222,'ju',254), 
32=>array('JA',223,'ja',255), 
33=>array('No.',185,'',32) 
); 
 
$cyr_symbols=count($WIN1251NLAT); 
 
echo '<TABLE BORDER="1"><TR><TH> Win1251 </TH><TH> Latinnica </TH><TH> # </TH><TH> Win1251 </TH><TH> Latinnica </TH><TH> # </TH></TR>'; 
 
for($i=0;$i<$cyr_symbols;$i++) 
	{ 
		echo "<TR><TD><B>".chr($WIN1251NLAT[$i][1])."</B></TD><TD>{$WIN1251NLAT[$i][0]}</TD><TD>".(($WIN1251NLAT[$i][1]>32)?$WIN1251NLAT[$i][1]:'')."</TD><TD><B>".chr($WIN1251NLAT[$i][3])."</B></TD><TD>{$WIN1251NLAT[$i][2]}</TD><TD>".(($WIN1251NLAT[$i][3]>32)?$WIN1251NLAT[$i][3]:'')."</TD></TR>\n"; 
	} 
 ?> 
 <TR><TH> Win1251 </TH><TH> Latinnica </TH><TH> # </TH><TH> Win1251 </TH><TH> Latinnica </TH><TH> # </TH></TR></TABLE> 
 <?php } ?> 
<br>
<?php echo $MENU_TEXT; ?>
</BODY> 
</HTML>