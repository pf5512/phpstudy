<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	include 'product/adlist.php';
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>ժ����������̨����ƽ̨</title>
</head>

<body>

<span style="display:block; margin-top:10px;
clear:left; width:750px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;��ҳͼƬ����&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
</span>



  <?php 
 
  $adlist = new adlist();
  $datalist1 = $adlist->get_product_data('0001');
  $datalist2 = $adlist->get_product_data('0002');
  $datalist3 = $adlist->get_product_data('0003');
  ?>
  <div class="bform" style="display:block;margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       ͼ1�༭
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0001" target="_self">
     <span style="display:block;clear:left;float:left;margin-left:33px;">����:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist1["link"];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">��������:&nbsp;</span>

      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist1[1];?></textarea>
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="����" />
   </form>
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0001&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">ͼƬ����:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0001.jpg">
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0001&file=png"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">ͼƬ����:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0001.png">
   </div>
   
      
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       ͼ2�༭
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0002" target="_self">
    <span style="display:block;clear:left;float:left;margin-left:33px;">����:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist2[2];?>" name="linkk" type="text"/>
      <span style="display:block;clear:left;float:left;margin-left:33px;">��������:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist2[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="����" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0002&file=jpg"  method="post">
	  <span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">ͼƬ����:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0002.jpg">
    
    <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0002&file=png"  method="post">
	  <span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">ͼƬ����:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0002.png">
                      
   
   </div>
   
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       ͼ3�༭
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0003" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">����:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">��������:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="����" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0003&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">ͼƬ����:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0003.jpg">
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0003&file=png"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">ͼƬ����:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0003.png">
   </div>
   
   
                      
   
   </div>
   
</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>