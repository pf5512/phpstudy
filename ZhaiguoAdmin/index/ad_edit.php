<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	include 'product/adlist.php';
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>摘过网官网后台管理平台</title>
</head>

<body>
<?php include('../menu.php'); ?>



  <?php 
 
  $adlist = new adlist();
  $datalist1 = $adlist->get_product_data('0001');
  $datalist2 = $adlist->get_product_data('0002');
  $datalist3 = $adlist->get_product_data('0003');
  $datalist1 = $adlist->get_product_data('0004');
  $datalist2 = $adlist->get_product_data('0005');
  $datalist3 = $adlist->get_product_data('0006');
  $datalist3 = $adlist->get_product_data('0007');
  ?>
  
  <div class="bform" style="display:block;margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       图1编辑
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0001" target="_self">
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist1["link"];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>

      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist1[1];?></textarea>
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
   </form>
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0001&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0001.jpg">
   </div>
   
      
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       图2编辑
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0002" target="_self">
    <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist2[2];?>" name="linkk" type="text"/>
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist2[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0002&file=jpg"  method="post">
	  <span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0002.jpg">
    
                      
   
   </div>
   
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       图3编辑
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0003" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0003&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0003.jpg">
   </div>
   
   
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       图4编辑
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0004" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0004&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0004.jpg">
   </div>
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       图5编辑
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0005" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0005&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0005.jpg">
   </div>
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       图6编辑
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0006" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0006&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0006.jpg">
   </div>
   
           
           
           
     <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       图7编辑
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0007" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0007&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0007.jpg">
   </div>      
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       广告位1
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0008" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0008&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0008.jpg">
   </div>  
   
   
   
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       广告位2
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0009" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0009&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0009.jpg">
   </div>    
   
   
   
   <div class="bform" style="margin-top:20px;height:450px; background-color:#c9c9c9;" >
  <span style="margin-left:33px;display:block;color:black;height:40px;line-height:40px;">
       广告位3
  </span>  
    <form class="sform" method="post" action="ad_edit_yes.php?type=0010" target="_self">
      
     
     <span style="display:block;clear:left;float:left;margin-left:33px;">链接:&nbsp;</span>
      <input style="display:block;clear:left;float:left;margin-left:33px;width:400px;"  value="<?php echo $datalist3[2];?>" name="linkk" type="text"/>
 
      <span style="display:block;clear:left;float:left;margin-left:33px;">文字描述:&nbsp;</span>
      <textarea cols="80" style="display:block;clear:left;float:left;margin-left:33px;height:100px;" id="editor1" name="contentt" rows="20"><?php echo  $datalist3[1];?></textarea>
    
      
     
       <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value="保存" />
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:15px; height:80px;" enctype = "multipart/form-data" action="ad_edityes_img.php?type=0010&file=jpg"  method="post">
	<span style="display:block;clear:left;float:left;margin-left:33px;margin-top:20px;">图片更换:</span>
	<input  style="display:block;clear:left;float:left;margin-left:33px;color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	 <input   style="display:block;width:70px;height:25px;clear:left;float:left;margin-left:33px;font-size:13px;font-family:Microsoft Yahei;margin-top:5px;" type="submit" value=" 上传 " />
    </form>
    <img  style="display:block;width:80px; height:auto;float:right;margin-right:88px;margin-top:-70px;" alt="" src="pro-img/adimg/0010.jpg">
   </div>   
           
                      
   
   </div>
   
</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>