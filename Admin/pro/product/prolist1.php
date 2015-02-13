<?php
header("Content-Type: text/html; charset=gb2312");
include 'default/GeneralFunction.php';
include 'default/newpinyin.php';
class prolist {
    var $key;
    var $type1;
    var $type2;
    var $type3;
    var $type4;
    var $time;
    var $price;
    var $name;
    var $specification;
    var $pro_description;
    var $little_img_path;
    var $pro_img_path1;
    var $pro_img_path2;
    var $pro_img_path3;
    var $pro_img_path4;
    var $pro_img_path5;
    var $pro_img_path6;
    var $pro_img_path7;
    var $pro_img_path8;
    var $con;
    
    public function prolist() {
      $this->key = 0;
      $this->type1 = 0;
      $this->type2 = 0;
      $this->type3 = 0;
      $this->type4 = 0;
      $this->time = 0;
      $this->price = 0;
      $this->name = 0;
      $this->specification = 0;
      $this->pro_description = 0;
      $this->little_img_path = 0;
      $this->pro_img_path1 = 'pro-img/suolue/default.jpg';
      $this->pro_img_path2 = 'pro-img/xiangqing/default.jpg';
      $this->pro_img_path3 = 0;
      $this->pro_img_path4 = 0;
      $this->pro_img_path5 = 0;
      $this->pro_img_path6 = 0;
      $this->pro_img_path7 = 0;
      $this->pro_img_path8 = 0;
	  $this->con = mysql_connect("localhost","pfshoes1_baoni","baoni123");
	  //$this->con = mysql_connect("localhost","root","");
	  if (!$this->con)
	  {die('Could not connect: ' . mysql_error());}
      if( !mysql_select_db("pfshoes1_puertea", $this->con) ){die('Could not connect: ' . mysql_error());}
	   
	}
    
	public function add_pro($key,$type1,$type2,$type3,$type4){
		if( $this->check_pro($key) ){
			echo '产品编号重复';		
			return false;
		} 
		copy('pro-img/suolue/default.jpg','pro-img/suolue/'.$key.'.jpg');
		//copy('pro-img/xiangqing/default.jpg','pro-img/xiangqing/'.$key.'.jpg');
	   return( mysql_query("INSERT INTO MATERIALS VALUES ('$key','$type1','$type2','$type3','$type4','0','0','0','0','0','0','0','0','0','0','0','0','0','0')") );
	}
	
	
	public function edit_pro($primary_key,$key,$type1,$type2,$type3,$type4)
	{

		if ( mysql_query("UPDATE pro SET prokey='$key', type1='$type1', type2='$type2', type3='$type3', type4='$type4'                       
            WHERE prokey = '$primary_key'") ){ 
            
		    if($primary_key!=$key){
			copy('pro-img/suolue/'.$primary_key.'.jpg','pro-img/suolue/'.$key.'.jpg');
		    copy('pro-img/xiangqing/'.$primary_key.'.jpg','pro-img/xiangqing/'.$key.'.jpg');
		    unlink('pro-img/suolue/'.$primary_key.'.jpg');
		    unlink('pro-img/xiangqing/'.$primary_key.'.jpg');
		    return true;
		    }
		    return true;
		}
		return false;
	}
	
	
	public function edit_pro_key1($primary_key,$key)
	{

		if ( mysql_query("UPDATE pro SET prokey='$key'                       
            WHERE prokey = '$primary_key'") ){ 
            
		    if($primary_key!=$key){
			copy('pro-img/suolue/'.$primary_key.'.jpg','pro-img/suolue/'.$key.'.jpg');
		    copy('pro-img/xiangqing/'.$primary_key.'.jpg','pro-img/xiangqing/'.$key.'.jpg');
		    unlink('pro-img/suolue/'.$primary_key.'.jpg');
		    unlink('pro-img/xiangqing/'.$primary_key.'.jpg');
		    return true;
		    }
		    return true;
		}
		return false;
	}
	
	
    public function delete_pro($key){
	    if( !$this->check_pro($key) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		if ( mysql_query("DELETE FROM pro WHERE prokey='$key'") )
		{
			$key_des1 = 'pro-img/suolue/'.$key.'.jpg';
		    $key_des2 = 'pro-img/xiangqing/'.$key.'.jpg';
		    return ( unlink($key_des1) && unlink($key_des2) );
		}
		return false;

	}
	
    public function check_pro($key){
        $results = mysql_query("SELECT * FROM pro");
		while($result = mysql_fetch_array($results)) {
			if ($result['prokey'] == $key) {	
				return 1;
			}
		}
		return 0;
	}
	
	
	
    public function get_product_data($key){
	    if( !$this->check_pro($key) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM pro WHERE prokey='$key'");
		$list = mysql_fetch_array($results);
		
		return $list;
	}
	
    public function type1_list(){
		$list = array();
        $result = mysql_query("SELECT S.type1 FROM pro S GROUP BY S.type1");
        while( $results = mysql_fetch_array($result) ){
        	array_push($list, $results[0]);
        } 
        return  $list;
	}
	

	
    public function type2_list($type1){
		$list = array();
        $result = mysql_query("SELECT * FROM pro WHERE type1='$type1'");
        
       while( $results = mysql_fetch_array($result) ){
       	    if( !in_array($results[2],$list) ){
       	        array_push($list, $results[2]);
       	    }
        } 

        return $list;
	}
	
    public function type3_list($type1,$type2){
		$list = array();
        $result = mysql_query("SELECT * FROM pro WHERE type1='$type1' AND type2='$type2' ");
        while( $results = mysql_fetch_array($result) ){
       	    if( !in_array($results[3],$list) ){
       	        array_push($list, $results[3]);
       	    }
        } 
        return $list;
	}
	
    public function type4_list($type1,$type2,$type3){
		$list = array();
        $result = mysql_query("SELECT * FROM pro WHERE type1='$type1' AND type2='$type2' AND type3='$type3' ");
        while( $results = mysql_fetch_array($result) ){
        	//echo $results[4];
       	    if( !in_array($results[4],$list) ){
       	        array_push($list, $results[4]);
       	    }
        } 
        //echo count($list);
        return $list;
	}
	
    public function prokey_list($type1,$type2,$type3,$type4){
		$list = array();
		//echo  $type4.'hh';
        $result = mysql_query("SELECT * FROM pro WHERE type1='$type1' AND type2='$type2' AND type3='$type3' AND type4='$type4' ");
        while( $results = mysql_fetch_array($result) ){
        	//echo $results[4];
       	    if( !in_array($results[0],$list) ){
       	        array_push($list, $results[0]);
       	    }
        } 
        //echo count($list);
        return $list;
	}
	
	/*public function type1_trans($type){
		if($type=='水盆' ) return '水盆';
		if($type=='水龙头' ) return '水龙头';
		if($type=='花洒卫浴' ) return 1;
		if($type=='' ) return 1;
		if($type=='' ) return 1;
		
	}*/
		public function AddAImage($iTemporaryPath, $iImageType) {
		//$suffix = $this->GetSuffixByImageType($iImageType);
		
		
		//echo 'type: '.$iImageType.'<br />';
		//$ImageName = $this->GenerateImageName($suffix);
		//echo 'ImageName: '.$ImageName.'<br />';
		
		//$destination = $this->GetImageUpdataPath().'\\'.$ImageName;
		//echo 'destination: '.$destination.'<br />';
		
		if (!move_uploaded_file($iTemporaryPath, $destination)) { return FAILURE; }
		else { 
			//Generate s small image.
			//$this->GenerateSmallImage($destination, $iImageType);
			copy($destination, $this->GetImageUpdataPath().'\\small_'.$ImageName);
			
			return SUCCESS; 
		}
	}
	
}

?>






















