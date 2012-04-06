<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<HTML> 
<HEAD> 
<TITLE> Russian codepages </TITLE> 
<META NAME="Generator" CONTENT="EditPlus"> 
<meta http-equiv="content-type" content="text/html;charset=utf-8"> 
</HEAD> 
 
<BODY>
<?php include preg_replace('/\/[^\/]+$/','',$HTTP_SERVER_VARS['SCRIPT_FILENAME']).'/menu.inc'; ?> 
<TABLE BORDER="0"> 
<TR> 
	<TD WIDTH="50">&nbsp;</TD> 
	<TD WIDTH="400">
<br><br>
<strong>What's that?</strong>
<br><br>
Here you can convert russian cyrillic from one encoding to another.<BR> 
PHP code bases mainly on PHP4 convert_cyr_string(), which provides conversions between next 1-byte charsets:
<OL>
<LI> koi8-r  
<LI> windows-1251  
<LI> iso8859-5 
<LI> x-cp866
<LI> x-mac-cyrillic
</OL>
Additionally are here available next russian encodings:  
<OL>
<LI> Latinnica (russian transcribed with latin letters. 1...4 bytes.)
<LI> Unicode-mnemonic (<em>&amp;#1XXX;</em> , 1...7 bytes.)
<LI> utf-8 (1...2 bytes)
</OL> 
If you want to install these scripts, then your webserver's PHP4 must support Perl-compatible regular expressions.<br><br>
<strong>
Using page <em>Cyrillic conversions</em></strong>
<br><br>
If you cannot copy conversion result from lower textarea, try to copy it directly from HTML source, where it lays between <em>&lt;!-- ##### RESULTS ##### RESULTS ##### RESULTS ##### RESULTS ##### --&gt;</em> tags.
<br><br>

<br><br>
</TD> 
	<TD>&nbsp;</TD> 
</TR> 
</TABLE>
<?php echo $MENU_TEXT; ?>
</BODY> 
</HTML> 
