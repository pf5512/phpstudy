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
<meta name="description" content="�ﳯ��">
<link rel="stylesheet" type="text/css" href="all-classify-page.css" />
<link rel="stylesheet" type="text/css" href="logo-navi.css" />
<title>�ﳯ�˹�����̨����ƽ̨</title>
</head>

<body>

<div style="width:100%; height:132px; background: url(navi-img/logo-navi-background.jpg) repeat;">




<div style="display:block;padding:0;width:1000px;height:152px;margin:0 auto;">


<div class="head"><!-- logo+����ģ�飬���ﶨ��logo+�����ľ��� -->
    
    <img class="logo" alt="" src="navi-img/logo.jpg"><!-- logoģ�� -->
    <div class="navi-all" id="navi0">
    <a  href="../index.php" class="navi-all-up">��ҳ</a> <!-- ��������ѡ��ģ�� -->
    <a  href="../index.php" class="navi-all-down">HOME</a>
    </div>
    
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    
    <div class="navi-all" >
    <a  href="../about.html" class="navi-all-up">���ڱ���</a> <!-- ��������ѡ��ģ�� -->
    <a  href="../about.html" class="navi-all-down">ABOUT US</a>
    </div>
    
    <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    
    <div class="navi-all" >
    <a  href="../pro/product-list.php?type=1_1_1_1" class="navi-all-up">INSTRUMENTS</a> <!-- ��������ѡ��ģ�� -->
    <a  href="../pro/product-list.php?type=1_1_1_1" class="navi-all-down">PRODUCTS</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    
    <div class="navi-all" >
    <a  href="../filss/product-list.php?type=1_1_1_1" class="navi-all-up">Ӧ������</a> <!-- ��������ѡ��ģ�� -->
    <a  href="../filss/product-list.php?type=1_1_1_1" class="navi-all-down">APPLICATION</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    
    <div class="navi-all" >
    <a  href="../news/product-list.php?type=1" class="navi-all-up">��������</a> <!-- ��������ѡ��ģ�� -->
    <a  href="../news/product-list.php?type=1" class="navi-all-down">NEWS</a>
    </div>
    
     <img class="navi-beside" alt="" src="navi-img/navi-beside.jpg"><!-- logoģ�� -->
    
    <div class="navi-all" >
    <a  href="../contact.html" class="navi-all-up">��ϵ����</a> <!-- ��������ѡ��ģ�� -->
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
            		               �鿴����>>
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

<span style="margin-top:10px;clear:left;float:left;font-family:Microsoft Yahei;font-size:13px;color:white;background-color:#992824;width:100%;display:block;text-align:center; height:30px;line-height:30px;">Copyright BY Beittuo �ﳯ�� ��Ȩ����</span>
  
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
    obj.style.height = "420px" ; //����200px��css�е�height:200pxһ��   
    pageINdex = lastPage  
}else if( pageINdex < 1){   
     pageINdex = 1 ;   
}   
var temp = parseInt(obj.offsetHeight) ;   
//���ڵ�����+��ʾ����> �ܵĳ��ȣ����������һҳ���ͻ�������⣬������һ�ֽ��������   
if( (pageINdex-1)*parseInt(obj.offsetHeight) + 420 > parseInt(obj.scrollHeight)){   
     //alert("���ڵ�����+��ʾ����> �ܵĳ���");   
    obj.style.height = (parseInt(obj.scrollHeight) - (pageINdex-1)*parseInt(obj.offsetHeight) )+"px" ;   
     //���ݸ߶�,���ָ����ҳ,����߶ȱ��뱣��Ϊһ��ֵ,(obj.offsetHeight)����Ϊobj.style.height�ı���ı�.����������temp��ȡ������ĸ߶�.   
    obj.scrollTop=(pageINdex-1)*temp ;                         
}else{   
    obj.style.height = "420px" ;//����200px��css�е�height:200pxһ��   
    obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight) ; //���ݸ߶ȣ����ָ����ҳ   
}   
pgindex= parseInt(pageINdex);   //ת����int������ҳ����ӵ�ʱ�����ױ���ַ������   
}   
</script> 
</html>






















