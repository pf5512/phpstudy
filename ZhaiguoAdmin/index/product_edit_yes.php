<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
include 'product/prolist.php';
include 'product/brandlist.php';
include 'product/typelist.php';

$keyd = $_GET['type'];

if( !strstr($_POST["fenlei1"], '=') ){
	 $fenlei1 = $_POST["fenlei1"];
}
else{
	$ttt = explode('=',$_POST["fenlei1"]);
	$ttt1 = explode('_',$ttt[1]);
	$fenlei1 = $ttt1[1];
}


$fenlei2 ="";
$brand = $_POST["brand"];
$hkeyd = $_POST["keyd"];
$named = $_POST["named"];
$content = $_POST["content"];
$xxzz = "";
$ccdd = "";
 
$temp_pro = new prolist(); 
$arr = $temp_pro->get_product_data($hkeyd);
$brand_list = new brandlist();
$type_list =  new typelist();
$old_brand = $arr[4];
$old_type = $arr[1];

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
  	
  }
  */
  

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
  if($temp_pro->edit_pro($keyd,$hkeyd,$fenlei1,$fenlei2,$brand,$named,$content,$xxzz,$ccdd ) )
{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   产品信息修改成功"; ?> </span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $hkeyd.'_1';?>" class="navi-all" id="navi0">返回&nbsp;</a> 
	</div>


	<?php 
}

else{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   <--产品修改失败"; ?> </span> 
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $hkeyd.'_1';?>" class="navi-all" id="navi0">返回&nbsp;</a>
	</div><?php
}

 if ( !$temp_pro->check_brand($old_brand) ){
 	
 	$brand_list->del_pro($old_brand);
 }
 if ( !$temp_pro->check_type($old_type) ){
 	echo 'kkkkk';$type_list->del_pro($old_type);
 }

 $brand_list->add_pro($brand,' ');
 $type_list->add_pro($fenlei1,' ');
 

?>
</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>

