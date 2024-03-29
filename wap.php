<?php
require_once (dirname(__FILE__) . "/include/common.inc.php");
require_once(dirname(__FILE__)."/include/wap.inc.php");
//header("Content-type:text/vnd.wap.wml");

if(empty($action)) $action = 'index';
$dsql = new DedeSql(false);
$cfg_templets_dir = $cfg_basedir.$cfg_templets_dir;
$channellist = '';
$newartlist = '';
$channellistnext = '';

//顶级导航列表
$dsql->SetQuery("Select ID,typename From `#@__arctype` where reID=0 And channeltype=1 And ishidden=0 And ispart<>2 order by sortrank");
$dsql->Execute();
while($row=$dsql->GetObject())
{
	$channellist .= "<a href='wap.php?action=list&amp;id={$row->ID}'>{$row->typename}</a> ";
}
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
	$dsql->SetQuery("Select ID,title,pubdate From `#@__archives` where channel=1 And arcrank = 0 order by ID desc limit 0,10");
	$dsql->Execute();
	while($row=$dsql->GetObject())
	{
		$newartlist .= "<a href='wap.php?action=article&amp;id={$row->ID}'>".ConvertStr($row->title)."</a> [".date("m-d",$row->pubdate)."]<br />";
	}
	//显示WML
	include($cfg_templets_dir."/wap/index.wml");
	$dsql->Close();
	echo $pageBody;
	exit();
}
/*------------
function __list();
------------*/
//列表
else if($action=='list')
{
	$nrow = $dsql->GetOne("Select * From `#@__arctype` where ID='$id' ");
	if($nrow['ishidden']==1) exit();
	$typename = ConvertStr($nrow['typename']);
	$typeid = $nrow['id'];
	$catcontect = '';
	$userLang = $nrow['lang'];
	if($nrow['ispart']==3)
	{
		$catcontect = html2wml($nrow['content']);
	}
	$trow = $dsql->GetOne("Select id,typename From `#@__arctype` where lang='$userLang' And  reid=0 ");
	$langname = ConvertStr($trow['typename']);
	$langid = $trow['id'];
	//当前栏目下级分类
	$dsql->SetQuery("Select ID,typename From `#@__arctype` where reID='$id' And channeltype=1 And ishidden=0 And ispart<>2 order by sortrank");
	$dsql->Execute();
	while($row=$dsql->GetObject())
	{
		$channellistnext .= "<a href='wap.php?action=list&amp;id={$row->ID}'>".ConvertStr($row->typename)."</a> ";
	}
	//栏目内容(分页输出)
	$sids = GetSonIds($id,1,true);
	$varlist = "cfg_webname,typename,channellist,channellistnext,cfg_templeturl";
	ConvertCharset($varlist);
	require_once(dirname(__FILE__)."/include/datalistcp.class.php");
	$dlist = new DataListCP();
	$dlist->SetTemplet($cfg_templets_dir."/wap/list.wml");
	$dlist->pageSize = 10;
	$dlist->SetParameter("action","list");
	$dlist->SetParameter("id",$id);
	$dlist->SetSource("Select ID,title,pubdate,click From `#@__archives` where typeid in($sids) And arcrank=0 order by ID desc");
	$dlist->Display();
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
	  Select tp.typename,tp.ishidden,arc.typeid,arc.title,arc.arcrank,arc.pubdate,arc.writer,arc.click,addon.body From `#@__archives` arc 
	  left join `#@__arctype` tp on tp.ID=arc.typeid
	  left join `#@__addonarticle` addon on addon.aid=arc.ID
	  where arc.ID='$id'
	";
	$row = $dsql->GetOne($query,MYSQL_ASSOC);
	foreach($row as $k=>$v) $$k = $v;
	unset($row);
	$pubdate = strftime("%y-%m-%d %H:%M:%S",$pubdate);
	if($arcrank!=0) exit();
	$title = ConvertStr($title);
	$body = html2wml($body);
	if($ishidden==1) exit();
	//当前栏目下级分类
	$dsql->SetQuery("Select ID,typename From `#@__arctype` where reID='$typeid' And channeltype=1 And ishidden=0 order by sortrank");
	$dsql->Execute();
	while($row=$dsql->GetObject()){
		$channellistnext .= "<a href='wap.php?action=list&amp;id={$row->ID}'>".ConvertStr($row->typename)."</a> ";
	}
	//栏目内容(分页输出)
	include($cfg_templets_dir."/wap/article.wml");
	$dsql->Close();
	echo $pageBody;
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
