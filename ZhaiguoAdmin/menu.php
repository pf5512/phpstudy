<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<span style="display:block; margin-top:10px;
clear:left; width:700px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
 		<a href="../index/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��ҳbanner&nbsp;&nbsp;</a>
      <a href="../pro/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;ժ������banner&nbsp;&nbsp;</a>
      <a href="../farm/product-edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;ժ��ũ��&nbsp;&nbsp;</a>
      <a href="../line/product-edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;ժ����·&nbsp;&nbsp;</a>
      <a href="../line/product-edit.php?type=1" style="background-color:#992824;color:white;  ">&nbsp;&nbsp;ժ������·�߹���&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;  ">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
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