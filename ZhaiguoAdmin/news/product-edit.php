<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$type1 = $_GET['type'];
if($type1 == '1'){$type1='��˾����';}
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
<title>�ﳯ�˹�����̨����ƽ̨</title>
</head>
<body>
<?php include('../menu.php'); ?>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;�������&nbsp;&nbsp;</a>
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
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">�༭
            		  </a>
            		  <a   href="product_del_yes.php?type=<?php echo $type1.'_'.$pro["prokey"];?>"
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">ɾ��
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
            		  style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">�༭
            		  </a>
            		  <a href="product_del_yes.php?type=<?php echo $type1.'_'.$pro["prokey"];?>"  
            		   style="display:block;color:black;float:left;height:40px;line-height:40px;margin-left:10px;">ɾ��
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
    obj.style.height = "516px" ; //����200px��css�е�height:200pxһ��   
    pageINdex = lastPage  
}else if( pageINdex < 1){   
     pageINdex = 1 ;   
}   
var temp = parseInt(obj.offsetHeight) ;   
//���ڵ�����+��ʾ����> �ܵĳ��ȣ����������һҳ���ͻ�������⣬������һ�ֽ��������   
if( (pageINdex-1)*parseInt(obj.offsetHeight) + 516 > parseInt(obj.scrollHeight)){   
     //alert("���ڵ�����+��ʾ����> �ܵĳ���");   
    obj.style.height = (parseInt(obj.scrollHeight) - (pageINdex-1)*parseInt(obj.offsetHeight) )+"px" ;   
     //���ݸ߶�,���ָ����ҳ,����߶ȱ��뱣��Ϊһ��ֵ,(obj.offsetHeight)����Ϊobj.style.height�ı���ı�.����������temp��ȡ������ĸ߶�.   
    obj.scrollTop=(pageINdex-1)*temp ;                         
}else{   
    obj.style.height = "516px" ;//����200px��css�е�height:200pxһ��   
    obj.scrollTop=(pageINdex-1)*parseInt(obj.offsetHeight) ; //���ݸ߶ȣ����ָ����ҳ   
}   
pgindex= parseInt(pageINdex);   //ת����int������ҳ����ӵ�ʱ�����ױ���ַ������   
}
</script> 
</html>