<?php  
$MENU_PAGES= array( 
'index.php'=>'Help', 
'ru_cp.php'=>'Russian cyrillic encodings', 
'cyrconv.php'=>'Cyrillic conversions', 
#'ru_cyrillic.tgz'=>'PHP scripts in tarball'
); 
$c=0; 
$MENU_TEXT='';
foreach ($MENU_PAGES as $key=>$value) 
	{ 
		$MENU_TEXT.=(($c)?'&nbsp;|&nbsp;':'').((preg_match('/'.str_replace('.','\.',preg_replace('/^.*\/([^\/]+)$/','\1',$key)).'$/',$HTTP_SERVER_VARS[SCRIPT_NAME]))?"<B>$value</B>":"<A HREF=\"$key\">$value</A>"); 
		$c++; 
	} 
echo $MENU_TEXT.='&nbsp;|&nbsp;<a href="../">Home</a>';
 ?>