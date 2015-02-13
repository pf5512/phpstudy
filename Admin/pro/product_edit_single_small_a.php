<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
//if($_POST['name']!=0){$name=$_POST['name'];}
//if($_POST['code']!=0){$code=$_POST['code'];}

  /*if($signup==false){
  	?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1;url=login.html '>
<title>宝尼官网后台管理平台</title>
</head>
<body>
<p>密码错误.......<br>请重新输入......</p>
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
<script src="http://www.betopins.com/ckeditor/ckeditor/ckeditor.js"></script>
<link href="http://www.betopins.com/ckeditor/ckeditor/sample/sample.css" rel="stylesheet">
<title>凤朝凰官网后台管理平台</title>
</head>
<body>
  <?php 
  $zzz = $_GET['type'];
  $temp_tt = explode('_',$_GET['type']);
  $temp_prokey = $temp_tt[0];
  $fenlei1 = $temp_tt[1];
  $temp_pro = new prolist();
  $arr = $temp_pro->get_product_data($temp_prokey);

  //echo $arr[1];
  ?>
  <div class="bform" style="margin-top:20px;" >
  <span style="display:block;color:black;height:40px;line-height:40px;">
       INSTRUMENTS<?php echo $temp_prokey;?>编辑
  </span>  
    <form class="sform" method="post" action="product_edit_yes.php?type=<?php echo $temp_prokey;?>" target="_self">
      <br>
      
      <?php 
      $type1_list = $temp_pro->type1_list();
      if( $fenlei1 =='1'){$fenlei1 = $arr[1];$fenlei2 = $arr[2];}
      
      else {
      	$typett_list = $temp_pro->type2_list($fenlei1);
      	$fenlei2 = $typett_list[0];
      }
      ?>

      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;一级分类:&nbsp;</span><input value="<?php echo $fenlei1;?>" name="fenlei1" type="text" /><br>
      <a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $zzz;?>" class="navi-all" id="navi0">选择编辑分类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;二级分类:&nbsp;</span><input value="<?php echo $fenlei2;?>" name="fenlei2" type="text" /><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTRUMENTS编码:&nbsp;</span><input value="<?php echo $arr[0];?>"  name="keyd" type="text" /><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTRUMENTS名称:&nbsp;</span><input value="<?php echo $arr[6];?>" name="named" type="text"/><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌名称:&nbsp;</span><input value="<?php echo $arr[4];?>" name="brand" type="text"/><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;厂商性质:&nbsp;</span><input  value="<?php echo $arr[8];?>" name="xxzz" type="text"/><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;产地:&nbsp;</span><input value="<?php echo $arr[9];?>" name="ccdd" type="text"/><br>
      
      <span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTRUMENTS描述:&nbsp;</span><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <textarea cols="80" style="height:500px;" id="editor1" name="content" rows="100">
			 <?php echo $arr[7];?> 
      </textarea>
      <script>

			// This call can be placed at any point after the
			// <textarea>, or inside a <head><script> in a
			// window.onload event handler.

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.

			CKEDITOR.replace( 'editor1' );

		</script>
      
      <button class="add-button">保存</button>
      <br><br>
      
      
   </form>
   
   
   <form class="sform-img" style="margin-top:20px;" enctype = "multipart/form-data" action="product_edityes_img2.php?type=<?php echo $zzz;?>"  method="post">
	  <span>&nbsp;文件更新:</span>
	  <input  style="color:white;border:1px solid black;background-color:white;" type="file"  value="2000000000" name="MyFile"/>
	  <input  style="display:block;width:70px;height:25px;font-size:13px;font-family:Microsoft Yahei;margin-left:5px;margin-top:5px;" type="submit" value=" 上传 " /><br>
    </form>
   
   
   
   
   
   <form class="sform-img" enctype = "multipart/form-data" action="product_edityes_img.php?type=<?php echo $temp_prokey;?>"  method="post">
	  <span>&nbsp;图片更换:</span>
	  <input  style="color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	  <input   class="add-button" style="display:block;" type="submit" value=" 上传 " /><br>
    </form>
    <div style="display:block;width:700px;height:250px;background-color:grey;">
    <img  style="display:block;clear:left;width:300px;height:200px;margin:0 auto;margin-top:120x;" alt="" src=<?php echo 'pro-img/xiangqing'.'/'.$temp_prokey.'.jpg';?>>  
      
    </div>
                    
   
   

   </div>
      
   
   
</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>
<?php 
  $_SESSION["user"]='baoni';
  $_SESSION["code"]='188188';
?>

