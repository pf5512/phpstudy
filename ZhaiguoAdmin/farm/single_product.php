<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$urldata = $_GET['type'];
$type_list = explode('_',$urldata);
$type1 = $type_list[0];
$keyd = $type_list[1];
$temp_pro = new farm(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="description" content="凤朝凰">
<link rel="stylesheet" type="text/css" href="all-classify-page.css" />
<link rel="stylesheet" type="text/css" href="logo-navi.css" />
<title>凤朝凰</title>
</head>

<body>

<div style="width:100%; height:132px;">
<div style="display:block;padding:0;width:1000px;height:152px;margin:0 auto;">
<div class="head"><!-- logo+导航模块，用语定义logo+导航的居中 -->
    <img class="logo" alt="" src="navi-img/logo.jpg"><!-- logo模块 -->
    <div class="navi-all" id="navi0">
    <a  href="../index.php" class="navi-all-down">HOME</a>
    </div>
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    <div class="navi-all">
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
    <a  href="../farm/product-list.php?type=1_1_1_1" class="navi-all-down">MATERIALS</a>
    </div>
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    <div class="navi-all" >
    <a  href="../contact.html" class="navi-all-down">CONTACT US</a>
    </div>
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logo模块 -->
    <div class="navi-all" >
    <a  href="../farm2/product-list.php?type=1_1_1_1" class="navi-all-down">farm</a>
    </div>
</div>
</div>
</div>

<img class="banner-img" alt=""  src="farm-img/farm-banner.jpg">
<img class="banner-title" alt=""  src="farm-img/farm-banner-title.jpg">
   <div id="pro-all">

       <div id="pro-navi"> 
          
          <?php 
          	$type1_list = $temp_pro->type1_list();
          	//echo $type1_list[0].$type1_list[1];
          	if( count( $type1_list )!=0 && $type1 == '1' ) {$type1 = $type1_list[0];}
          	//echo count( $type2_list);
          	if( count( $type1_list )!=0 && ! ( count( $type1_list )< 1 && $type1_list[0]==0 ) ){
          	  foreach($type1_list as $temp1){
          		if( $temp1 == $type1 ){
          			?>
          			<a id="pro-navi-1-cli" class="pro-navi-1" href="product-list.php?type=<?php echo $temp1;?>" alt="">  &nbsp;<?php echo $temp1;?> </a>
          			<?php
          		}
          		else{
          			?>
          			<a class="pro-navi-1" href="product-list.php?type=<?php echo $temp1;?>" alt=""> &nbsp;<?php echo $temp1;?> </a>
          			<?php 
          		}
          	 }
          	}
          
          ?>
       </div>
       
       <div style="margin-left:13px;" id="pro-content"> 
       <?php 
        $t_data = $temp_pro->get_product_data($keyd);
                   $t_time = $t_data[5];
                   $t_title = $t_data[6];
                   $t_content = $t_data[7];
       ?>
            <span style="width:750px;height:35px;line-height:35px;
            font-size:20px;font-family:Microsoft Yahei;font-weight:bold;
            clear:left;float:left;
            text-align:center;"> 
            <?php  echo $t_title;?>
            </span><br>
            
            <span style="width:750px;height:25px;line-height:25px;
            font-size:13px;font-family:Microsoft Yahei;
            clear:left;float:left;
            text-align:center;"> 
                      日期:<?php  echo $t_time;?>&nbsp;&nbsp;&nbsp;贝拓<?php echo $type1;?>动态
            </span><br>
            <img style="clear:left; float:left;" alt="" src="farm-img/farm-cointent-jiange.jpg">
            
            
            <span style="width:750px;height:auto;line-height:25px;margin-top:5px;
            font-size:13px;font-family:Microsoft Yahei;
            clear:left;float:left;
            text-align:left;<?php if( strlen( $t_content )< 680  ){echo 'height:348px;';}?>"> <?php  echo $t_content;?></span><br>

       </div>

   
   </div>
 <span style="margin-top:10px;clear:left;float:left;font-family:Microsoft Yahei;font-size:13px;color:white;background-color:#992824;width:100%;display:block;text-align:center; height:30px;line-height:30px;">Copyright by Betop</span>

  
</body>

</html>






















