<?php
include 'GeneralFunction.php';
include 'newpinyin.php';
class prolist {
    var $FolderPath;
	var $ProductName;
	var $specification;
	var $num;
	var $Series;
	var $price;
	var $state;
	var $Introduction;
	var $FolderPath;
	
    var $pinyin; 
	public function prolist() {
		$this->FolderPath = 'product/';
		$this->pinyin = new newpinyin();
		$this->con = mysql_connect("localhost","root","");
	    if (!$this->con)
	    {die('Could not connect: ' . mysql_error());}
	   mysql_select_db("lodasn", $this->con);
	} 
	
	public function add_pro($ProductName,$Series,$specification,$num,$price,$state,$Introduction){
		if( $this->check_pro( $ProductName , $Series) ){
			echo 'Error,the product has already exist';			
			return false;
		}
	 
	   mysql_query("INSERT INTO pro VALUES ('$ProductName','$Series','$specification','$num','$price','$state','$Introduction')");
		
	   $s_des = 'product/'.$this->pinyin->c($Series);
	   $p_des = $s_des.'/'.$this->pinyin->c($ProductName);
	   $img_des = $p_des.'/picture';
	   if(!is_dir($s_des)){ 
     	  mkdir($s_des,0777); 
       }
	   if(!is_dir($p_des)){ 
     	  mkdir($p_des,0777); 
       }
	   if(!is_dir($img_des)){ 
     	  mkdir($img_des,0777); 
       }
       return true;
	}
	
	
    
    public function edit_pro($old_pro,$old_series,$ProductName,$Series,$specification,$num,$price,$state,$Introduction){
        
        if( !$this->check_pro($old_pro,$old_series) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$i = 1;
		//if($old_pro != $ProductName || $old_series != $Series){
		if($i ===1){
			mkdir('temp',0777);
			xcopy('product/'.$this->pinyin->c( $old_series ).'/'.$this->pinyin->c( $old_pro ).'/picture','temp',1);
			print $old_pro.'...'.$old_series;
			$this->delete_pro($old_pro,$old_series);
			print $ProductName.'...'.$Series;
			$this->add_pro($ProductName,$Series,$specification,$num,$price,$state,$Introduction);
			xcopy('temp','product/'.$this->pinyin->c( $Series ).'/'.$this->pinyin->c( $ProductName ).'/picture',1);
			removeDirectory('temp'); 
		}
		else{
			mysql_query("UPDATE pro SET specification = $specification, num = '$num', price = '$price', state = '$state', AND intr0 = '$Introduction';                      
            WHERE pname = '$old_pro' AND series = '$old_series'");
		}
		
		return true;
	}
	
	
	
	public function delete_pro($ProductName,$Series){
	    if( !$this->check_pro($ProductName,$Series) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		mysql_query("DELETE FROM pro WHERE pname='$ProductName' AND series='$Series' ");
		
		$results = mysql_query("SELECT * FROM pro WHERE series='$Series' ");
		print '//////////'.count($results);
	    if(count($results)==0){
	    	$s_des = 'product/'.$this->pinyin->c( $Series ).'/';
			removeDirectory($s_des);
		}
		
		else{
			$des = 'product/'.$this->pinyin->c( $Series ).'/'.$this->pinyin->c( $ProductName );
		    removeDirectory($des);
		}
		
		return true;

	}
	

    public function check_pro($ProductName,$Series){
        $results = mysql_query("SELECT * FROM pro");
		while($result = mysql_fetch_array($results)) {
			if ($result['pname'] == $ProductName && $result['series'] == $Series) {	
				return 1;
			}
		}
		return 0;
	}
		
		
	public function get_product_data($ProductName,$Series){
	    if( !$this->check_pro($ProductName,$Series) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM pro WHERE pname='$ProductName' AND series='$Series'");
		$result = mysql_fetch_array($results);
		return $result[0].'|'.$result[1].'|'.$result[2].'|'.$result[3].'|'.$result[4].'|'.$result[5].'|'.$result[6];
	}
	
	
	
    public function add_img($iTemporaryPath,$type,$ProductName,$Series){
        if( !$this->check_pro($ProductName,$Series) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$type = GetImageType($type);
		$imgname = count_file_num('product/'.$this->pinyin->c( $Series ).'/'.$this->pinyin->c( $ProductName).'/picture/') + 1;
		$destination = 'product/'.$this->pinyin->c( $Series ).'/'.$this->pinyin->c( $ProductName).'/picture/'.$imgname.'.'.$type;
		//$destination2 = 'product/'.$Series.'/'.$ProductName.'/picture/small_'.$imgname.'.'.$type;
        if (!move_uploaded_file($iTemporaryPath, $destination)) { return false; }
        GenerateSmallImage($destination);
	}
	
   public function del_img($filename,$ProductName,$Series){
        if( !$this->check_pro($ProductName,$Series) ){
			echo 'Error,the product does not exist';			
			return false;
		}
		$destination = 'product/'.$this->pinyin->c( $Series).'/'.$this->pinyin->c( $ProductName).'/picture/'.$filename;
        unlink($destination);
        re_sort('product/'.$this->pinyin->c( $Series).'/'.$this->pinyin->c( $ProductName).'/picture/');
	}
	
	
	
	public function get_series_list(){
		$slist = array();
        $result = mysql_query("SELECT S.series FROM pro S GROUP BY S.series");
        while( $results = mysql_fetch_array($result) ){
        	array_push($slist, $results[0]);
        } 
        //print count($slist);
        return  $slist;
	}
	
    
	
	
	
    public function get_product_list($Series){
		$plist = array();
        $result = mysql_query("SELECT S.pname FROM pro S WHERE S.series='$Series'");
        while( $results = mysql_fetch_array($result) ){
        	array_push($plist, $results[0]);
        }
        return  $plist;
	}
	
   public function get_plist(){
		$plist = array();
        $result = mysql_query("SELECT *  FROM pro");
        while( $results = mysql_fetch_array($result) ){
        	array_push($plist, $results[0].'|'.$results[1]);
        }
        return  $plist;
	}  
	
	
	
    public function get_file_list($filename){
		if(!file_exists($filename)){
			echo "Error:the ".$filename."does not exist!";
			return null;
		}
		else{
			$list = file($filename);
			return $list;
		}
	}
	
    function __destruct() {
      mysql_close($this->con);
    }
	
}

?>






















