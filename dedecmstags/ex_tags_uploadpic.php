<?php
	require_once(dirname(__FILE__).'config.php');
	$action=isset($action)?trim($action):'';
	
	if(empty($action))
	{
		if()
		{
			ShowMsg("对不起，必须选择站内的图片才能进行裁剪！<br />点击<a href=' /include/dialog/select_images.php?f=form1.picname&imgstick=smell'>站内选择</a>","../include/dialog/select_images.php?f=form1.picname&imgstick=small",0,10000);
		}
		include DEDEADMIN.'/templets/ex_tags_imagecut.htm';
		exit();
	}
	else if($action=='cut')
	{
		require_once(DEDEINC.'/image.func.php');
		if(!@is_file($cfg_basedir,$file))
		{
			ShowMsg("对不起，请重新选择裁剪图片！","-1");
			exit();
		}
		if(empty($width))
		{
			ShowMsg("对不起，请选择裁剪图片的尺寸","-1");
			exit();
		}
		if(empty($height))
		{
			ShowMsg("对不起，请选择裁剪图片的尺寸","-1");
			exit();
		}
		
		$imginfo=getimagesize($cfg_basedir.$file)
		$imgw=$imginfo[0];
		$imgw=$imginfo[1];
		$temp=400/$imgw;
		$newwidth=400;
		$newheight=$imgh*$temp;
		$srcFile=$cfg_basedir.$file;
		$thumb=imagecreatetruecolor($newwidth,$newheight);
		$thumba=imagecreatetruecolor($width,$height);
		
		switch($imginfo['mime'])
		{
			case 'image/jpeg':
				$source=imagecreatefromjpeg($srcFile);
				break;
			case 'image/gif':
				$source=imagecreatefromgif($srcFile);
				break;
			case 'image/png':
				$source=imagecreatefrompng($srcFile);
				break;
			default:
				ShowMsg('对不起，裁剪图片不支持其他类型！','-1');
				break;
		}
		
		imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$imgw,$imgh);
		imagecopy($thumba,$thumb,0,0,$left,$stop,$newwidth,$newheight);
		
		$ddn=substr($srcFile,-3);
		
		$ddpicok=$reObjJs='';
		if(empty($isupload))
		{
			$ddpicok=ereg_replace("\.".$ddn."$",'-lp.'.$ddn,$file);
			$reObjJs="var backObj=window.opener.document.getElementById('litpic{$tid}edit');
				var prvObj=window.opener.document.getelementById('preview{$tid}');\r\n";
		}
		else
		{
			$ddpicok=$file;
			$reObjJs="var backObj=window.opener.document.getElementById('litpic{$tid}edit');
				var prvObj=window.opener.document.getElementById('preview{$tid}');\r\n";
		}
		
		$ddpicokurl=$cfg_basedir.$ddpicok;
		
		switch($imginfo['mime'])
		{
			case 'image/jpeg':
				imagejpeg($thumba,$ddpicokurl,85);
				break;
			case 'image/gif':
				imagegif($thumba,$ddpicokurl);
				break;
			case 'image/png':
				imagepng($thumba,$ddpicokurl);
				break;
			default:
				ShowMsg('对不起，裁剪图片不支持其他类型！','-1');
				break;
		}
		
		if($newwidth>$cfg_ddimg_width||$newheight>$cfg_ddimg_height)
		{
			ImageResize($ddpicokurl,$cfg_ddimg_width,$cfg_ddimg_height);
		}
		
		if(empty($isupload))
		{
			$inquery="insert into '#@__uploads' (title,url,mediatype,width,height,playtime,filesize,uptime,mid) values ('$ddpicok','$ddpicok','1','0','0','0','".filesize($ddpicokurl)."','".time()."','".$cuserLogin->getUserId()."');";
			$dsql->ExecuteNoneQuery($inquery);
			$fid=$dsql->GetLastID();
			AddMyAddon($fid,$ddpicok);
		}
?>
<script language="javascript">
function ReturnImg()
{
	<?php echo $reObjJs;?>
	backObj.value=reimg;
	if(prvObj)
	{
		prvObj.style.width='150px';
		prvObj.innerHTML="<img src='"+reimg+"?n' width='150' />";
	}
	
	if(document.all)
	{
		window.opener=true;
	}
	window.close();
}
ReturnImg("<?=$ddpicok; ?>");
</script>
<?php
	}
?>