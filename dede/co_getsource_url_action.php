<?php
require_once(dirname(__FILE__)."/config.php");
CheckPurview('co_PlayNote');
require_once(DEDEINC.'/dedecollection.class.php');
if(empty($islisten))
{
	$islisten = 0;
}
if(empty($glstart))
{
	$glstart = 0;
}
if(empty($totalnum))
{
	$totalnum = 0;
}
if(empty($notckpic))
{
	$notckpic = 0;
}
$nid = (isset($nid) ? intval($nid) : 0);

//下载种子网址中未下载内容模式
/*-----------------------------
function Download_not_down() { }
------------------------------*/
if($islisten==0)
{
	$mrow = $dsql->GetOne("Select count(*) as dd From `#@__co_htmls` where nid='$nid' ");
	$totalnum = $mrow['dd'];
	$gurl = "co_gather_start_action.php?notckpic=$notckpic&islisten=$islisten&nid=$nid&startdd=$startdd&pagesize=$pagesize&sptime=$sptime";
	if($totalnum <= 0)
	{
		ShowMsg("你指定的模式为：<font color='red'>[下载种子网址中未下载内容]</font>，<br />使用这个模式节点必须已经有种子网址，否则请使用其它模式！","javascript:;");
		exit();
	}
	else
	{
		ShowMsg("检测节点正常，现转向网页采集...",$gurl."&totalnum=$totalnum");
		exit();
	}
}

//监控式采集（检测新内容）
/*-----------------------------
function Download_new() { }
------------------------------*/
else if($islisten==1)
{
	$gurl = "co_gather_start_action.php?notckpic=$notckpic&islisten=1&nid=$nid&startdd=$startdd&pagesize=$pagesize&sptime=$sptime";
	$gurlList = "co_getsource_url_action.php?islisten=1&nid=0&pagesize=$pagesize&sptime=$sptime";
	//针对专门节点
	if(!empty($nid))
	{
		$co = new DedeCollection();
		$co->LoadNote($nid);
		$limitList = $co->GetSourceUrl(1,0,100);
		$row = $co->dsql->GetOne("Select count(aid) as dd From `#@__co_htmls` where nid='$nid' ");
		$totalnum = $row['dd'];
		if($totalnum==0)
		{
			ShowMsg("在这节点中没发现有新内容....","javascript:;");
			exit();
		}
		else
		{
			ShowMsg("已获得所有种子网址，转向网页采集...",$gurl."&totalnum=$totalnum");
			exit();
		}
	}
	//针对所有节点
	else
	{
		$curpos = (isset($curpos) ? intval($curpos) : 0);
		$row = $dsql->GetOne("Select nid From `#@__co_note` order by nid asc limit $curpos,1");
		if(!is_array($row))
		{
			ShowMsg("完成所有节点检测....","co_gather_start_action.php?notckpic=0&sptime=0&nid=0&startdd=0&pagesize=5&totalnum=".$totalnum);
			exit();
		}
		else
		{
			$nnid = $row['nid'];
			$co = new DedeCollection();
			$co->LoadNote($nnid);
			$limitList = $co->GetSourceUrl(1,0,100);
			$curpos++;
			ShowMsg("已检测节点( {$nnid} )，继续下一个节点...",$gurlList."&curpos=$curpos");
			exit();
		}
	}
}

//重新下载所有内容模式
/*-----------------------------
function Download_all() { }
------------------------------*/
else
{
	$gurl = "co_gather_start_action.php?notckpic=$notckpic&islisten=$islisten&nid=$nid&startdd=$startdd&pagesize=$pagesize&sptime=$sptime";
	$gurlList = "co_getsource_url_action.php?islisten=$islisten&nid=$nid&startdd=$startdd&pagesize=$pagesize&sptime=$sptime";
	$co = new DedeCollection();
	$co->LoadNote($nid);
	$limitList = $co->GetSourceUrl($islisten,$glstart,$pagesize);
	if($limitList==0)
	{
		$row = $co->dsql->GetOne("Select count(aid) as dd From `#@__co_htmls` where nid='$nid'");
		$totalnum = $row['dd'];
		ShowMsg("已获得所有种子网址，转向网页采集...",$gurl."&totalnum=$totalnum");
		exit();
	}
	if($limitList>0)
	{
		ShowMsg("采集列表剩余：{$limitList} 个页面，继续采集...",$gurlList."&glstart=".($glstart+$pagesize),0,100);
		exit();
	}
}

?>