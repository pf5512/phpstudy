
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/typelist.php';
include 'pinyin.php';
$type_list = new typelist();
$brankey = $_GET['type'];
$data_list = $type_list->get_data($brankey);
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<link rel="stylesheet" type="text/css" href="pro.css" />
<link rel="stylesheet" type="text/css" href="brand_type.css" />
<title>贝拓仪器官网后台管理平台</title>
</head>

<body>
<span style="display:block; margin-top:10px;
clear:left; width:750px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;首页图片管理&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;MATERIALS&nbsp;&nbsp;</a>
      <a href="../filss/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;EQUIPMENTS&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;INSTRUMENTS&nbsp;&nbsp;</a>
      <a href="../mess/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;留言中心&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;产品管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;产品添加&nbsp;&nbsp;</a>
      <a href="brand-edit.php" style="background-color:black;color:white;">&nbsp;&nbsp;品牌管理&nbsp;&nbsp;</a>
      <a href="type-edit.php" style="background-color:black;color:white;">&nbsp;&nbsp;类别管理&nbsp;&nbsp;</a>
      <br><br>
  </span>
  
 
   <form class="sform" method="post" action="type_edit_yes.php?type=<?php echo $brankey;?>" target="_self">
      <br>
      <span  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $brankey;?></span>
      <br>

      <span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类别描述:&nbsp;</span><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea style="width:600px; height:200px;verticalAlign:text-top;" name="content" type="text" > <?php echo $data_list[1];?> </textarea>
      
      <button class="add-button">保存</button>
      <br><br>
   </form>
         
        <?php 
   //$brankey2 =  iconv("gb2312","UTF-8",$brankey);
   $brankey2 = Pinyin($brankey);
   $ppp =  'pro-img/type/'.strtr($brankey2,"/", "-").'.jpg';
    if ( !file_exists($ppp) ) {$ppp='pro-img/type/nopic.jpg';  }
               
   ?>   
   <form class="sform-img" style="display:block;margin-top:30px;height:150px;" enctype = "multipart/form-data" action="type_edityes_img.php?type=<?php echo $brankey;?>"  method="post">
	  <span style="clear:left;float:left;margin-left:35px;margin-top:10px;">&nbsp;图片更换:</span>
	  <input  style="clear:left;float:left;margin-left:35px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	  <input   style="float:left;display:block;width:70px;height:25px;font-size:13px;font-family:Microsoft Yahei;margin-left:5px;" type="submit" value=" 上传 " /><br>
      <img  style="display:block;width:100px; height:auto;float:left;margin-left:15px;" alt="" src=<?php echo $ppp; ?> >  
    
    </form>
    
 

       
    

   
 
  
</body>

</html>




















