<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
include 'product/prolist.php';
//if($_POST['name']!=0){$name=$_POST['name'];}
//if($_POST['code']!=0){$code=$_POST['code'];}

$temp_prokey = $_GET['type'];


/*if($signup==false){
  	?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1;url=login.html '>
<title>���������̨����ƽ̨</title>
</head>
<body>
<p>�������.......<br>����������......</p>
</body>
</html>
  	<?php 
  	$nothing = 0;
  }*/
  

  	$nothing = 0;
  	?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>�ﳯ�˹�����̨����ƽ̨</title>
</head>

<body>
<div class="houtai-logo">
   <div class="houtai-logo-inside" > 
   <img class="houtai-logo-img"  alt="" src="houtai-img/logo.png">
   <span class="houtai-logo-word" style="">�������-��վ��̨</span>
   </div>
</div>


  <img style="display:block; margin:0 auto;margin-top:10px;" alt="" src="houtai-img/baoni-logo.png">  
  <span style="display:block; width:1000px; clear:left; margin:0 auto;font-size:20px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;"> �ﳯ�˹ٷ���վ-��̨����ƽ̨ </span>
  <iframe frameborder=0   width=1200 height=1500 style=" display:block; margin:0 auto;margin-top:10px; " marginheight=0 marginwidth=0 scrolling=no src="product_edit_single_small.php?type=<?php echo $temp_prokey.'_1';?>"></iframe>


      
   
   
</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>

