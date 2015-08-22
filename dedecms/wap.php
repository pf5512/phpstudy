<?php

	require_once (dirname(__FILE__) . "/include/common.inc.php");
	header("Content-Type: text/html; charset=utf-8");
	//header("Content-type:text/vnd.wap.wml");
	require_once(dirname(__FILE__)."/include/wap.inc.php");
	require_once(DEDEINC."/dedetag.class.php");
	if(empty($action)) $action = 'index';
	$cfg_templets_dir = $cfg_basedir.$cfg_templets_dir;
	$channellist = '';
	$newartlist = '';
	$channellistnext = '';
	/*//顶级导航列表
	$dsql->SetQuery("Select id,typename From `#@__arctype` where reid=0 And channeltype=1 And ishidden=0 And ispart<>2 order by sortrank");
	$dsql->Execute();
	while($row=$dsql->GetObject())
	{
		$channellist .= "<a href='wap.php?action=list&amp;id={$row->id}'>{$row->typename}</a> ";
	}*/
	//当前时间
	$curtime = strftime("%Y-%m-%d %H:%M:%S",time());
	$cfg_webname = ConvertStr($cfg_webname);

	//主页
	/*------------
	function __index();

	------------*/
	if($action=='index')
	{
		//最新文章
		$dsql->SetQuery("Select id,title,pubdate From `#@__archives` where channel=1 And arcrank = 0 order by id desc limit 0,10");
		$dsql->Execute();
		/*while($row=$dsql->GetObject())
		{
			$newartlist .= "<a href='wap.php?action=article&amp;id={$row->id}'>".ConvertStr($row->title)."</a> [".date("m-d",$row->pubdate)."]<br />";
		}*/
		$dsql->SetQuery("select * from #@__arctype where ishidden!=1 and channeltype=1");
		$dsql->Execute();
		$arc_list=array();
		while($row=$dsql->GetObject())
        {
            array_push($arc_list,$row);
        }
		foreach($arc_list as $arc)
		{
			$dsql->SetQuery("select * from #@__archives where arcrank!=-2 and typeid={$arc->id} order by id desc limit 0,10");
            $dsql->Execute();
			$arc_arr=array();
			while($row=$dsql->GetObject())
            {
                array_push($arc_arr,$row);
            }
			$arc->arc=$arc_arr;
		}

		$dsql->SetQuery("select * from #@__arctype where ishidden!=1 and channeltype=2");
		$dsql->Execute();
		$pic_list=array();
		while($row=$dsql->GetObject())
                {
                        array_push($pic_list,$row);
                }
		foreach($pic_list as $pic)
		{
			$dsql->SetQuery("select * from #@__archives,#@__addonimages where #@__archives.id=#@__addonimages.aid and #@__archives.arcrank!=-2 and #@__archives.typeid={$pic->id} order by #@__archives.id desc limit 0,10");
                	$dsql->Execute();
			$pic_arr=array();
			while($row=$dsql->GetObject())
                	{
                        	array_push($pic_arr,$row);
                	}
			$pic->pics=$pic_arr;
		}
		
		//显示WML
		include($cfg_templets_dir."/wap/index.html");
		$dsql->Close();
		exit();
	}

	/*------------

	function __list();

	------------*/

	//列表

	else if($action=='list')
	{
		$needCode = 'utf-8';
		if(empty($id)) exit('Error!');
		else $id = ereg_replace("[^0-9]", '', $id);
		if(!empty($pageno)) $pageno=ereg_replace("[^0-9]", '', $pageno);
		else $pageno=1;
		if(!empty($pageSize)) $pageSize=ereg_replace("[^0-9]", '', $pageSize);
		else $pageSize=10;
		$row = $dsql->GetOne("Select typename,ishidden From `#@__arctype` where id='$id' ");
		if($row['ishidden']==1) exit();
		$typename = ConvertStr($row['typename']);
		/*//当前栏目下级分类
		$dsql->SetQuery("Select id,typename From `#@__arctype` where reid='$id' And channeltype=1 And ishidden=0 And ispart<>2 order by sortrank");
		$dsql->Execute();
		while($row=$dsql->GetObject())
		{
			$channellistnext .= "<a href='wap.php?action=list&amp;id={$row->id}'>".ConvertStr($row->typename)."</a> ";
		}*/
		//栏目内容(分页输出)
		$sids = GetSonIds($id,1,true);
		$varlist = "cfg_webname,typename,channellist,channellistnext,cfg_templeturl";
		ConvertCharset($varlist);
		$dsql->SetQuery("select * From `#@__archives` where typeid in($sids) And arcrank=0 order by id desc limit ".($pageno-1)*$pageSize.",$pageSize");
		$dsql->Execute();
		$arc_list=array();
		while($row=$dsql->GetArray())
        {                       
			array_push($arc_list,$row); 
		}
		echo json_encode($arc_list);
		//print_r(json_decode(json_encode($arc_list)));
		/*$dlist = new DataListCP();
		$dlist->SetTemplet($cfg_templets_dir."/wap/list.wml");
		$dlist->pageSize = 10;
		$dlist->SetParameter("action","list");
		$dlist->SetParameter("id",$id);
		$dlist->SetSource("select * From `#@__archives` where typeid in($sids) And arcrank=0 order by id desc");
		$dlist->Display();*/
		exit();

	}

	//文档

	/*------------

	function __article();

	------------*/

	else if($action=='article')
	{
		//文档信息
		$query = "
		  Select tp.*,arc.*,addon.body From `#@__archives` arc 
		  left join `#@__arctype` tp on tp.id=arc.typeid
		  left join `#@__addonarticle` addon on addon.aid=arc.id
		  where arc.id='$id'";
		$row = $dsql->GetOne($query,MYSQL_ASSOC);
		echo json_encode($row);
		foreach($row as $k=>$v) $$k = $v;
		unset($row);
		$pubdate = strftime("%y-%m-%d %H:%M:%S",$pubdate);
		if($arcrank!=0) exit();
		$title = ConvertStr($title);
		$body = html2wml($body);
		if($ishidden==1) exit();
		/*//当前栏目下级分类
		$dsql->SetQuery("Select id,typename From `#@__arctype` where reid='$typeid' And channeltype=1 And ishidden=0 order by sortrank");
		$dsql->Execute();
		while($row=$dsql->GetObject()){
			$channellistnext .= "<a href='wap.php?action=list&amp;id={$row->id}'>".ConvertStr($row->typename)."</a> ";
		}*/
		//栏目内容(分页输出)
		$dsql->Close();
		exit();
	}
	//文档

	/*------------

	function __album();

	------------*/

	else if($action=='album')
	{
		//文档信息
		$query = "
		  Select tp.*,arc.*,addon.imgurls From `#@__archives` arc 
		  left join `#@__arctype` tp on tp.id=arc.typeid
		  left join `#@__addonimages` addon on addon.aid=arc.id
		  where arc.id='$id'";
		$row = $dsql->GetOne($query,MYSQL_ASSOC);
		

		foreach($row as $k=>$v) $$k = $v;
		
		$pubdate = strftime("%y-%m-%d %H:%M:%S",$pubdate);
		if($arcrank!=0) exit();
		$title = ConvertStr($title);

		//echo json_encode($row);
		//start toGetimgurls
			$imgs=array();
		       $j = 1;
		       if($imgurls!=""){
		       	 $dtp = new DedeTagParse();
		       	 $dtp->LoadSource($imgurls);
		       	 if(is_array($dtp->CTags))
		       	 {
		       	 	 foreach($dtp->CTags as $ctag)
		       	 	 {
		       	 	 	 if($ctag->GetName()=="img")
		       	 	 	 {
					     $bigimg = trim($ctag->GetInnerText());
					     if($ctag->GetAtt('ddimg') != $bigimg && $ctag->GetAtt('ddimg')!='')
					     {
					     		$litimg = $ctag->GetAtt('ddimg');
					     }
					     else
					     {
					     	 $litimg = 'swfupload.php?dopost=ddimg&img='.$bigimg;
					     }
					     //echo $bigimg;
					    array_push($imgs,$bigimg);
				     /*
				     	$fhtml = '';
			   		$fhtml .= "<div class='albCt albEdit' id='albold{$j}'>\r\n";
			   		$fhtml .= "	<input type='hidden' name='imgurl{$j}' value='{$bigimg}' />\r\n";
			   		$fhtml .= "	<input type='hidden' name='imgddurl{$j}' value='{$litimg}' />\r\n";
			   		$fhtml .= "<img src='{$litimg}' width='120' /><a href=\"javascript:delAlbPicOld('$bigimg', $j)\">[删除]</a>\r\n";
				 	$fhtml .= "<div style='margin-top:10px'>注释：<input type='text' name='imgmsg{$j}' value='".$ctag->GetAtt('text')."' style='width:190px;' /></div>\r\n";
				 	$fhtml .= "<div style='margin-top:10px'>更换：<input type='file' name='imgfile{$j}' size='18' style='width:190px' /></div>\r\n";
			   		$fhtml .= "</div>\r\n";
					echo $fhtml;
				     */
		       	 	 	 	 
		       	 	 	 	$j++;
		       	 	 	 }
		       	 	 }
		       	 }
		       	 $dtp->Clear();
		       }
		//end toGetimgurls
		$row[imgurls]=$imgs;
		echo json_encode($row);
		unset($row);
		


		if($ishidden==1) exit();
		/*//当前栏目下级分类
		$dsql->SetQuery("Select id,typename From `#@__arctype` where reid='$typeid' And channeltype=1 And ishidden=0 order by sortrank");
		$dsql->Execute();
		while($row=$dsql->GetObject()){
			$channellistnext .= "<a href='wap.php?action=list&amp;id={$row->id}'>".ConvertStr($row->typename)."</a> ";
		}*/
		//栏目内容(分页输出)
		$dsql->Close();
		exit();
	}

	//错误

	/*------------

	function __error();

	------------*/

	else

	{

		ConvertCharset($varlist);

		include($cfg_templets_dir."/wap/error.wml");

		$dsql->Close();

		ConvertCharset($varlist);

		echo $pageBody;

		exit();

	}

?>
