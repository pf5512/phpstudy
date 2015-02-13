<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
include 'product/iplist.php';
$urldata = $_GET['type'];
$type_list = explode('_',$urldata);
$type1 = $type_list[0];
$type2 = $type_list[1];
$type3 = $type_list[2];
$type4 = $type_list[3];
$this_type = $type_list[4];
$temp_pro = new prolist(); 
$temp_ip = new iplist();
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
    <a  href="../index.php" class="navi-all-down">HOME</a>
    </div>
    
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../about.html" class="navi-all-down">ABOUT US</a>
    </div>
    
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../pro/product-list.php?type=1_1_1_1" class="navi-all-down">INSTRUMENTS</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../filss/product-list.php?type=1_1_1_1" class="navi-all-down">EQUIPMENTS</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
    <a  href="../news/product-list.php?type=1_1_1_1" class="navi-all-down">MATERIALS</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    
    <div class="navi-all" >
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
          	if( count( $type1_list )!=0 && $type1 == '1' ) {$type1 = $type1_list[0];}
          	//echo count( $type2_list);
          	if( count( $type1_list )!=0  ){
          	  foreach($type1_list as $temp1){
          		if( $temp1 == $type1 ){
          			?>
          			<a id="pro-navi-1-cli" class="pro-navi-1" href="product-list.php?type=<?php echo $type1;?>_1_1_1" alt="">  &nbsp;&nbsp;<?php echo $temp1;?>-</a>
          			<?php
          			$type2_list = $temp_pro->type2_list($type1);
          			
          			if( count( $type2_list )!=0 &&  $type2 == '1' ) {$type2 = $type2_list[0];}
          		    if( count( $type2_list )!=0 &&  ! ( count( $type2_list )<= 1 && $type2_list[0]==0 ) ) {
          			foreach($type2_list as $temp2){	
          				if( $temp2 == $type2 ){
          					?>
          					<a id="pro-navi-2-cli"  class="pro-navi-2" href="product-list.php?type=<?php echo $type1;?>_<?php echo $temp2;?>_<?php echo $type3;?>_1" alt=""> &nbsp; <?php echo $temp2;?> </a>
          				<?php 
          				}
          				else{
          					?>
          					<a class="pro-navi-2" href="product-list.php?type=<?php echo $type1;?>_<?php echo $temp2;?>_<?php echo $type3;?>_1" alt=""> &nbsp; <?php echo $temp2;?> </a>
          					<?php 
          				}
          			}
          		 }
          		
          		}
          		else{
          			?>
          			<a class="pro-navi-1" href="product-list.php?type=<?php echo $temp1;?>_1_1_1" alt=""> &nbsp; <?php echo $temp1;?>+ </a>
          			<?php 
          		}
          	 }
          	}
          
          ?>
       </div>
       
       <div id="pro-content-111"> 
        <?php  $arr = $temp_pro->get_product_data($this_type);?>
          <div class="pro-content-tap">
             <div class="pro-content-tap-img-big">
             <img class="pro-content-tap-img" alt="" src="pro-img/xiangqing/<?php echo $this_type?>.jpg">          
             </div>
            
            <div class="pro-content-tap-right"> 
               <span class="pro-content-tap-title"> <?php echo $arr[6];?> </span><br>
               <img  style="clear:left; float:left;" alt="" src="product-img/product-tap-jiange.jpg">
               <span class="pro-content-tap-word"> INSTRUMENTS编码: <?php echo $arr[0];?></span>
               <span class="pro-content-tap-word"> 厂商性质: <?php echo $arr[8];?></span><br>
               <span class="pro-content-tap-word"> 品牌名称: <?php echo $arr[4];?></span>
               <span class="pro-content-tap-word"> 产地: <?php echo $arr[9];?></span><br>
               <?php if (  $arr[3] !='0'){
               	  if( $temp_ip->check_ip() ){
               	?>
               	<a style="margin-top:10px; display:block;color:#992824;
                      clear:left;float:left;margin-top:0px;
                      width:70px;height:20px;border:1px solid #992824;
                      text-align:center;line-height:20px;font-family:Microsoft Yahei;font-size:13px;"
                      target="_blank" href="pro-img/xiangqing/<?php echo $arr[0].$arr[3]?>" alt="">
                       
                       样本下载
            </a>
               	<?php 
               	  }
               	  
               	  else{
               	  	?>
               	<a style="margin-top:10px; display:block;color:#992824;
                      clear:left;float:left;margin-top:0px;
                      width:auto;height:20px;border:1px solid #992824;
                      text-align:center;line-height:20px;font-family:Microsoft Yahei;font-size:13px;"
                      target="_blank" href="../contact.html" alt="">
                       
                       &nbsp;&nbsp;样本下载(请先留言再下载)&nbsp;&nbsp;
            </a>
               	<?php 
               	  }
               } ?>
            </div>
          </div>
          <img style="clear:left; float:left;" alt="" src="product-img/product-detail-jiange.jpg">
          <span class="pro-content-detail">  <?php echo $arr[7];?></span><br>
       </div>

   
   </div>
   
<span style="margin-top:10px;clear:left;float:left;font-family:Microsoft Yahei;font-size:13px;color:white;background-color:#992824;width:100%;display:block;text-align:center; height:30px;line-height:30px;">Copyright by Betop</span>
    

  
</body>

</html>






















