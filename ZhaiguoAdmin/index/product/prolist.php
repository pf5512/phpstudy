<?php

include 'default/GeneralFunction.php';
include 'default/newpinyin.php';
class indexadlistlist {
    var $key;
    var $type1;
    var $type2;
    var $type3;
    var $type4;
    var $time;
    var $price;
    var $name;
    var $specification;
    var $indexadlist_description;
    var $little_img_path;
    var $indexadlist_img_path1;
    var $indexadlist_img_path2;
    var $indexadlist_img_path3;
    var $indexadlist_img_path4;
    var $indexadlist_img_path5;
    var $indexadlist_img_path6;
    var $indexadlist_img_path7;
    var $indexadlist_img_path8;
    var $con;
    
    public function indexadlistlist() {
      $this->key = 0;
      $this->type1 = 0;
      $this->type2 = 0;
      $this->type3 = 0;
      $this->type4 = 0;
      $this->time = 0;
      $this->price = 0;
      $this->name = 0;
      $this->specification = 0;
      $this->indexadlist_description = 0;
      $this->little_img_path = 0;
      $this->indexadlist_img_path1 = 'indexadlist-img/suolue/default.jpg';
      $this->indexadlist_img_path2 = 'indexadlist-img/xiangqing/default.jpg';
      $this->indexadlist_img_path3 = 0;
      $this->indexadlist_img_path4 = 0;
      $this->indexadlist_img_path5 = 0;
      $this->indexadlist_img_path6 = 0;
      $this->indexadlist_img_path7 = 0;
      $this->indexadlist_img_path8 = 0;
	  $this->con = mysql_connect("localhost","pfshoes1_baoni","baoni123");
	  //$this->con = mysql_connect("localhost","root","");
	  if (!$this->con)
	  {die('Could not connect: ' . mysql_error());}
      if( !mysql_select_db("pfshoes1_puertea", $this->con) ){die('Could not connect: ' . mysql_error());}
	   
	}
	
	public function get_indexadlistducts(){
		$list=array();
		$results = mysql_query("SELECT * FROM indexadlist");
		while($result=mysql_fetch_array($results))
		{
			array_push($list,$result);
		}
		return $list;
	}
	
	public function indexadlistkey_list2()
	{
		$results = mysql_query("SELECT indexadlistkey FROM indexadlist");
		$list = mysql_fetch_array($results);
		$result=array();
		array_push($result,$list);
		$list = mysql_fetch_array($results);
		array_push($result,$list);
		return $result;
	}
    
	public function add_indexadlist($key,$type1,$type4,$title,$content,$xxzz,$ccdd){
		if( $this->check_indexadlist($key) ){
			//echo 'Error,the indexadlistduct has already exist';		
			return false;
		} 
		//copy('indexadlist-img/suolue/default.jpg','indexadlist-img/suolue/'.$key.'.jpg');
		copy('indexadlist-img/xiangqing/default.jpg','indexadlist-img/xiangqing/'.$key.'.jpg');
	   return( mysql_query("INSERT INTO indexadlist VALUES ('$key','$type1','','0','$type4','0','$title','$content','$xxzz','$ccdd','0','0','0','0','0','0','0','0','0')") );
	}
	
	
	public function edit_indexadlist($primary_key,$key,$type1,$type2,$type4,$title,$content,$xxzz,$ccdd)
	{

		if ( mysql_query("UPDATE indexadlist SET indexadlistkey='$key', type1='$type1', type2='$type2', type4='$type4', title='$title', content='$content',author='$xxzz',indexadlist_description='$ccdd'                       
            WHERE indexadlistkey = '$primary_key'") ){ 
            
		    if($primary_key!=$key){
			copy('indexadlist-img/suolue/'.$primary_key.'.jpg','indexadlist-img/suolue/'.$key.'.jpg');
		    copy('indexadlist-img/xiangqing/'.$primary_key.'.jpg','indexadlist-img/xiangqing/'.$key.'.jpg');
		    copy('indexadlist-img/xiangqing/'.$primary_key.'_b.jpg','indexadlist-img/xiangqing/'.$key.'_b.jpg');
		    unlink('indexadlist-img/suolue/'.$primary_key.'.jpg');
		    unlink('indexadlist-img/xiangqing/'.$primary_key.'.jpg');
		    unlink('indexadlist-img/xiangqing/'.$primary_key.'_b.jpg');
		    return true;
		    }
		    return true;
		}
		return false;
	}
	
	public function edit_indexadlist_key1($primary_key,$key)
	{

		if ( mysql_query("UPDATE indexadlist SET indexadlistkey='$key'                       
            WHERE indexadlistkey = '$primary_key'") ){ 
            
		    if($primary_key!=$key){
			copy('indexadlist-img/suolue/'.$primary_key.'.jpg','indexadlist-img/suolue/'.$key.'.jpg');
		    copy('indexadlist-img/xiangqing/'.$primary_key.'.jpg','indexadlist-img/xiangqing/'.$key.'.jpg');
		    unlink('indexadlist-img/suolue/'.$primary_key.'.jpg');
		    unlink('indexadlist-img/xiangqing/'.$primary_key.'.jpg');
		    return true;
		    }
		    return true;
		}
		return false;
	}
	
    public function edit_indexadlist_type($primary_key,$type)
	{
        $results = mysql_query("SELECT * FROM filss WHERE indexadlistkey='$primary_key'");
		$list = mysql_fetch_array($results);
		$old_type = $list[4];
		$pathname = 'indexadlist-img/xiangqing/'.$primary_key.$old_type;
		//echo $type.'11111111111';
		if ( mysql_query("UPDATE indexadlist SET type3='$type'                       
            WHERE indexadlistkey = '$primary_key'") ){ 
		    if(file_exists($pathname))
		    { unlink( $pathname);}
		    return true;
            }
		return false;
	}
	
	
    public function delete_indexadlist($key){
	    if( !$this->check_indexadlist($key) ){
			echo 'Error,the indexadlistduct does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM indexadlist WHERE indexadlistkey='$key'");
		$list = mysql_fetch_array($results);
		$type = $list[3];
		//echo $type;
		if ( mysql_query("DELETE FROM indexadlist WHERE indexadlistkey='$key'") )
		{
			
		    $key_des1 = 'indexadlist-img/xiangqing/'.$key.$type;
		    if( !file_exists($key_des1)  ){return true;}
		    else { return ( unlink($key_des1) ); }
		}
		return false;

	}
	
    public function check_indexadlist($key){
        $results = mysql_query("SELECT * FROM indexadlist");
		while($result = mysql_fetch_array($results)) {
			if ($result['indexadlistkey'] == $key) {	
				return 1;
			}
		}
		return 0;
	}
	
	
   public function check_brand($brand){
        $results = mysql_query("SELECT * FROM indexadlist");
		while($result = mysql_fetch_array($results)) {
			if ($result['type4'] == $brand) {	
				return 1;
			}
		}
		return 0;
	}
	
   public function check_type($type){
        $results = mysql_query("SELECT * FROM indexadlist");
		while($result = mysql_fetch_array($results)) {
			if ($result['type1'] == $type) {	
				return 1;
			}
		}
		return 0;
	}
	
    public function get_indexadlistduct_data($key){
	    if( !$this->check_indexadlist($key) ){
			echo 'Error,the indexadlistduct does not exist';			
			return false;
		}
		$results = mysql_query("SELECT * FROM indexadlist WHERE indexadlistkey='$key'");
		$list = mysql_fetch_array($results);
		return $list;
	}
	
    public function type1_list(){
		$list = array();
        $result = mysql_query("SELECT S.type1 FROM indexadlist S GROUP BY S.type1 order by indexadlistkey");
        while( $results = mysql_fetch_array($result) ){
        	array_push($list, $results[0]);
        } 
        return  $list;
	}
	
    public function type_brandlist(){
		$list = array();
        $result = mysql_query("SELECT S.type4 FROM indexadlist S GROUP BY S.type4 order by indexadlistkey");
        while( $results = mysql_fetch_array($result) ){
        	array_push($list, $results[0]);
        } 
        return  $list;
	}
	
    public function type_brandkeylist($brand){
		$list = array();
		//echo  $type4.'hh';
        $result = mysql_query("SELECT * FROM indexadlist WHERE type4='$brand' order by indexadlistkey");
        while( $results = mysql_fetch_array($result) ){
        	//echo $results[4];
       	    if( !in_array($results[0],$list) ){
       	        array_push($list, $results[0]);
       	    }
        } 
        //echo count($list);
        return $list;
	}
    
	
	
    public function type2_list($type1){
		$list = array();
        $result = mysql_query("SELECT * FROM indexadlist WHERE type1='$type1' order by indexadlistkey");
        
       while( $results = mysql_fetch_array($result) ){
       	    if( !in_array($results[2],$list) ){
       	        array_push($list, $results[2]);
       	    }
        } 

        return $list;
	}
	
    public function type3_list($type1,$type2){
		$list = array();
        $result = mysql_query("SELECT * FROM indexadlist WHERE type1='$type1' AND type2='$type2' ");
        while( $results = mysql_fetch_array($result) ){
       	    if( !in_array($results[3],$list) ){
       	        array_push($list, $results[3]);
       	    }
        } 
        return $list;
	}
	
    public function type4_list($type1,$type2,$type3){
		$list = array();
        $result = mysql_query("SELECT * FROM indexadlist WHERE type1='$type1' AND type2='$type2' AND type3='$type3' ");
        while( $results = mysql_fetch_array($result) ){
        	//echo $results[4];
       	    if( !in_array($results[4],$list) ){
       	        array_push($list, $results[4]);
       	    }
        } 
        //echo count($list);
        return $list;
	}
	
    public function indexadlistkey_list($type1,$type2){
		$list = array();
		//echo  $type4.'hh';
        $result = mysql_query("SELECT * FROM indexadlist WHERE type1='$type1' AND type2='$type2' order by indexadlistkey");
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
		if($type=='ˮ\C5\E8' ) return 'ˮ\C5\E8';
		if($type=='ˮ\C1\FAͷ' ) return 'ˮ\C1\FAͷ';
		if($type=='\BB\A8\C8\F7\CE\C0ԡ' ) return 1;
		if($type=='' ) return 1;
		if($type=='' ) return 1;
		
	}*/
	
		public function AddAImage($iTemporaryPath, $iImageType) {
		$suffix = $this->GetSuffixByImageType($iImageType);
		
		
		//echo 'type: '.$iImageType.'<br />';
		$ImageName = $this->GenerateImageName($suffix);
		//echo 'ImageName: '.$ImageName.'<br />';
		
		$destination = $this->GetImageUpdataPath().'\\'.$ImageName;
		//echo 'destination: '.$destination.'<br />';
		
		if (!move_uploaded_file($iTemporaryPath, $destination)) { return FAILURE; }
		else { 
			//Generate s small image.
			//$this->GenerateSmallImage($destination, $iImageType);
			copy($destination, $this->GetImageUpdataPath().'\\small_'.$ImageName);
			
			return SUCCESS; 
		}
	}
	
	
public function strip_tags($string, $replace_with_space = true)
{
	//$string = htmlspecialchars($string);
	
   //  $string = $this->lib_replace_end_tagq($string);
     //$string = htmlspecialchars($string);
    if ($replace_with_space) {
            $qqq =  preg_replace('!<[^>]*?>!', ' ', $string);
            $qqq =  preg_replace('!&[^>]*?;!', ' ', $qqq);
            $qqq = htmlspecialchars($qqq);
            $qqq =  preg_replace('!<[^>]*?>!', ' ', $qqq);
            //$qqq =  preg_replace('!&[^>]*?;!', ' ', $qqq);
            RETURN $qqq;
    } else {
        return strip_tags($string);
    } 
} 
public function lib_replace_end_tagq($str)

{

if (empty($str)) return false;
$str = str_replace( '$nbsp;', "", $str);
$str = str_replace( 'amp;', "", $str);
return $str;
}

public function lib_replace_end_tag($str)

{

if (empty($str)) return false;

$str = htmlspecialchars($str);
$str = str_replace( "$nbsp;", "", $str);
$str = str_replace( '<p>', "", $str);
$str = str_replace( '</p>', "", $str);
$str = str_replace( '<span>', "", $str);
$str = str_replace( '</span>', "", $str);
$str = str_replace( '<div>', "", $str);
$str = str_replace( '</div>', "", $str);
$str = str_replace( '<table', "", $str);
$str = str_replace( '</table>', "", $str);
$str = str_replace( '<br />', "", $str);
$str = str_replace( '<strong>', "", $str);
$str = str_replace( '<tbody>', "", $str);
$str = str_replace( '</tbody>', "", $str);
$str = str_replace( '</td>', "", $str);
$str = str_replace( '<td', "", $str);
$str = str_replace( '', "", $str);
$str = str_replace( '', "", $str);
$str = str_replace( '', "", $str);


$str = str_replace( '/', "", $str);
$str = str_replace("\\", "", $str);
$str = str_replace("&gt", "", $str);

$str = str_replace("&lt", "", $str);

$str = str_replace("<SCRIPT>", "", $str);
$str = str_replace("</SCRIPT>", "", $str);

$str = str_replace("<script>", "", $str);

$str = str_replace("</script>", "", $str);

$str=str_replace("select","select",$str);

$str=str_replace("join","join",$str);

$str=str_replace("union","union",$str);

$str=str_replace("where","where",$str);
$str=str_replace("insert","insert",$str);

$str=str_replace("delete","delete",$str);

$str=str_replace("update","update",$str);

$str=str_replace("like","like",$str);

$str=str_replace("drop","drop",$str);

$str=str_replace("create","create",$str);

$str=str_replace("modify","modify",$str);

$str=str_replace("rename","rename",$str);

$str=str_replace("alter","alter",$str);

$str=str_replace("cas","cast",$str);

$str=str_replace("&","&",$str);

$str=str_replace(">",">",$str);

$str=str_replace("<","<",$str);

$str=str_replace(" ",chr(32),$str);

$str=str_replace(" ",chr(9),$str);

$str=str_replace("    ",chr(9),$str);

$str=str_replace("&",chr(34),$str);

$str=str_replace("'",chr(39),$str);

$str=str_replace("<br />",chr(13),$str);

$str=str_replace("''","'",$str);

$str=str_replace("css","'",$str);

$str=str_replace("CSS","'",$str);

$str = str_replace( '<', "", $str);
$str = str_replace( '>', "", $str);

return $str;

 

}
	
}


	
	


?>






















