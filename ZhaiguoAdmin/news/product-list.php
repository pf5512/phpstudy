<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$type1 = $_GET['type'];
$temp_pro = new news(); 
?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="description" content="�ﳯ��">
<link rel="stylesheet" type="text/css" href="all-classify-page.css" />
<link rel="stylesheet" type="text/css" href="logo-navi.css" />
<title>�ﳯ��</title>
</head>
<body>
<div style="width:100%; height:132px; background:url('navi-img/logo-navi-background.jpg') repeat scroll 0% 0% transparent">
<div style="display:block;padding:0;width:1000px;height:152px;margin:0 auto;">
<div class="head"><!-- logo+����ģ�飬���ﶨ��logo+�����ľ��� -->
    <img class="logo" alt="" src="navi-img/logo.jpg"><!-- logoģ�� -->
    <div class="navi-all" id="navi0">
    <a  href="../index.php" class="navi-all-down">HOME</a>
    </div>
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    <div class="navi-all">
    <a  href="../about.html" class="navi-all-down">ABOUT US</a>
    </div>
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    <div class="navi-all" >
    <a  href="../pro/product-list.php?type=1_1_1_1" class="navi-all-down">INSTRUMENTS</a>
    </div>
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    <div class="navi-all" >
    <a  href="../filss/product-list.php?type=1_1_1_1" class="navi-all-down">EQUIPMENTS</a>
    </div>
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    <div class="navi-all" >
    <a  href="../news/product-list.php?type=1_1_1_1" class="navi-all-down">MATERIALS</a>
    </div>
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    <div class="navi-all" >
    <a  href="../news2/product-list.php?type=1_1_1_1" class="navi-all-down">NEWS</a>
    </div>
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    <div class="navi-all" >
    <a  href="../contact.html" class="navi-all-down">CONTACT US</a>
    </div> 
</div>

<div id="up-banner">
    <img class="up-banner-img" alt="" src="navi-img/up-banner-img1.jpg">
</div>
</div>
</div>
<img class="banner-img" alt=""  src="news-img/news-banner.jpg">
<img class="banner-title" alt=""  src="news-img/news-banner-title.jpg">
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
       <div id="pro-content"> 
            <?php 
            //echo $type1.'_'.$type2.'_'.$type3.'_'.$type4.'_';
            $prokey_list = $temp_pro->prokey_list($type1);
            //krsort($type2_list);
            if( count($prokey_list)< 13 ){
            ?> <div style="height:348px;" id="frameContent1">  <?php 
            }
            else{
            	?><div id="frameContent"> <?php
            }?> 
            <div id="inside">
            <?php 
            $kj = 0;
            foreach($prokey_list as $temp_prokey){
                   $t_data = $temp_pro->get_product_data($temp_prokey);
                   $t_time = $t_data[5];
                   $t_title = $t_data[6];
                   $t_content = $t_data[7];
                   
                   if($kj == 0 ){
                   	$kj = 1;
                   	?>
            		<span class="news-content1">
            		  <a  target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$temp_prokey;?>" alt="" style="color:black; float:left;"><?php echo $t_title;?></a> 
            		  <span href="" alt="" style="float:right;"><?php echo $t_time;?></span>
            		</span>
            		<?php 
                   }
                   else if($kj == 1 ){
                   	$kj = 0;
                   	?>
            		<span class="news-content2">
            		 <a  target="_blank" href="single_product.php?type=<?php echo $type1.'_'.$temp_prokey;?>" alt="" style="color:black; float:left;"><?php echo $t_title;?></a> 
            		  <span style="float:right;"><?php echo $t_time;?></span> 
            		</span>
            		<?php 
                   }
            }
       ?> 	
            </div> 
          </div>
          <div id="pages" style="clear:left;float:left;font-size:12px;color:black;"></div> 
</div>
</div>
</div>
<span style="margin-top:10px;clear:left;float:left;font-family:Microsoft Yahei;font-size:13px;color:white;background-color:#992824;width:100%;display:block;text-align:center; height:30px;line-height:30px;">Copyright by Betop</span> 
</body>
<script language="javascript"> 
var obj = document.getElementById("frameContent"); //��ȡ���ݲ�   
var pages = document.getElementById("pages"); //��ȡ��ҳ��   
var pgindex=1;                                 //��ǰҳ   
var lastPage = 1 ;                             //���һҳ   
var offsetHeight_ys = parseInt(obj.offsetHeight) ;   
window.onload = function() //��д������ص��¼�   
{   
     //alert("parseInt(obj.scrollHeight)="+parseInt(obj.scrollHeight));   
     //alert("parseInt(obj.offsetHeight)="+parseInt(obj.offsetHeight));   
      var allpages = Math.ceil( (parseInt(obj.scrollHeight)-20) /parseInt(obj.offsetHeight));//��ȡҳ������   
     lastPage = allpages ;   
     pages.innerHTML = "<b>��"+allpages+"ҳ</b>"; //���ҳ������   
      for (var i=1;i<=allpages;i++){   
         pages.innerHTML += "<a href=\"javascript:showPage('"+i+"');\">��"+i+"ҳ</a> ";   
         //ѭ������ڼ�ҳ   
      }   
      pages.innerHTML += " <a href=\"javascript:gotopage('-1');\">��һҳ</a> <a href=\"javascript:gotopage('1');\">��һҳ</a>"   
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
     //alert("�������ֵ");   
    obj.style.height = "336px" ; //����200px��css�е�height:200pxһ��   
    pageINdex = lastPage  
}else if( pageINdex < 1){   
     pageINdex = 1 ;   
}   
var temp = parseInt(obj.offsetHeight) ;   
//���ڵ�����+��ʾ����> �ܵĳ��ȣ����������һҳ���ͻ�������⣬������һ�ֽ��������   
if( (pageINdex-1)*parseInt(obj.offsetHeight) + 336 > parseInt(obj.scrollHeight)){   
     //alert("���ڵ�����+��ʾ����> �ܵĳ���");   
    obj.style.height = (parseInt(obj.scrollHeight) - (pageINdex-1)*parseInt(obj.offsetHeight) )+"px" ;   
     //���ݸ߶�,���ָ����ҳ,����߶ȱ��뱣��Ϊһ��ֵ,(obj.offsetHeight)����Ϊobj.style.height�ı���ı�.����������temp��ȡ������ĸ߶�.   
    obj.scrollTop=(pageINdex-1)*temp ;                         
}else{   
    obj.style.height = "336px" ;//����200px��css�е�height:200pxһ��   
    obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight) ; //���ݸ߶ȣ����ָ����ҳ   
}   
pgindex= parseInt(pageINdex);   //ת����int������ҳ����ӵ�ʱ�����ױ���ַ������   
}   
</script> 
</html>