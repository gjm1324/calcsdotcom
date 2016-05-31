<?php
if(file_exists(__dir__."\config.php"))
{
	include_once __dir__."\config.php";
	return true;
}
else{echo 'Couldnt find the config file';}

function __autoload($class_name){
	require_once 'model/'.$class_name.'.class.php';
}
?>