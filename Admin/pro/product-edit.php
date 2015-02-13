
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';

$urldata = $_GET['type'];

$type_list = explode('_',$urldata);
$type1 = $type_list[0]; //echo $type1;
$type2 = $type_list[1];//echo $type2;
$type3 = $type_list[2];//echo $type3;
$type4 = $type_list[3];//echo $type4;

$temp_pro = new prolist(); 
$t1_list = $temp_pro->type1_list();
if ( $type1=='1' ){ $type1 = $t1_list[0];}
if ( $type1=='2' ){ $type1 = $t1_list[0];}
if ( $type1=='3' ){ $type1 = $t1_list[0];}
if ( $type1=='4' ){ $type1 = $t1_list[0];}
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<link rel="stylesheet" type="text/css" href="pro.css" />
<title>凤朝凰官网后台管理平台</title>
</head>

<body>
<span style="display:block; margin-top:10px;
clear:left; width:700px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;首页产品图片管理&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1" style="background-color:#992824;color:white;  ">&nbsp;&nbsp;新闻管理&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;产品管理&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;产品管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;产品添加&nbsp;&nbsp;</a>
      <br><br>
  </span>
    <span style="display:block; width:1000px; clear:left; margin:0 auto;font-size:14px;font-family:Microsoft Yahei;text-align:center;margin-top:10px;"> 
      <?php 
      for($i = 0; $i< count( $t1_list ); $i++ ){?> 
         <a href="product-edit.php?type=<?php echo $t1_list[$i]?>_1_1_1" style="background-color:grey;color:white;">
         &nbsp;&nbsp;<?php echo $t1_list[$i]?>&nbsp;&nbsp;
         </a>&nbsp;&nbsp;
         <?php  
      }?>
   
    </span>
  
   <div id="pro-all">

       <div id="pro-navi"> 
          <span id="pro-navi-banner"><strong> <?php echo $type1;?>  </strong></span>
          <?php 
          	$type2_list = $temp_pro->type2_list($type1);
          	if( count( $type2_list )!=0 && $type2 == '1' ) {$type2 = $type2_list[0];}
          	
          	if( count( $type2_list )!=0 ){
          	  foreach($type2_list as $temp2){
          		if( $temp2 == $type2 ){
          			?>
          			<a id="pro-navi-1-cli" class="pro-navi-1" href="product-edit.php?type=<?php echo $type1;?>_<?php echo $temp2;?>_1_1" alt="">  &nbsp;<?php echo $temp2;?> </a>
          			<?php
          		}
          		else{
          			?>
          			<a class="pro-navi-1" href="product-edit.php?type=<?php echo $type1;?>_<?php echo $temp2;?>_1_1" alt=""> &nbsp; <?php echo $temp2;?> </a>
          			<?php 
          		}
          	 }
          	}
          
          ?>
       </div>
       
       <div id="pro-content"> 
            <br>
            <?php 
            if( $type2=='0' ) {$type3 = $type4 = '0';}
            if( $type3=='0' ) {$type4 = '0';}
            //echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_';
            $prokey_list = $temp_pro->prokey_list($type1,$type2);
            $path_key = 'xiangqing';
            $class_key1 = $class_key2 = 'suluetu3';
            $srcoll_class1 = "srcoll_class1";
            $srcoll_class = "srcoll_class";
            //echo count ( $prokey_list );
           // if ($type1 == '水盆'){ 
            	$path_key = 'suolue'; 
            	$class_key1= 'suluetu1'; 
            	$class_key2= 'suluetu2'; 
            	$srcoll_class = 'frameContent';
            	$srcoll_class1 = 'inside';
           // }
            
            ?>
            <div style="height:366px;" id="<?php echo $srcoll_class?>"> 
            <div style="height:366px;" id="<?php echo $srcoll_class1?>">
            
  
            <?php 
            $test = 0;
            foreach($prokey_list as $temp_prokey){
            	//echo $temp_prokey.'hh';
            	if( $test != 5 ){
            		//$test = 1;
            		?>
            		<span style="display:block;color:black;float:left;width:200px;height:auto;margin-left:10px; font-family:Microsoft Yahei; font-size:13px;" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>" alt="">            	
            		  <a target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>">
                      <img  style="display:block;float:left;width:200px;height:140px;" alt="" src=<?php echo 'pro-img/xiangqing/'.$temp_prokey.'.jpg';?>>   
                      </a>
            		  <a target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>"  
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;"><?php echo $temp_prokey;?>
            		  </a>
            		  <a target="_blank" href="product_edit_single.php?type=<?php echo $temp_prokey;?>"  
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">编辑
            		  </a>
            		  <a   href="product_del_yes.php?type=<?php echo $urldata.'_'.$temp_prokey;?>"
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">删除
            		  </a>
            		  <br>
            		  
            		</span>
            		<?php 
            	}
                else if( $test == 5 ){
            		$test = 0;
            		?>
            		<span style="display:block;color:black;float:left;width:392px;height:132px;margin-left:10px; font-family:Microsoft Yahei; font-size:13px;" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>" alt="">            	
                      <a target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>">
                      <img  style="display:block;float:left;width:200px;height:140px;" alt="" src=<?php echo 'pro-img/'.$path_key.'/'.$temp_prokey.'.jpg';?>>  
                      </a>
                      <a target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>"  
            		  style="display:block;color:black;clear:left;float:left;height:40px;line-height:40px;"><?php echo $temp_prokey;?>
            		  </a>
            		  <a target="_blank" href="product_edit_single.php?type=<?php echo $temp_prokey;?>"  
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">编辑
            		  </a>
            		  <a href="product_del_yes.php?type=<?php echo $urldata.'_'.$temp_prokey;?>"  
            		   style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">删除
            		  </a>
            		</span>
            		<?php 
            	}
            	
            }
       ?>
           <!-- <a id="suluetu1" href="" alt=""> <img  alt="" src="navi-img/suoluetu.jpg"> </a>
            <a id="suluetu2" href="" alt=""> <img alt="" src="navi-img/suoluetu.jpg"> </a>
            <a id="suluetu1" href="" alt=""> <img alt="" src="navi-img/suoluetu.jpg"> </a>
            <a id="suluetu2" href="" alt=""> <img alt="" src="navi-img/suoluetu.jpg"> </a>
            <a id="suluetu1" href="" alt=""> <img alt="" src="navi-img/suoluetu.jpg"> </a>
            <a id="suluetu2" href="" alt=""> <img alt="" src="navi-img/suoluetu.jpg"> </a>
            <a id="suluetu1" href="" alt=""> <img alt="" src="navi-img/suoluetu.jpg"> </a>
            <a id="suluetu2" href="" alt=""> <img alt="" src="navi-img/suoluetu.jpg"> </a>
            <div id="page-word">
               <a id="page-word-link" href="" alt=""> 尾页 </a>
               <a id="page-word-link" href="" alt=""> 下一页 </a>
               <a id="page-word-link" href="" alt=""> 5 </a>
               <a id="page-word-link" href="" alt=""> 4 </a>
               <a id="page-word-link" href="" alt=""> 3 </a>
               <a id="page-word-link" href="" alt=""> 2 </a>
               <a id="page-word-link" href="" alt=""> 1 </a>
               <a id="page-word-link" href="" alt=""> 上一页 </a>
               <a id="page-word-link" href="" alt=""> 首页 </a>
            </div>-->
            </div> 
          </div>
          <div id="pages" style="font-size:12px;color:black;"></div> 
          <script language="javascript"> 



var obj = document.getElementById("frameContent"); //获取内容层   
var pages = document.getElementById("pages"); //获取翻页层   
var pgindex=1;                                 //当前页   
var lastPage = 1 ;                             //最后一页   
var offsetHeight_ys = parseInt(obj.offsetHeight) ;   
window.onload = function() //重写窗体加载的事件   
{   
     //alert("parseInt(obj.scrollHeight)="+parseInt(obj.scrollHeight));   
     //alert("parseInt(obj.offsetHeight)="+parseInt(obj.offsetHeight));   
      var allpages = Math.ceil( (parseInt(obj.scrollHeight)-20) /parseInt(obj.offsetHeight));//获取页面数量   
     lastPage = allpages ;   
     pages.innerHTML = "<b>共"+allpages+"页</b>"; //输出页面数量   
      for (var i=1;i<=allpages;i++){   
         pages.innerHTML += "<a href=\"javascript:showPage('"+i+"');\">第"+i+"页</a> ";   
         //循环输出第几页   
      }   
      pages.innerHTML += " <a href=\"javascript:gotopage('-1');\">上一页</a> <a href=\"javascript:gotopage('1');\">下一页</a>"   
}   
  
function gotopage(value){   
     try{   
    value=="-1"?showPage(pgindex-1):showPage(pgindex+1);   
     }catch(e){   
     }   
}   
  
function showPage(pageINdex)   
{   
//alert("pageINdex="+pageINdex);   
if( pageINdex > lastPage){   
     //alert("超过最大值");   
    obj.style.height = "366px" ; //这里200px与css中的height:200px一样   
    pageINdex = lastPage  
}else if( pageINdex < 1){   
     pageINdex = 1 ;   
}   
var temp = parseInt(obj.offsetHeight) ;   
//当遮挡长度+显示长度> 总的长度，即翻到最后一页，就会出现问题，以下是一种解决方法。   
if( (pageINdex-1)*parseInt(obj.offsetHeight) + 366 > parseInt(obj.scrollHeight)){   
     //alert("当遮挡长度+显示长度> 总的长度");   
    obj.style.height = (parseInt(obj.scrollHeight) - (pageINdex-1)*parseInt(obj.offsetHeight) )+"px" ;   
     //根据高度,输出指定的页,这个高度必须保持为一个值,(obj.offsetHeight)会因为obj.style.height改变而改变.所以这里用temp先取到输出的高度.   
    obj.scrollTop=(pageINdex-1)*temp ;                         
}else{   
    obj.style.height = "366px" ;//这里200px与css中的height:200px一样   
    obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight) ; //根据高度，输出指定的页   
}   
pgindex= parseInt(pageINdex);   //转换成int，否则页数相加的时候容易变成字符串相加   
}   





</script> 
            
       </div>

   
   </div>
  
</body>

</html>




















