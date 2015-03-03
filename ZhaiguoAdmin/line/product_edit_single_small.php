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
<title>凤朝凰官网后台管理平台</title>
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
<script src="../ckeditor/ckeditor/ckeditor.js"></script>
<link href="../ckeditor/ckeditor/sample/sample.css" rel="stylesheet">

<title>凤朝凰官网后台管理平台</title>
</head>

<body>



  <?php 
  $temp_prokey = $_GET['type'];
  $temp_pro = new line();
  $arr = $temp_pro->get_product_data($temp_prokey);
  //echo $arr[1];
   
  ?>
  <div class="bform" style="margin-top:20px;" >
  <span style="display:block;color:black;height:40px;line-height:40px;">
       路线《<?php echo $arr[6];?>》编辑
  </span>
   <form  class="sform" method="post" action="product_edit_yes.php?type=<?php echo $temp_prokey;?>" target="_self">
      <br><span  >&nbsp;路线标题:</span>
      <input  name="named" value="<?php echo $arr[6];?>" type="text"/><br>
      <span >&nbsp;路线正文:</span><br>
      &nbsp;
      <textarea cols="80" style="height:500px;" id="editor1" name="content" rows="500">
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
      
      <button class="add-button">修改</button>
      <br>&nbsp;
   </form>
   
   <form class="sform-img" enctype = "multipart/form-data" action="product_edityes_img.php?type=<?php echo $temp_prokey;?>"  method="post">
	  <span>&nbsp;图片更换:</span>
	  <input  style="color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	  <input   class="add-button" style="display:block;" type="submit" value=" 上传 " /><br>
    </form>
    <img  style="display:block;width:700px;margin:0 auto;" alt="" src=<?php echo 'pro-img/xiangqing'.'/'.$temp_prokey.'.jpg';?>>  
                      
   
   

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

