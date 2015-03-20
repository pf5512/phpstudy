<?php 
	require_once("lib/nusoap.php"); 
	function concatenate($str1,$str2) {
		if (is_string($str1) && is_string($str2))
			return $str1 . $str2;
		else
			return new soap_fault(' 客户端 ','','concatenate 函数的参数应该是两个字符串 ');
	}
	$soap = new soap_server;
	$soap->register('concatenate');
	$soap->service($HTTP_RAW_POST_DATA);
?> 