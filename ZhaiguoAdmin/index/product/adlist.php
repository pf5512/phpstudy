<?php
class adlist {
    var $key;
    var $content;
    var $link;
    var $con;
    
    public function adlist() {
      $this->key = 0;
      $this->type1 = 0;
      $this->type2 = 0;
      $this->con = mysql_connect("localhost","pfshoes1_baoni","baoni123");
	 // $this->con = mysql_connect("localhost","root","");
	  if (!$this->con)
	  {die('Could not connect: ' . mysql_error());}
      if( !mysql_select_db("pfshoes1_puertea", $this->con) ){die('Could not connect: ' . mysql_error());}
	   
	}
    
	/*public function add_pro($key,$content,$link){
		if( $this->check_pro($key) ){
			//echo 'Error,the product has already exist';		
			return false;
		} 
		//copy('pro-img/suolue/default.jpg','pro-img/suolue/'.$key.'.jpg');
		copy('pro-img/xiangqing/default.jpg','pro-img/xiangqing/'.$key.'.jpg');
	   return( mysql_query("INSERT INTO pro VALUES ('$key','$type1','$type2','0','$type4','0','$title','$content','$xxzz','$ccdd','0','0','0','0','0','0','0','0','0')") );
	}
	*/
	public function edit_pro($key,$content,$link)
	{
		if ( mysql_query("update indexadlist SET adkey='$key', content='$content', link='$link'                      
            WHERE adkey = '$key'") ){ 
		    return true;
		    }
		return false;
	}
	
	

	public function get_product_data($key){
		$results = mysql_query("select * from adlist where adkey='$key'");
		$list = mysql_fetch_array($results);
		return $list;
	} 
	
}
?>






















