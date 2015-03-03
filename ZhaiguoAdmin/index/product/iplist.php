<?php
header("Content-Type: text/html; charset=gb2312");
class iplist {
	  var $con;
      public function iplist() {
	  $this->con = mysql_connect("localhost","pfshoes1_baoni","baoni123");
	  //$this->con = mysql_connect("localhost","root","");
	  if (!$this->con)
	  {die('Could not connect: ' . mysql_error());}
      if( !mysql_select_db("pfshoes1_puertea", $this->con) ){die('Could not connect: ' . mysql_error());}
	   
	}
	
	
	function getIP() {
		global $ip;
		if (getenv("HTTP_CLIENT_IP"))
		  $ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
		  $ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
		  $ip = getenv("REMOTE_ADDR");
		else $ip = "Unknow";
		return $ip;
	}
	public function get_time(){
		$time = date("Y-m-d-H-i-s");
		$ttt_data = explode('-',$time);
		$fenlei1 = $ttt_data[0];;
		$fenlei2 = $ttt_data[1];
		$fenlei3 = $ttt_data[2];
		$fenlei4 = $ttt_data[3];
		$fenlei5 = $ttt_data[4];
		$fenlei6 = $ttt_data[5];
		$fenlei4 = $fenlei4+8;
		if($fenlei4>'24'){
			$fenlei4 = $fenlei4-24;
		}

      return $fenlei1.'-'.$fenlei2.'-'.$fenlei3.'-'.$fenlei4.'-'.$fenlei5.'-'.$fenlei6;
		
	}
	
    public function edit_pro($key,$time)
	{

		if ( mysql_query("UPDATE iplist SET  time='$time'                      
            WHERE ipkey = '$key'") ){ 
		    return true;
		    }
		return false;
	}
	
    public function add_pro(){
		
		$key = $this->getIP();
		//echo $key;
		$tt_time = $this->get_time();
		if( $this->check_pro($key) ){
			//echo 'Error,the product has already exist';
				
			return $this->edit_pro($key,$tt_time);
		} 
		//copy('pro-img/suolue/default.jpg','pro-img/suolue/'.$key.'.jpg');
		//copy('pro-img/xiangqing/default.jpg','pro-img/xiangqing/'.$key.'.jpg');
				
	   return( mysql_query("INSERT INTO iplist VALUES ('$key','$tt_time')") );
	}
	
	 public function pro_time($key) {
	 	$results = mysql_query("SELECT * FROM iplist");
		while($result = mysql_fetch_array($results)) {
			if ($result['ipkey'] == $key) {	
				$nowtime = $this->get_time();
				$oldtime = $result['time'];
				$now_data = explode('-',$nowtime);
				$old_data = explode('-',$oldtime);
				if($now_data[0]>$old_data[0]){return 0;}
				else if($now_data[1]>$old_data[1]){return 0;}
			    else if( ($now_data[2]-3 )>$old_data[2]){return 0;}
			    return 1;
			}
		}
			return 0;
	}
	
    public function check_pro($key){
        $results = mysql_query("SELECT * FROM iplist");
		while($result = mysql_fetch_array($results)) {
			if ($result['ipkey'] == $key) {	
				//echo "tmd!!1";
				return true;
			}
		}
		return 0;
	}
	
	
    public function check_ip(){
        $key = $this->getIP();
        return $this->check_pro($key);
	}
}
?>
