<?php
header("Content-Type: text/html; charset=gb2312");
class brandlist {
	  var $con;
      public function brandlist() {
	  $this->con = mysql_connect("localhost","pfshoes1_baoni","baoni123");
	  //$this->con = mysql_connect("localhost","root","");
	  if (!$this->con)
	  {die('Could not connect: ' . mysql_error());}
     if( !mysql_select_db("pfshoes1_puertea", $this->con) ){die('Could not connect: ' . mysql_error());}
	   
	}
	
    public function add_pro($key,$content){
		if( $this->check_pro($key) ){
			//echo 'Error,the product has already exist';		
			return false;
		} 
		//copy('pro-img/suolue/default.jpg','pro-img/suolue/'.$key.'.jpg');
		//copy('pro-img/xiangqing/default.jpg','pro-img/xiangqing/'.$key.'.jpg');
	   return( mysql_query("INSERT INTO brandlist VALUES ('$key','$content')") );
	}
	
    public function check_pro($key){
        $results = mysql_query("SELECT * FROM brandlist");
		while($result = mysql_fetch_array($results)) {
			if ($result['brandkey'] == $key) {	
				return 1;
			}
		}
		return 0;
	}
	
    public function get_data($key){
		$results = mysql_query("SELECT * FROM brandlist WHERE brandkey='$key'");
		$list = mysql_fetch_array($results);
		
		return $list;
	}
	
	
    public function get_data_content($key){
		$results = mysql_query("SELECT * FROM brandlist WHERE brandkey='$key'");
		$list = mysql_fetch_array($results);
		
		return $list[1];
	}
	
	
    public function get_list(){
		$list = array();
        $result = mysql_query("SELECT S.brandkey FROM brandlist S GROUP BY S.brandkey");
        while( $results = mysql_fetch_array($result) ){
        	array_push($list, $results[0]);
        } 
        return  $list;
	}
	
	
    public function edit_pro($key,$content)
	{

		if ( mysql_query("UPDATE brandlist SET content='$content'                       
            WHERE brandkey = '$key'") ){ 
		    return true;
		}
		return false;
	}
	
    public function del_pro($key){
		/*if( !$this->check_pro($key) ){
			//echo 'Error,the product has already exist';		
			return false;
		} */
		//copy('pro-img/suolue/default.jpg','pro-img/suolue/'.$key.'.jpg');
		//copy('pro-img/xiangqing/default.jpg','pro-img/xiangqing/'.$key.'.jpg');
	   return( mysql_query("DELETE FROM brandlist WHERE brandkey='$key'") );
	}
}
?>
