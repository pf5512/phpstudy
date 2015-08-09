<?php
require_once (dirname(__FILE__) . "/include/common.inc.php");
header("Content-Type: text/html; charset=utf-8");
//header("Content-type:text/vnd.wap.wml");
require_once(dirname(__FILE__)."/include/wap.inc.php");
if(empty($action) || ($action=='list' && !intval($typeid)) || ($action=='article' && !intval($id))){
	$action = 'index';
} 
$cfg_templets_dir = $cfg_basedir.$cfg_templets_dir;
$channellist = '';
$newartlist = '';
$channellistnext = '';

//���������б�
$dsql->SetQuery("Select id,typename From `#@__arctype` where reid=0 And channeltype=1 And ishidden=0 And ispart<>2 order by sortrank");
$dsql->Execute();
while($row=$dsql->GetObject())
{
	$channellist .= "<li><a href='wap.php?action=list&amp;typeid={$row->id}' data-icon='grid'>{$row->typename}</a></li> ";
}

//��ǰʱ��
//$curtime = strftime("%Y-%m-%d %H:%M:%S",time());
//$cfg_webname = ConvertStr($cfg_webname);

//��ҳ
/*------------
function __index();
------------*/
if($action=='index')
{
	( isset($_GET[p]) && intval($_GET[p])>=0 && intval($_GET[p])<=2000 ) ? $p = intval($_GET[p]) : $p=1;
	( isset($_GET[pz]) && intval($_GET[pz])>=0  && intval($_GET[pz])<=50 ) ? $pz = intval($_GET[pz]) : $pz=10;

	//��������
	$dsql->SetQuery("Select id,typeid,title,pubdate,click From `#@__archives` where channel=1 And arcrank = 0 order by id desc limit " . ($p-1)*$pz . ",{$pz}");
	$dsql->Execute();
	while($row=$dsql->GetObject())
	{
		$newartlist .= "<li><a href='wap.php?action=article&amp;typeid={$row->typeid}&amp;id={$row->id}'><h3>".ConvertStr($row->title)."</h3> <p class='ui-li-aside'>[".date("m-d",$row->pubdate)."]</p><span class='ui-li-count'>{$row->click}</span></a></li>";
	}
	$p_next_a = "wap.php?p=". ($p+1) ."&pz={$pz}";
	if($p > 1) $p_prev_a = "wap.php?p=". ($p-1) ."&pz={$pz}";
	//��ʾWML
	include($cfg_templets_dir."/wap/index.wml");
	$dsql->Close();
	echo $pageBody;
	exit();
}
/*------------
function __list();
------------*/
//�б�
else if($action=='list')
{
	$needCode = 'utf-8';
	//$typeid = preg_replace("[^0-9]", '', $typeid);
	//if(empty($typeid)) $typeid=1;

	//��ǰ��Ŀ�¼�����
	//$typeid = preg_replace("[^0-9]", '', intval($_GET[typeid]));
	$dsql->SetQuery("Select id,typename From `#@__arctype` where reid='{$typeid}' And channeltype=1 And ishidden=0 And ispart<>2 order by sortrank");
	$dsql->Execute();
	while($row=$dsql->GetObject())
	{
		$channellistnext .= "<li><a href='wap.php?action=list&amp;typeid={$row->id}'>".ConvertStr($row->typename)."</a></li> ";
	}

	require_once(dirname(__FILE__)."/include/datalistcp.class.php");
	$row = $dsql->GetOne("Select typename,ishidden From `#@__arctype` where id='$typeid' ");
	if($row['ishidden']==1) exit();
	$typename = ConvertStr($row['typename']);
	//��Ŀ����(��ҳ���)
	$sids = GetSonIds($typeid,1,true);
	$varlist = "cfg_webname,typename,channellist,channellistnext,cfg_templeturl";
	ConvertCharset($varlist);
	$dlist = new DataListCP();
	$dlist->SetTemplet($cfg_templets_dir."/wap/list.wml");
	$dlist->pageSize = 10;
	$dlist->SetParameter("action","list");
	$dlist->SetParameter("typeid",$typeid);
	$dlist->SetSource("Select id,title,pubdate,click From `#@__archives` where typeid in($sids) And arcrank=0 order by id desc");
	$dlist->Display();
	exit();
}
//�ĵ�
/*------------
function __article();
------------*/
else if($action=='article')
{
	//�����+1
	$dsql->ExecuteNoneQuery("Update `#@__archives` set click=click+1 where id='$id'");

	//�ĵ���Ϣ
	$query = "Select tp.typename,tp.reid,tp.ishidden,arc.typeid,arc.title,arc.arcrank,arc.pubdate,arc.writer,arc.click,addon.body From `#@__archives` arc 
	  left join `#@__arctype` tp on tp.id=arc.typeid
	  left join `#@__addonarticle` addon on addon.aid=arc.id
	  where arc.id='$id'";
	$row = $dsql->GetOne($query,MYSQL_ASSOC);
	foreach($row as $k=>$v) $$k = $v;
	//��ȡͬ����ǰһ����id
	$query = "Select id FROM `#@__archives` where id<'$id' AND typeid='$typeid' order by id desc limit 1";
	$row = $dsql->GetOne($query,MYSQL_ASSOC);
	(!empty($row[id])) ? $prev_arc_id = $row[id] : $prev_arc_id = $id;
	//��ȡͬ�����һ����id
	$query = "Select id FROM `#@__archives` where id>'$id' AND typeid='$typeid' order by id asc limit 1";
	$row = $dsql->GetOne($query,MYSQL_ASSOC);
	(!empty($row[id])) ? $next_arc_id = $row[id] : $next_arc_id = $id;

	//echo 'id:',$id,',typeid:',$typeid,',prev_arcid:',$prev_arc_id,'next_arcid:',$next_arc_id;die();
	
	unset($row);

	$pubdate = strftime("%y-%m-%d %H:%M:%S",$pubdate);
	if($arcrank!=0) exit();
	$title = ConvertStr($title);
	$body = html2wml($body);
	if($ishidden==1) exit();

	//��ǰ��Ŀͬ������
	//$reid = $reid;
	//if($typeid){
		//��ȡ��ǰ��Ŀ�ϼ�����id
		//$dsql->SetQuery("Select reid From `#@__arctype` where id='{$typeid}' And channeltype=1 And ishidden=0 And ispart<>2 limit 1");
		//$dsql->Execute();
		//�����ȡ��������
		//if($row=$dsql->GetObject()){
			//$reid = $row->reid;
		if($reid){
			$dsql->SetQuery("Select id,typename From `#@__arctype` where reid='{$reid}' And channeltype=1 And ishidden=0 And ispart<>2 order by sortrank");
			$dsql->Execute();
			while($row=$dsql->GetObject())
			{
				$channellistnext .= "<li><a href='wap.php?action=list&amp;typeid={$row->id}'>".ConvertStr($row->typename)."</a></li> ";
			}
		}
	//}

	//��Ŀ����(��ҳ���)
	include($cfg_templets_dir."/wap/article.wml");
	$dsql->Close();
	echo $pageBody;
	exit();
}
//����
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
