<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<HTML> 
<HEAD> 
<TITLE> Russian codepages </TITLE> 
<META NAME="Generator" CONTENT="EditPlus"> 
<meta http-equiv="content-type" content="text/html;charset=utf-8"> 
</HEAD> 
 
<BODY>
<?php include('menu.php'); ?>
<br><br> 
Here are listed numeric or string values of letters in different russian charsets.
<br><br>
<TABLE BORDER="1"> 
<TR><TH>Char</TH><TH>Latinnica</TH><TH>Unicode/UTF-8</TH><TH>Windows-1251</TH><TH>KOI8-r</TH><TH>ISO8859-5</TH><TH>x-CP866</TH><TH>x-Mac-Cyrillic</TH><TH>Char</TH></TR> 
<?php  
$CP=array( 
'192'=>array('A',1040), 
'193'=>array('B',1041), 
'194'=>array('V',1042), 
'195'=>array('G',1043), 
'196'=>array('D',1044), 
'197'=>array('E',1045), 
'168'=>array('JO',1025), 
'198'=>array('ZH',1046), 
'199'=>array('Z',1047), 
'200'=>array('I',1048), 
'201'=>array('J',1049), 
'202'=>array('K',1050), 
'203'=>array('L',1051), 
'204'=>array('M',1052), 
'205'=>array('N',1053), 
'206'=>array('O',1054), 
'207'=>array('P',1055), 
'208'=>array('R',1056), 
'209'=>array('S',1057), 
'210'=>array('T',1058), 
'211'=>array('U',1059), 
'212'=>array('F',1060), 
'213'=>array('H',1061), 
'214'=>array('C',1062), 
'215'=>array('CH',1063), 
'216'=>array('SH',1064), 
'217'=>array('SHCH',1065), 
'218'=>array('X',1066), 
'219'=>array('Y',1067), 
'220'=>array('"',1068), 
'221'=>array('Q',1069), 
'222'=>array('JU',1070), 
'223'=>array('JA',1071), 
'224'=>array('a',1072), 
'225'=>array('b',1073), 
'226'=>array('v',1074), 
'227'=>array('g',1075), 
'228'=>array('d',1076), 
'229'=>array('e',1077), 
'184'=>array('jo',1105), 
'230'=>array('zh',1078), 
'231'=>array('z',1079), 
'232'=>array('i',1080), 
'233'=>array('j',1081), 
'234'=>array('k',1082), 
'235'=>array('l',1083), 
'236'=>array('m',1084), 
'237'=>array('n',1085), 
'238'=>array('o',1086), 
'239'=>array('p',1087), 
'240'=>array('r',1088), 
'241'=>array('s',1089), 
'242'=>array('t',1090), 
'243'=>array('u',1091), 
'244'=>array('f',1092), 
'245'=>array('h',1093), 
'246'=>array('c',1094), 
'247'=>array('ch',1095), 
'248'=>array('sh',1096), 
'249'=>array('shch',1097), 
'250'=>array('x',1098), 
'251'=>array('y',1099), 
'252'=>array("'",1100), 
'253'=>array('q',1101), 
'254'=>array('ju',1102), 
'255'=>array('ja',1103) 
); 
 
$i=0; 
foreach($CP as $x=>$y) 
	{ 
		$color=($i%2)?' BGCOLOR="#EEEEEE"':''; 
		echo "<TR><TD$color><B>".'&#'.$y[1].';'/*chr($x)*/."</B></TD><TD$color>$y[0]</TD><TD$color>$y[1]</TD><TD$color>$x</TD><TD$color>".ord(convert_cyr_string(chr($x), 'w', 'k'))."<TD$color>".ord(convert_cyr_string(chr($x), 'w', 'i'))."</TD><TD$color>".ord(convert_cyr_string(chr($x), 'w', 'a'))."</TD><TD$color>".ord(convert_cyr_string(chr($x), 'w', 'm'))."</TD></TD><TD$color><B>".'&#'.$y[1].';'."</B></TD></TR>"; 
		$i++; 
	} 
 
 ?> 
 <TR><TH>Char</TH><TH>Latinnica</TH><TH>Unicode/UTF-8</TH><TH>Windows-1251</TH><TH>KOI8-r</TH><TH>ISO8859-5</TH><TH>x-CP866</TH><TH>x-Mac-Cyrillic</TH><TH>Char</TH></TR> 
 <TR><TD><B>Bytes<BR>per<BR>Char</B></TD><TD ALIGN="CENTER">1...4</TD><TD ALIGN="CENTER">(Unicode 2,<br>UTF-8 1...2,<br>Mnemonic 1...7)</TD><TD ALIGN="CENTER">1</TD><TD ALIGN="CENTER">1</TD><TD ALIGN="CENTER">1</TD><TD ALIGN="CENTER">1</TD><TD ALIGN="CENTER">1</TD><TD><B>Bytes<BR>per<BR>Char</B></TD></TR> 
 </TABLE> 
<br><br>
<?php echo $MENU_TEXT; ?>
</BODY> 
</HTML> 
