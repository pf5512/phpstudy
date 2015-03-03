<?php
include 'define.php';

/**
 * Remove a folder.
 * @param string $dirName
 * @return bool Returns true on success or false on failure.  
 */
function removeDirectory($dirName) {
    if (!is_dir($dirName)) {echo 'yesdir';  return false; }
    
    //open a directory.
    $handle = opendir($dirName);
	
    //remove the directory recursively.
    while(($file = readdir($handle)) !== false) {
    	if ($file != '.' && $file != '..') {
    		$dir = $dirName.'/'.$file;
    		is_dir($dir) ? removeDirectory($dir) : unlink($dir);
    	}
    }
    
    //close the directory
    closedir($handle);
    
    //remove the directory, and return result.
    return rmdir($dirName);
}
/**
 * Scan a folder.
 * @param string $iDirectory
 * @return array[string]<br /> the index of the folder.
 */
function ScanDirectory($iDirectory) {
	if (!is_dir($iDirectory)) { return FAILURE; }
	//print '-------ScanDirectory --$iDirectory:'.$iDirectory;
	$list = scan($iDirectory);
	//print 'count($list)'.count($list);
	if (count($list)==0) { return NULL; }
	
	
	//print "ooooooooooo:".count($list);
	// print '--------$list[0]:'.$list[0];
	return $list;
}

function scan($iDirectory){
	//print '------opendir($iDirectory):'.$iDirectory;
   $dh  = opendir($iDirectory);
   while (false !== ($filename = readdir($dh))) {
        $files[] = $filename;
    }
  
    //print '------count($files):'.count($files);
  // print '---1-----$files[2]:'.$files[2]; 
   sort($files);
  // print '----2----$files[2]:'.$files[2];
   rsort($files);
 // print '----3----$files[2]:'.$files[2];
   
   array_pop($files);
  // print '    1count($files):'.count($files);
  // print '    $files[0]:'.$files[0];

   array_pop($files);
  // print '     2count($files):'.count($files);
  // print '    $files[0]:'.$files[0];
  //print  'count($files)'.count($files);
  if(count($files) != 0)
  {
  	return $files;
  }
  else{
  	return NULL;
  }
  // print '--------$file[0]:'.$files[0];
   
}

function get_contents($path){
	$file = fopen("test.txt","r");
　　fread($file,filesize("test.txt"));
　　fclose($file); 
	return $file;
}
 

function xCopy($source, $destination, $child){ 

     if(!is_dir($source)){ 
     	echo("Error:the $source is not a direction!");
     	return 0; 
     } 
     if(!is_dir($destination)){ 
     	mkdir($destination,0777); 
     } 


     $handle=dir($source); 
     while($entry=$handle->read()) { 
     	if(($entry!=".")&&($entry!="..")){ 
     		if(is_dir($source."/".$entry)){
     			if($child){
     				xCopy($source."/".$entry,$destination."/".$entry,$child);
     			}
     	    }
     	    else{
     	    	copy($source."/".$entry,$destination."/".$entry);
     	    }

     	} 
     }      

     return 1; 
}


function count_file_num($des){
	$dh  = opendir($des);
    while (false !== ($filename = readdir($dh))) {
        $files[] = $filename;
    }
    
    return (count($files)-2)/2;
}


function GetImageType($iImageType) {
		switch ($iImageType) {
			case 'image/gif': return 'gif';
			case 'image/pjpeg':return 'jpg';
			case 'image/x-png': return 'png';
			default: return TYPE_NOT_SUPPORT;
		}
	}
	
	
function re_sort($dir){
    $dh  = opendir($dir);
    while (false !== ($filename = readdir($dh))) {
        $files[] = $filename;
    }
    for($i=2;$i<count($files);$i++){
    	rename($dir.'/'.$files[$i] , $dir.'/'.($i-1).'.jpg');
    }
    
}


	function GenerateSmallImage($filename) {
		//echo '$filename = '.$filename.'<br />';
		$destination = dirname($filename).'//small_'.basename($filename);
		$Source = ImageCreateFromJPEG($filename);
				
		
		if (!$Source) { return GET_SOURCE_ERROR;}
		
		//Get width an height, computer new data.
		$width = imagesx($Source);
		$height = imagesy($Source);
		$percent = 0.4;
		$sWidth = $width * $percent;
		$sHeight =  $height * $percent;
		
		header('Content-Type: image/jpeg');
		
		//New a blank image.
		//echo 'New a blank image<br />';
		$NewImage = @imagecreatetruecolor($sWidth, $sHeight);
		//echo '$NewImage = '.$NewImage.'<br />';
		
		//Resize.
		imagecopyresampled($NewImage, $Source, 0, 0, 0, 0, $sWidth, $sHeight, $width, $height);
		
		if (!imagejpeg($NewImage, $destination)) { return GENERATE_ERROR; }
				
		//Free memory.
		if (is_resource($Source)) { 
			if (!imagedestroy($Source)) { return FREE_ERROR; } 
		}
		if (is_resource($NewImage)) { 
			return imagedestroy($NewImage) ? SUCCESS : FREE_ERROR;
		}
		else { return SUCCESS; }
	}

?>