<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$type1 = $_GET['type'];
if($type1 == '1'){$type1='公司新闻';}
$type2 = 0;//echo $type2;
$type3 = 0;//echo $type3;
$type4 = 0;//echo $type4;
$temp_pro = new news(); 
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
<?php include('../menu.php'); ?>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;新闻管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;新闻添加&nbsp;&nbsp;</a>
      <br><br>
  </span>
    <span style="display:block; width:1000px; clear:left; margin:0 auto;font-size:14px;font-family:Microsoft Yahei;text-align:center;margin-top:10px;"> 
      <?php 
      $type1_list = $temp_pro->type1_list();
      foreach($type1_list as $temp1){
      	?>
      	<a href="product-edit.php?type=<?php echo $temp1;?> " style="background-color:grey;color:white;">&nbsp;&nbsp;<?php echo $temp1;?>&nbsp;&nbsp;</a>
      	<?php 
      }
      ?>
   </span>
   <div id="pro-all">
       <div id="pro-content"> 
            <br>
            <?php 
            if( $type2=='0' ) {$type3 = $type4 = '0';}
            if( $type3=='0' ) {$type4 = '0';}
            $prokey_list = $temp_pro->prokey_list($type1,$type2,$type3,$type4);
            ?>
            <div  style="height:516px;" id="frameContent"> 
            <div  id="inside">
            <?php 
            $test = 0;
            foreach($prokey_list as $pro){
            	//echo $temp_prokey.'hh';
            	if( $test == 0 ){
            		$test = 1;
            		?>
            		<span style="display:block;color:black;clear:left;float:left;width:392px;height:132px;margin-left:10px; font-family:Microsoft Yahei; font-size:13px;" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>" alt="">            	
            		  <span  style="display:block;color:black;float:left;height:40px;line-height:40px;">
                      <?php $tempdata = $temp_pro->get_product_data($pro["prokey"]);echo $tempdata[6];?>
            		  </span>
            		  <a target="_blank" href="../single-new.php?type=<?php echo $pro["prokey"];?>">
                      <img  style="display:block;float:left;width:392px;height:92px;" alt="" src=<?php echo 'pro-img/xiangqing/'.$pro["prokey"].'.jpg';?>>  
                      </a>
            		  <a target="_blank" href="../single-new.php?type=<?php echo $type1.'_'.$pro["prokey"];?>"  
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;"><?php echo $tempdata[5];?>
            		  </a>
            		  <a target="_blank" href="product_edit_single.php?type=<?php echo $pro["prokey"];?>"  
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">编辑
            		  </a>
            		  <a   href="product_del_yes.php?type=<?php echo $type1.'_'.$pro["prokey"];?>"
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">删除
            		  </a>
            		  <br>
            		</span>
            		<?php 
            	}
                else if( $test == 1 ){
            		$test = 0;
            		?>
            		<span style="display:block;color:black;float:left;width:392px;height:172px;margin-left:10px; font-family:Microsoft Yahei; font-size:13px;" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>" alt="">            	
                      <span  style="display:block;color:black;float:left;height:40px;line-height:40px;">
                      <?php $tempdata = $temp_pro->get_product_data($pro["prokey"]);echo $tempdata[6];?>
            		  </span>
                      <a target="_blank" href="../single-new.php?type=<?php echo $pro["prokey"];?>">
                      <img  style="display:block;float:left;width:392px;height:92px;" alt="" src=<?php echo 'pro-img/xiangqing/'.$pro["prokey"].'.jpg';?>>  
                      </a>
                      <a target="_blank" href="../single-new.php?type=<?php echo $pro["prokey"];?>"  
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;"><?php echo $tempdata[5];?>
            		  </a>
            		  <a target="_blank" href="product_edit_single.php?type=<?php echo $pro["prokey"];?>"  
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">编辑
            		  </a>
            		  <a href="product_del_yes.php?type=<?php echo $type1.'_'.$pro["prokey"];?>"  
            		   style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">删除
            		  </a>
            		</span>
            		<?php 
            	}
            	
            }
       ?>
            </div> 
          </div>
          <div id="pages" style="font-size:12px;color:black;"></div>
       </div>
   </div>
</body>
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
    obj.style.height = "516px" ; //这里200px与css中的height:200px一样   
    pageINdex = lastPage  
}else if( pageINdex < 1){   
     pageINdex = 1 ;   
}   
var temp = parseInt(obj.offsetHeight) ;   
//当遮挡长度+显示长度> 总的长度，即翻到最后一页，就会出现问题，以下是一种解决方法。   
if( (pageINdex-1)*parseInt(obj.offsetHeight) + 516 > parseInt(obj.scrollHeight)){   
     //alert("当遮挡长度+显示长度> 总的长度");   
    obj.style.height = (parseInt(obj.scrollHeight) - (pageINdex-1)*parseInt(obj.offsetHeight) )+"px" ;   
     //根据高度,输出指定的页,这个高度必须保持为一个值,(obj.offsetHeight)会因为obj.style.height改变而改变.所以这里用temp先取到输出的高度.   
    obj.scrollTop=(pageINdex-1)*temp ;                         
}else{   
    obj.style.height = "516px" ;//这里200px与css中的height:200px一样   
    obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight) ; //根据高度，输出指定的页   
}   
pgindex= parseInt(pageINdex);   //转换成int，否则页数相加的时候容易变成字符串相加   
}
</script> 
</html>