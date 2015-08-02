<?php
	require_once(dirname(__FILE__).'config.php');
	require_once(DEDEADMIN.'/inc/inc_batchup.php');
	require_once(DEDEADMIN.'/inc/inc_archives_functions.php');
	require_once(DEDEINC.'/typelink.class.php');
	require_once(DEDEINC.'/arc.archives.class.php');
	
	$tid=(int)$_GET['tid'];
	$upfile=AdminUpload('litpic','imagelit',0,false);
	if($upfile=='-1')
	{
		$msg="<script language='javascript'>parent.alert('你没指定上传文件或者上传的文件大小超过限制！');</script>";
	}
	else if($upfile=='-2')
	{
		$msg="<script language='javascript'>parent.alert('上传文件失败请检查原因！');</script>";
	}
	else if($upfile=='0')
	{
		$msg="<script language='javascript'>parent.alert('文件类型不正确！');</script>";
	}
	else
	{
		if(!empty($cfg_uplitpic_cut)&&$cfg_uplitpic_cut=='N')
		{
			$msg="<script language='javascript'>
				parent.document.getElementById('litpic{$tid}edit').value='{$upfile}';
				parent.document.getElementById('preview{$tid}').innerHtml=\"<img src='{$upfile}?n' width='150' />\";
			</script>";
		}
		else
		{
			$msg="<script language='javascript'>parent.open('ex_tags_imagecut.php?tid={$tid}&isupload=yes&file={$upfile}','popUpImagesWin','scrollbars=yes,resizable=yes,statebar=no');</script>";
		}
	}
	echo $msg;
?>