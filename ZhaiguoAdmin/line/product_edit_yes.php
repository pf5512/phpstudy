<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';


 $keyd  = $_GET['type'];
$named = $_POST["named"];
$content = $_POST["content"];
echo $keyd;


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
  	
  }
  */
  
 
$temp_pro = new line(); 
//<meta   http-equiv=refresh   content= '1;url="fenlei1.php?fenlei1=0"'>
  	?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>凤朝凰官网后台管理平台</title>
</head>

<body>


<?php 
  if($temp_pro->edit_pro($keyd,$named ,$content ) )
{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   路线信息修改成功"; ?> </span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $keyd;?>" class="navi-all" id="navi0">返回&nbsp;</a> 
	</div>


	<?php 
}

else{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   <--路线修改失败"; ?> </span> 
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $keyd;?>" class="navi-all" id="navi0">返回&nbsp;</a>
	</div><?php
}
?>





</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>
  	<?php 
  

?>

