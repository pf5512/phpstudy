<?php
header("Content-Type: text/html; charset=gb2312");
class typelist {
	  var $con;
      public function typelist() {
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
	   return( mysql_query("INSERT INTO typelist VALUES ('$key','$content')") );
	}
	
    public function check_pro($key){
        $results = mysql_query("SELECT * FROM typelist");
		while($result = mysql_fetch_array($results)) {
			if ($result['typekey'] == $key) {	
				return 1;
			}
		}
		return 0;
	}
	
    public function edit_pro($key,$content)
	{

		if ( mysql_query("UPDATE typelist SET content='$content'                       
            WHERE typekey = '$key'") ){ 
		    return true;
		}
		return false;
	}
	
    public function get_data($key){
		$results = mysql_query("SELECT * FROM typelist WHERE typekey='$key'");
		$list = mysql_fetch_array($results);
		
		return $list;
	}
	
    public function get_data_content($key){
		$results = mysql_query("SELECT * FROM typelist WHERE typekey='$key'");
		$list = mysql_fetch_array($results);
		
		return $list[1];
	}
	
    public function get_list(){
		$list = array();
        $result =mysql_query("SELECT S.typekey FROM typelist S GROUP BY S.typekey");
        while( $results = mysql_fetch_array($result) ){
        	array_push($list, $results[0]);
        } 
        return  $list;
	}
	
	
	
    public function del_pro($key){
		if( !$this->check_pro($key) ){
			//echo 'Error,the product has already exist';		
			return false;
		} 
		echo 'adfafwqfqwfqfwfq';
		//copy('pro-img/suolue/default.jpg','pro-img/suolue/'.$key.'.jpg');
		//copy('pro-img/xiangqing/default.jpg','pro-img/xiangqing/'.$key.'.jpg');
	   return(mysql_query("DELETE FROM typelist WHERE typekey='$key'"));
	}
}
?>
