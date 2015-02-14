
<?php
header("Content-Type: text/html; charset=gb2312");
  //header("Content-Type: text/html; charset=gb2312");
    //include 'product/prolist.php'; 
     //$temp_pro = new prolist();
   $con = mysql_connect("localhost","pfshoes1_baoni","baoni123");
   //$con = mysql_connect("localhost","root","");
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	  }
   //if (mysql_query("CREATE DATABASE beituo",$con)){echo "Database created";}
   //else{echo "Error creating database: " . mysql_error();}
     
   // if( mysql_select_db("pfshoes1_betopins", $con) ){echo "yes";}
    if( mysql_select_db("pfshoes1_betopusa", $con) ){echo "yes";}
   /*
   $sq_creat_pro= "CREATE TABLE iplist
	(ipkey varchar(255) NOT NULL PRIMARY KEY )ENGINE=MYISAM DEFAULT CharSet=utf8;";
   
   $sq_creat_pro1= "CREATE TABLE brandlist
	(
	brandkey varchar(255) NOT NULL PRIMARY KEY,
	content TEXT NOT NULL
	)ENGINE=MYISAM DEFAULT CharSet=utf8;";
   
   $sq_creat_pro2= "CREATE TABLE typelist
	(
	typekey varchar(255) NOT NULL PRIMARY KEY,
	content TEXT NOT NULL
	)ENGINE=MYISAM DEFAULT CharSet=utf8;";
   
      */
    $sq_creat_pro4= "CREATE TABLE adlist
	(
	adkey varchar(255) NOT NULL PRIMARY KEY,
	content TEXT NOT NULL,
	link TEXT NOT NULL
	)ENGINE=MYISAM DEFAULT CharSet=utf8;";
   
   
   if ( mysql_query($sq_creat_pro4,$con) ){
		echo 'adlist create!';
	}
   
    
    /*
  
  $sq_creat_pro= "CREATE TABLE pro
	(
	     prokey varchar(255) NOT NULL PRIMARY KEY,
         type1 varchar(255) NOT NULL,
         type2 varchar(255) NOT NULL,
         type3 varchar(255) NOT NULL,
         type4 varchar(255) NOT NULL,
         time varchar(255) NOT NULL,
         title varchar(255) NOT NULL,
         content TEXT NOT NULL,
         author varchar(255) NOT NULL,
         pro_description TEXT NOT NULL,
         little_img_path varchar(255) NOT NULL,
         pro_img_path1 varchar(255) NOT NULL,
         pro_img_path2 varchar(255) NOT NULL,
         pro_img_path3 varchar(255) NOT NULL,
         pro_img_path4 varchar(255) NOT NULL,
         pro_img_path5 varchar(255) NOT NULL,
         pro_img_path6 varchar(255) NOT NULL,
         pro_img_path7 varchar(255) NOT NULL,
         pro_img_path8 varchar(255) NOT NULL
	)ENGINE=MYISAM DEFAULT CharSet=utf8;";
    
   if ( mysql_query($sq_creat_pro,$con) ){
		echo 'okkkk2';
	}
 */
  mysql_query("INSERT INTO pro VALUES 
  ('0002','光学光谱','荧光光谱仪','AGILENT',0,0,'真空紫外光谱仪2','gwavqgeawgvewgageeqagawgeqegqqgeqgqwqhbwgeqgqwg','0','0','0','0','0','0','0','0','0','0','0')");
  mysql_query("INSERT INTO pro VALUES 
  ('0003','光学光谱','拉曼光谱仪','LEIKA莱卡',0,0,'真空紫外光谱仪3','gwavqgeawgvewgageeqagawgeqegqqgeqgqwqhbwgeqgqwg','0','0','0','0','0','0','0','0','0','0','0')");
  mysql_query("INSERT INTO pro VALUES 
  ('0004','元素分析','荧光光谱仪','AGILENT',0,0,'真空紫外光谱仪4','gwavqgeawgvewgageeqagawgeqegqqgeqgqwqhbwgeqgqwg','0','0','0','0','0','0','0','0','0','0','0')");
  mysql_query("INSERT INTO pro VALUES 
  ('0005','元素分析','拉曼光谱仪','LEIKA莱卡',0,0,'真空紫外光谱仪5','gwavqgeawgvewgageeqagawgeqegqqgeqgqwqhbwgeqgqwg','0','0','0','0','0','0','0','0','0','0','0')");
 
    mysql_query("INSERT INTO pro VALUES 
  ('0007','表面处理','拉曼光谱仪','LEIKA莱卡',0,0,'真空紫外光谱仪6','gwavqgeawgvewgageeqagawgeqegqqgeqgqwqhbwgeqgqwg','0','0','0','0','0','0','0','0','0','0','0')");
 
    
 /*   if ( mysql_query($sq_creat_pro,$con) ){
		echo 'okkkk2';
	}
	/*
	if ( $temp_pro->edit_pro('BN-3','BN-3','水盆','手工水盆','单盆','直角单盆') ){
		echo 'yeyeye';
	}
	if ( $temp_pro->edit_pro('BN-4','BN-4','水盆','手工水盆','单盆','圆角单盆') ){
		echo 'yeyeye';
	}
	if ( $temp_pro->edit_pro('BN-5','BN-5','水盆','手工水盆','单盆','直角单盆') ){
		echo 'yeyeye';
	}
	if ( $temp_pro->edit_pro('BN-6','BN-6','水盆','手工水盆','高边','0') ){
		echo 'yeyeye';
	}
	if ( $temp_pro->edit_pro('BN-7','BN-7','水盆','手工水盆','单盆','直角单盆') ){
		echo 'yeyeye';
	}
	*/
	
	
	//$list2 = $temp_pro->type2_list('水盆');
	//echo count($list2);
	//echo $list2[0].$list2[1].$list2[2];
	/*
	$list = $temp_pro->get_product_data('BN-4444223556DP');
	echo $list[1].'-'.$list[2].'-'.$list[3].'-'.$list[4].'-';
	if( $temp_pro->edit_pro('BN-4444223556DP','BN-4444223556DP','水盆','拉伸水盆','单盆','单盆') ){echo "hhahaha";}
*/
/*
	
*/










	//mysql_query("INSERT INTO pro VALUES ('BN-41DP','水盆','手工水盆','单盆','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')") 
	
   
	/*if ( $temp_pro->edit_pro('BN-41DP','BN-422DP',2,1,1,2)){
		echo 'yeyeye';
	}
	$typelist = $temp_pro->type4_list();
	echo $typelist[0].$typelist[1].$typelist[2];
	$temp_pro->add_pro('BN-44DP',2,2,2,1);
	$temp_pro->add_pro('BN-45DP',3,2,2,1);
	$temp_pro->add_pro('BN-46DP',4,2,2,1);
	$temp_pro->add_pro('BN-47DP',4,2,2,1);
	
	
	$list = $temp_pro->get_product_data('BN-422DP');
	echo $list[0].$list[1].$list[2].$list[3].$list[4];
	
	
	if ( $temp_pro->delete_pro('BN-41DP')){
		echo 'yeyeye';
	}*/
	
	// Create database
	/*if (mysql_query("CREATE DATABASE jj",$con)) {
	  echo "Database created";
	  }
	else {
	  echo "Error creating database: " . mysql_error();
	  }*/
	
	// Create table in my_db database
	
	/*
/*
	 if( mysql_query("INSERT INTO pro VALUES ('BN-3028',2,2,1,1,'0','0','0','0','0','0','0','0','0','0','0','0','0','0')") )
	 {echo ' 222 successful';
	 }
		
		$list = array();
        $result = mysql_query("SELECT S.type3 FROM pro S GROUP BY S.type3");
        while( $results = mysql_fetch_array($result) ){
        	array_push($list, $results[0]);
        } 
        print count($list);
        
        $jq = '4nd1';
        print 'http://localhost/rr/baoni/pro-img/suolue/'.$jq.'.jpg';
        
        $kkkkkkk = 'BN-41DP';
        $results = mysql_query("SELECT * FROM pro WHERE prokey='$kkkkkkk'");
		$aarray = mysql_fetch_array($results);
		print $aarray[0];*/
		
		
		
		    //xcopy('http://localhost/rr/baoni/pro-img/suolue/BN-41DP.jpg','http://localhost/rr/baoni/pro-img/suolue/11111.jpg',1);
		
			/*$key_des1 = 'http://localhost/rr/baoni/pro-img/suolue';
		    $key_des2 = 'http://localhost/rr/baoni/pro-img/xiangqing/BN-41DP.jpg';
		    
	        if (file_exists('pro-img/xiangqing/BN-41DP.jpg')) {
               echo 'jhiuh';
	        }*/
	        
	        //unlink('http://localhost/rr/baoni/pro-img/xiangqing/BN-3028.jpg');
	        //copy('pro-img/xiangqing/BN-3028.jpg','pro-img/xiangqing/11111.jpg');
		
        //print $list[0].$list[1].$list[2];
	
	/*
	$sql3= "CREATE TABLE prochr
	(
		 user varchar(255) NOT NULL,
		 pname varchar(255) NOT NULL,
		 series varchar(255) NOT NULL,
		 PRIMARY KEY(user,pname,series)
		 
	)ENGINE=MYISAM DEFAULT CharSet=gbk;";
	
	$sql4= "CREATE TABLE news
	(
		 ntitle varchar(255) NOT NULL,
		 ntime varchar(255) NOT NULL,
		 ncontent TEXT NOT NULL,
		 user varchar(255) NOT NULL, 
		 PRIMARY KEY(ntitle,ntime,user)
		 
	)ENGINE=MYISAM DEFAULT CharSet=gbk;";
	
	
	
	$sql5= "CREATE TABLE app
	(
		 atitle varchar(50) NOT NULL,
		 atime varchar(50) NOT NULL,
		 acontent TEXT NOT NULL,
		 user varchar(50) NOT NULL, 
		 PRIMARY KEY(atitle,atime,user)
		 	 
	)ENGINE=MYISAM DEFAULT CharSet=gbk;";

  $sql6= "DROP table app";
  $sql7= "DROP table news";
  $sql8= "DROP table prochr";
  $sql10= "DROP table user";
  $sql9= "DROP table pro";
  */

	
	//mysql_query($sql1,$con);
	//mysql_query($sql2,$con);
	/*if ( mysql_query($sql1,$con) ){
		echo 'okkkk1';
	}*/
	
	/*if ( mysql_query($sq1,$con) ){
		echo 'okkkk2';
	}
	
	if ( mysql_query($sql2,$con) ){
		echo 'okkkk3';
	}
	if ( mysql_query($sql3,$con) ){
		echo 'okkkk4';
	}
    if ( mysql_query($sql4,$con) ){
		echo 'okkkk5';
	}
	
	if ( mysql_query($sql5,$con) ){
		echo 'okkkk6';
	}
	if ( mysql_query($sql6,$con) ){
		echo 'okkkk6';
	}
	
	if ( mysql_query($sql7,$con) ){
		echo 'okkkk6';
	}
	
	if ( mysql_query($sql8,$con) ){
		echo 'okkkk6';
	}*/
	/*mysql_close($con);*/
?>


