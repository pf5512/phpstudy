<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
include 'product/prolist.php';

$keyd = $_GET['type'];


//<meta   http-equiv=refresh   content= '1;url="fenlei1.php?fenlei1=0"'>
  	?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>�ﳯ�˹�����̨����ƽ̨</title>
</head>

<body>
<span style="display:block; margin-top:10px;
clear:left; width:750px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��ҳͼƬ����&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;MATERIALS&nbsp;&nbsp;</a>
      <a href="../filss/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;EQUIPMENTS&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;INSTRUMENTS&nbsp;&nbsp;</a>
      <a href="../mess/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��������&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS����&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS���&nbsp;&nbsp;</a>
      <br><br>
  </span>
<?php 
  
   /*if (!is_uploaded_file($_FILES["MyFile"]['tmp_name']))  
    //�Ƿ�����ļ�  
    {  
         echo "ͼƬ������!";  
         exit;  
    }
  if(!file_exists($pathname)) 
  { 
   //����Ƿ��и��ļ��У����û�оʹ��������������Ȩ�� 
   echo "·��������"; 
  }  */
     $imgname = $_FILES["MyFile"]["name"]; //��ȡ�ϴ����ļ�����
   $the_type = '.'.pathinfo($imgname, PATHINFO_EXTENSION);//��ȡ��׺

   
    /*$tpath = $_FILES['MyFile']['type'];
   $tt = end(explode('.', $tpath));
   if( $tt == 'image/gif' ){ $the_type = '.gif'; }
   else if( $tt == 'image/jpg' ){ $the_type = '.jpg'; }
   else if( $tt == 'image/png' ){ $the_type = '.png'; }
   else if( $tt == 'image/bmp' ){ $the_type = '.bmp'; }
   else if( $tt == 'application/octet-stream' ){ $the_type = '.rar'; }
   else if( $tt == 'application/zip' ){ $the_type = '.zip'; }
   else if( $tt == 'text/plain' ){ $the_type = '.txt'; }
   else if( $tt == 'application/vnd.ms-excel' ){ $the_type = '.xls'; }
   else if( $tt == 'application/vnd.ms-powerpoint' ){ $the_type = '.ppt'; }
   else if( $tt == 'application/pdf' ){ $the_type = '.pdf'; }
   else if( $tt == 'text/plain' ){ $the_type = '.txt'; }
   else if( $tt == 'application/msword' ){ $the_type = '.doc'; }
   else if( $tt == 'application/vnd.ms-excel' ){ $the_type = '.xls'; }
   else if( $tt == 'application/vnd.rn-realmedia-vbr' ){ $the_type = '.rmvb'; }
   else if( $tt == 'video/avi' ){ $the_type = '.avi'; }
   */
   
   $pathname = 'pro-img/xiangqing/'.$keyd.$the_type;
   $temp_pro = new prolist();
   $temp_pro->edit_pro_type( $keyd , $the_type);
    if (move_uploaded_file($_FILES['MyFile']['tmp_name'], $pathname)) { 
  	?> <div class="hint-word"> 
	<span > &nbsp;�ļ��޸ĳɹ�</span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $keyd.'_1';?>" class="navi-all" id="navi0">����&nbsp;</a> 
	</div>
	<?php 
  }
  else { 
	?> <div class="hint-word"> 
	<span > &nbsp;�ļ��޸�ʧ��</span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $keyd.'_1';?>" class="navi-all" id="navi0">����&nbsp;</a> 
	</div>
	<?php 
}
?>


</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>
  	<?php 
  

?>

