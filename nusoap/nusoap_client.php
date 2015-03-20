<?php
	require_once("lib/nusoap.php");
	header("Content-type: text/html; charset=utf-8");
	$client = new soapclient('http://127.0.0.1/nusoap/nusoap_server.php');
	$parameters=array("字符串1",'字符串2');
	$str=$client->call('concatenate',$parameters);
	if (!$err=$client->getError()) {
		echo " 程序返回 :",$str;
	} else {
		echo " 错误 :",$err;
	}
?> 