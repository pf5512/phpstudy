<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';

$urldata = $_GET['type'];
$type_list = explode('_',$urldata);

$type1 = $type_list[0];
$typekk =  $type1;
$type2 = $type_list[1];
$type3 = $type_list[2];
$type4 = $type_list[3];
$type4kk = $type4;
$temp_pro = new prolist(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="description" content="凤朝凰">
<link rel="stylesheet" type="text/css" href="all-classify-page.css" />
<link rel="stylesheet" type="text/css" href="logo-navi.css" />
<title>凤朝凰官网后台管理平台</title>
</head>

<body>

<div style="width:100%; height:132px; background: url(navi-img/logo-navi-background.jpg) repeat;">




<div style="display:block;padding:0;width:1000px;height:152px;margin:0 auto;">


<div class="head"><!-- logo+导航模块，用语定义logo+导航的居中 -->
    
    <img class="logo" alt="" src="navi-img/logo.jpg"><!-- logo模块 -->
    <div class="navi-all" id="navi0">
    <a  href="../index.php" class="navi-all-up">首页</a> <!-- 单个导航选择模块 -->
    <a  href="../index.php" class="navi-all-down">HOME</a>
    </div>
    
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../about.html" class="navi-all-up">关于贝拓</a> <!-- 单个导航选择模块 -->
    <a  href="../about.html" class="navi-all-down">ABOUT US</a>
    </div>
    
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../pro/product-list.php?type=1_1_1_1" class="navi-all-up">INSTRUMENTS</a> <!-- 单个导航选择模块 -->
    <a  href="../pro/product-list.php?type=1_1_1_1" class="navi-all-down">PRODUCTS</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../filss/product-list.php?type=1_1_1_1" class="navi-all-up">应用中心</a> <!-- 单个导航选择模块 -->
    <a  href="../filss/product-list.php?type=1_1_1_1" class="navi-all-down">APPLICATION</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../news/product-list.php?type=1" class="navi-all-up">新闻中心</a> <!-- 单个导航选择模块 -->
    <a  href="../news/product-list.php?type=1" class="navi-all-down">NEWS</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../contact.html" class="navi-all-up">联系贝拓</a> <!-- 单个导航选择模块 -->
    <a  href="../contact.html" class="navi-all-down">CONTACT</a>
    </div>
    
    
</div>

<div id="up-banner">
    <img id="up-banner-img" alt="" src="navi-img/up-banner-img.jpg">
</div>


 
</div>


</div>
<img class="banner-img" alt=""  src="product-img/banner.jpg">
<div class="banner-title12" >
  <a href="product-list.php?type=1_1_1_1" class="banner-title1"> <img alt=""  src="product-img/banner-title1.jpg">   </a>
  <img class="banner-title2" alt=""  src="product-img/banner-title2.jpg"> 
</div>
   <div id="pro-all">

       <div id="pro-navi"> 
       
       
          <?php 
          	$type1_list = $temp_pro->type1_list();
          	//echo count( $type1_list );
          	if( count( $type1_list )!=0 && $type1 == '1' ) {$type1 = $type1_list[0];}
          	//echo count( $type2_list);
          	if( count( $type1_list )!=0 && ! ( count( $type1_list )< 1 && $type1_list[0]==0 ) ){
          	  foreach($type1_list as $temp1){
          		if( $temp1 == $type1 && $typekk!='0' ){
          			?>
          			<a id="pro-navi-1-cli" class="pro-navi-1" href="product-list-t.php?type=<?php echo $type1;?>_1_1_1" alt="">  &nbsp;&nbsp;<?php echo $temp1;?>-</a>
          			<?php
          			$type2_list = $temp_pro->type2_list($type1);
          			
          			if( count( $type2_list )!=0 &&  $type2 == '1' ) {$type2 = $type2_list[0];}
          		    if( count( $type2_list )!=0 &&  ! ( count( $type2_list )< 1 && $type2_list[0]==0 ) ) {
          			foreach($type2_list as $temp2){	
          				if( $temp2 == $type2  && $typekk!='0'){
          					?>
          					<a id="pro-navi-2-cli"  class="pro-navi-2" href="product-list-t.php?type=<?php echo $type1;?>_<?php echo $temp2;?>_<?php echo $type3;?>_1" alt=""> &nbsp; <?php echo $temp2;?> </a>
          				<?php 
          				}
          				else{
          					?>
          					<a class="pro-navi-2" href="product-list-t.php?type=<?php echo $type1;?>_<?php echo $temp2;?>_<?php echo $type3;?>_1" alt=""> &nbsp; <?php echo $temp2;?> </a>
          					<?php 
          				}
          			}
          		 }
          		
          		}
          		else{
          			?>
          			<a class="pro-navi-1" href="product-list-t.php?type=<?php echo $temp1;?>_1_1_1" alt=""> &nbsp; <?php echo $temp1;?>+ </a>
          			<?php 
          		}
          	 }
          	}
          
          	
          	$brand_list = $temp_pro->type_brandlist();
          
          ?>
          
          <a id="pro-navi-1-cli-title" href="product-list-b.php?type=1_1_1_1"> <img alt="" src="product-img/banner-title3.jpg">  </a>
          <?php 
          for( $kn = 0 ;$kn < count($brand_list) ; $kn++){
          	if( $typekk == '0' &&  $type4kk == $brand_list[$kn] ){
          	?>
          	   <a id="pro-navi-1-cli" class="pro-navi-1" href="product-list-t.php?type=0_1_1_<?php echo $brand_list[$kn];?>" alt="">  &nbsp;&nbsp;<?php echo $brand_list[$kn];?>-</a>
          	
          	<?php 
          	}
          	else{?>
          		<a   class="pro-navi-1" href="product-list-t.php?type=0_1_1_<?php echo $brand_list[$kn];?>" alt="">  &nbsp;&nbsp;<?php echo $brand_list[$kn];?>-</a>
          	<?php 
          	}
          }
          
          ?>
          		
          
          
       </div>
       
       <div id="pro-content"> 
            <br>
            <?php 
            if( $type2=='0' ) {$type3 = $type4 = '0';}
            if( $type3=='0' ) {$type4 = '0';}
           if(  $typekk == '0' ) {
           	$prokey_list = $temp_pro->type_brandkeylist($type4kk);
           }
           
           if(  $typekk != '0' ) {
           	$prokey_list = $temp_pro->prokey_list($type1,$type2,$type3,$type4);
           }
            
            if( count($prokey_list)< 4 ){
            ?> <div style="height:388px;" id="frameContent1">  <?php 
            }
            else{
            	?><div id="frameContent"> <?php
            }?> 
              <div  id="inside">
              <?php 
              foreach($prokey_list as $temp_prokey){
            		?>
            	<div class="promes-all" >
            		<a target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>">
                      <img  class="promes-img" alt="" src=<?php echo 'pro-img/xiangqing/'.$temp_prokey.'.jpg';?>>  
                    </a>

                    <div class="promes-right">
                       <span class="promes-words-title">
                       <?php $tempdata = $temp_pro->get_product_data($temp_prokey);echo $tempdata[6];?>
            		   </span>
            		   <br>
            		   <span class="promes-words-content">
                        <?php
                          if( strlen( $tempdata[7] ) > 250 ){
                          	$tmd = substr( $tempdata[7], 0 ,250).'...';
                          }
                          else {$tmd =  $tempdata[7];}
                           echo $tmd;
                        ?>
            	           <a style="color:#992824;" class="promes-a" target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_'.$temp_prokey;?>">
            		               查看更多>>
            		       </a>
            	       </span>
            		  
            		   
            		</div>
            	</div>
            		
            		<?php 
            }
                    ?>
           
              </div> 
          </div>
          <div id="pages" style="font-size:12px;color:black;"></div> 
         
            
       </div>
       </div>
</div>

<span style="margin-top:10px;clear:left;float:left;font-family:Microsoft Yahei;font-size:13px;color:white;background-color:#992824;width:100%;display:block;text-align:center; height:30px;line-height:30px;">Copyright BY Beittuo 凤朝凰 版权所有</span>
  
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
    obj.style.height = "420px" ; //这里200px与css中的height:200px一样   
    pageINdex = lastPage  
}else if( pageINdex < 1){   
     pageINdex = 1 ;   
}   
var temp = parseInt(obj.offsetHeight) ;   
//当遮挡长度+显示长度> 总的长度，即翻到最后一页，就会出现问题，以下是一种解决方法。   
if( (pageINdex-1)*parseInt(obj.offsetHeight) + 420 > parseInt(obj.scrollHeight)){   
     //alert("当遮挡长度+显示长度> 总的长度");   
    obj.style.height = (parseInt(obj.scrollHeight) - (pageINdex-1)*parseInt(obj.offsetHeight) )+"px" ;   
     //根据高度,输出指定的页,这个高度必须保持为一个值,(obj.offsetHeight)会因为obj.style.height改变而改变.所以这里用temp先取到输出的高度.   
    obj.scrollTop=(pageINdex-1)*temp ;                         
}else{   
    obj.style.height = "420px" ;//这里200px与css中的height:200px一样   
    obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight) ; //根据高度，输出指定的页   
}   
pgindex= parseInt(pageINdex);   //转换成int，否则页数相加的时候容易变成字符串相加   
}   
</script> 
</html>






















