<?php
require_once(dirname(__FILE__).'/config.php');
CheckPurview('sys_Keyword');
require_once(DEDEINC.'/datalistcp.class.php');
require_once(DEDEINC."/arc.partview.class.php");
$timestamp = time();
if(empty($tag))
{
	$tag = '';
}

if(empty($action))
{
	// 获取所有分类
	$arctype_sql = "select id,typename from `#@__arctype` where ispart=2 order by id asc";
	$db = new DedeSql();
	$db->SetQuery($arctype_sql);
	$db->Execute();
	$arctype_list = array();
	while($arr = $db->GetArray()) $arctype_list[$arr['id']] = $arr['typename'];
	
	$orderby = empty($orderby) ? 'id' : eregi_replace('[^a-z]','',$orderby);
	$orderway = isset($orderway) && $orderway == 'asc' ? 'asc' : 'desc';
	if(!empty($tag))
	{
		$where = " where tag like '%$tag%'";
	}
	else
	{
		$where = '';
	}
	$neworderway = ($orderway == 'desc' ? 'asc' : 'desc');
	$query = "Select * from `#@__tagindex` left join `#@__tagindex_ex` using(id) $where order by $orderby $orderway";
	$dlist = new DataListCP();
	$tag = stripslashes($tag);
	$dlist->SetParameter("tag",$tag);
	$dlist->SetParameter("orderway",$orderway);
	$dlist->SetParameter("orderby",$orderby);
	$dlist->pageSize = 20;
	$dlist->SetTemplet(DEDEADMIN."/templets/ex_tags_main.htm");
	$dlist->SetSource($query);
	$dlist->Display();
	exit();
}

/*
function update()
*/
else if($action == 'update')
{
	$tid = isset($_POST['tid']) ? (int)$_POST['tid'] : 0;
	if(empty($tid))
	{
		ShowMsg('没有选择要删除的tag!','-1');
		exit();
	}
	
	$alias = stripslashes(isset($_POST['alias']) ? $_POST['alias'] : '');
	$litpic = stripslashes(isset($_POST['litpic']) ? $_POST['litpic'] : '');
	$arctype_id = intval(isset($_POST['arctype_id']) ? $_POST['arctype_id'] : 0);
	$is_recommend = isset($_POST['is_recommend']) ? (int)$_POST['is_recommend'] : 0;
	$seq = isset($_POST['seq']) ? (int)$_POST['seq'] : 0;
	$backurl = isset($_POST['backurl']) ? $_POST['backurl'] : 'ex_tags_main.php';
	
	$count = isset($_POST['count']) ? (int)$_POST['count'] : 0;
	
	$query = "update `#@__tagindex` set `count`='$count' where id='{$tid}'";
	$dsql->ExecuteNoneQuery($query);
	
	$res = $dsql->GetOne("select * from `#@__tagindex_ex` where id='{$tid}'");

	if(empty($res)) {
		$query = "insert into `#@__tagindex_ex`(id,alias,litpic,arctype_id,is_recommend,seq) values('{$tid}','{$alias}','{$litpic}','{$arctype_id}','{$is_recommend}','{$seq}')";
	} else {
		$query = "update `#@__tagindex_ex` set alias='{$alias}',litpic='{$litpic}',arctype_id='{$arctype_id}',is_recommend='{$is_recommend}',seq='{$seq}' where id='{$tid}'";
	}
	
	$dsql->ExecuteNoneQuery($query);
	
	ShowMsg("成功保存标签的点击信息!", $backurl);
	exit();
}

/*
function delete()
*/
else if($action == 'delete')
{
	$ids = isset($_POST['ids']) ? $_POST['ids'] : '';
	$backurl = isset($_POST['backurl']) ? $_POST['backurl'] : 'ex_tags_main.php';
	
	if(@is_array($ids))
	{
		$stringids = implode(',', $ids);
	}
	elseif(!empty($ids))
	{
		$stringids = implode(',', array_unique(array_map('intval', explode(',', $ids))));
	}
	else
	{
		ShowMsg('没有选择要删除的tag','-1');
		exit();
	}
	$query = "delete from `#@__tagindex` where id in ($stringids)";
	if($dsql->ExecuteNoneQuery($query))
	{
		$query = "delete from `#@__taglist` where tid in ($stringids)";
		$dsql->ExecuteNoneQuery($query);
		ShowMsg("删除tags[ $stringids ]成功", $backurl);
	}
	else
	{
		ShowMsg("删除tags[ $stringids ]失败", $backurl);
	}
	exit();
}

/*
function fetch()
*/
else if($action == 'fetch')
{
	$wheresql = '';
	$start = isset($start) && is_numeric($start) ? $start : 0;
	$where = array();
	if(isset($startaid) && is_numeric($startaid) && $startaid > 0)
	{
		$where[] = " id>$startaid ";
	}
	else
	{
		$startaid = 0;
	}
	if(isset($endaid) && is_numeric($endaid) && $endaid > 0)
	{
		$where[] = " id<$endaid ";
	}
	else
	{
		$endaid = 0;
	}
	if(!empty($where))
	{
		$wheresql = " where arcrank>-1 and ".implode(' and ', $where);
	}
	$query = "select id as aid,arcrank,typeid,keywords from `#@__archives` $wheresql limit $start, 100";
	$dsql->setquery($query);
	$dsql->execute();
	$complete = true;
	while($row = $dsql->getarray())
	{
		$aid = $row['aid'];
		$typeid = $row['typeid'];
		$arcrank = $row['arcrank'];
		$row['keywords'] = trim($row['keywords']);
		if($row['keywords']!='' && !ereg(',',$row['keywords']))
		{
			$keyarr = explode(' ', $row['keywords']);
		}
		else
		{
			$keyarr = explode(',', $row['keywords']);
		}
		foreach($keyarr as $keyword)
		{
			$keyword = trim($keyword);
			if($keyword != '' && strlen($keyword)<13 )
			{
				$keyword = addslashes($keyword);
				$row = $dsql->getone("select id from `#@__tagindex` where tag like '$keyword'");
				if(is_array($row))
				{
					$tid = $row['id'];
					$query = "update `#@__tagindex` set `total`=`total`+1 where id='$tid' ";
					$dsql->ExecuteNoneQuery($query);
				}
				else
				{
					$query = " Insert Into `#@__tagindex`(`tag`,`count`,`total`,`weekcc`,`monthcc`,`weekup`,`monthup`,`addtime`) values('$keyword','0','1','0','0','$timestamp','$timestamp','$timestamp');";
					$dsql->ExecuteNoneQuery($query);
					$tid = $dsql->GetLastID();
				}
				$query = "replace into `#@__taglist`(`tid`,`aid`,`typeid`,`arcrank`,`tag`) values ('$tid', '$aid', '$typeid','$arcrank','$keyword'); ";
				$dsql->ExecuteNoneQuery($query);
			}
		}
		$complete = false;
	}
	if($complete)
	{
		ShowMsg("tags获取完成", 'ex_tags_main.php');
		exit();
	}
	$start = $start + 100;
	$goto = "ex_tags_main.php?action=fetch&startaid=$startaid&endaid=$endaid&start=$start";
	ShowMsg('继续获取tags ...', $goto, 0, 500);
	exit();
}
/*
校正文档数
function checkArcCount()
*/
else if($action == 'checkArcCount') {

	$ids = isset($_POST['ids']) ? $_POST['ids'] : '';
	$ids = implode(',', array_unique(array_map('intval', explode(',', $ids))));
	
	$query = "select tid,count(distinct aid) as `count` from `#@__taglist` where tid in({$ids}) group by tid";
	$dsql->SetQuery($query);
	$db->Execute();
	$ids = array();
	while($row = $db->GetArray()) {
		$query = "update `#@__tagindex` set total='{$row['count']}' where id = '{$row['tid']}'";
		if($dsql->ExecuteNoneQuery($query)) $ids[] = $row['tid'];
	}
	
	$backurl = isset($_POST['backurl']) ? $_POST['backurl'] : 'ex_tags_main.php';
	ShowMsg('校正tags['.implode(',', $ids).']文档数完成', $backurl);

	exit();
}
/*
生成静态HTML
function makeHtml()
*/
else if($action == 'makeHtml') {
	
	// 参数设定
	$arctype_id = isset($_GET['typeid']) ? (int)$_GET['typeid'] : 0;
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$each = 10;
	$offset = ($page - 1) * $each;
	$eachArc = 4;
	$eachHot = 10;
	
	$query = "select * from `#@__arctype` where id='{$arctype_id}' and ispart=2";
	$arctype = $dsql->GetOne($query);
	
	if(empty($arctype)) {
		ShowMsg('不支持的分类ID', '-1');
	}
	
	// 获取热门标签
	$query = "select distinct a.tid,a.tag,b.is_recommend,b.alias from `#@__taglist` a "
	."left join `#@__tagindex_ex` b on a.tid = b.id "
	."where b.arctype_id='{$arctype_id}' and b.is_recommend > 0 "
	."order by b.seq desc,b.id desc limit {$eachHot}";
	
	$dsql->SetQuery($query);
	$dsql->Execute();
	$hot_tags = array();
	while($row = $dsql->getArray()) {
		$hot_tags[$row['tid']] = $row;
	}

	// 获取分类下的标签
	$query = "select distinct a.tid,a.tag,b.`count`,b.total,c.litpic,c.alias from `#@__taglist` a "
	."left join `#@__tagindex` b on b.id = a.tid "
	."left join `#@__tagindex_ex` c on c.id = a.tid "
	."where c.arctype_id='{$arctype_id}' "
	."order by c.id desc limit {$offset}, {$each}";
	
	$dsql->SetQuery($query);
	$dsql->Execute();
	$tags = array();
	while($row = $dsql->getArray()) {
		$tags[$row['tid']] = $row;
	}
	
	if(empty($tags) && $page != 1) {
		ShowMsg('生成静态页面完成', 'ex_tags_main.php');
		exit;
	}
	
	// 获取分类下的文章
	foreach($tags as &$v) {
		$v['arc'] = array();
		$query = "select distinct a.aid,b.title,b.pubdate,b.typeid,c.typedir from `#@__taglist` a "
		."left join `#@__archives` b on b.id = a.aid "
		."left join `#@__arctype` c on b.typeid = c.id "
		."where tid='{$v['tid']}' order by a.aid desc limit {$eachArc}";
		
		$dsql->SetQuery($query);
		$dsql->Execute();
		while($row = $dsql->getArray()) $v['arc'][] = $row;
	}
	
	// 获取标签总数
	$query = "select count(distinct a.tid) as `count` from `#@__taglist` a "
	."left join `#@__tagindex` b on b.id = a.tid "
	."left join `#@__tagindex_ex` c on c.id = a.tid "
	."where c.arctype_id='{$arctype_id}'";
	
	$tags_count = $dsql->GetOne($query);
	$tags_count = isset($tags_count['count']) ? (int)$tags_count['count'] : 0;
	$page_html = GetPageList('list_'.$arctype_id.'_{page}.html', $page, $tags_count, $each, 5);
	
	// 创建栏目目录
	$true_typedir = str_replace("{cmspath}",$cfg_cmspath,$arctype['typedir']);
	$true_typedir = ereg_replace("/{1,}","/",$true_typedir);
	if(!CreateDir($true_typedir))
	{
		ShowMsg("创建目录 {$true_typedir} 失败，请检查你的路径是否存在问题！","-1");
		exit();
	}
	
	// 生成静态页面文件
	$output = $cfg_basedir.str_replace('{cmspath}', $cfg_cmspath, $arctype['typedir']).'/list_'.$arctype_id.'_'.$page.'.html'; // 写死了
	$tpl_file = $cfg_basedir.$cfg_templets_dir.'/tmcms/tag.htm';
	$pv = new PartView();
	$pv->SetTemplet($tpl_file);
	$pv->SaveToHtml($output);
	if($page == 1) {
		$output = $cfg_basedir.str_replace('{cmspath}', $cfg_cmspath, $arctype['typedir']).'/index.html';
		$pv->SaveToHtml($output);
	}
	
	$page++;
	$goto = "ex_tags_main.php?action=makeHtml&typeid={$arctype_id}&page={$page}";
	ShowMsg('继续生成下一页['.$page.']静态页面', $goto);
	
	exit;
}


//获取静态的分页列表
function GetPageList($url,$page,$count,$each,$list_len,$listitem="index,end,pre,next,pageno,option")
{
	$prepage = $nextpage = '';
	$prepagenum = $page-1;
	$nextpagenum = $page+1;
	if($list_len=='' || ereg("[^0-9]",$list_len))
	{
		$list_len=3;
	}
	$totalpage = ceil($count/$each);
	if($totalpage<=1 && $count>0)
	{

		return "<li><span class=\"pageinfo\">共 <strong>1</strong>页<strong>".$count."</strong>条记录</span></li>\r\n";
	}
	if($count == 0)
	{
		return "<li><span class=\"pageinfo\">共 <strong>0</strong>页<strong>".$count."</strong>条记录</span></li>\r\n";
	}
	$purl = $url;
	$maininfo = "<li><span class=\"pageinfo\">共 <strong>{$totalpage}</strong>页<strong>".$count."</strong>条</span></li>\r\n";
	$tnamerule = $purl;

	//获得上一页和主页的链接
	if($page != 1)
	{
		$prepage.="<li><a href='".str_replace("{page}",$prepagenum,$tnamerule)."'>上一页</a></li>\r\n";
		$indexpage="<li><a href='".str_replace("{page}",1,$tnamerule)."'>首页</a></li>\r\n";
	}
	else
	{
		$indexpage="<li><a href=\"#\">首页</a></li>\r\n";
	}

	//下一页,未页的链接
	if($page!=$totalpage && $totalpage>1)
	{
		$nextpage.="<li><a href='".str_replace("{page}",$nextpagenum,$tnamerule)."'>下一页</a></li>\r\n";
		$endpage="<li><a href='".str_replace("{page}",$totalpage,$tnamerule)."'>末页</a></li>\r\n";
	}
	else
	{
		$endpage="<li><a href=\"#\">末页</a></li>\r\n";
	}

	//option链接
	$optionlist = '';

	$optionlen = strlen($totalpage);
	$optionlen = $optionlen*12 + 18;
	if($optionlen < 36) $optionlen = 36;
	if($optionlen > 100) $optionlen = 100;
	$optionlist = "<li><select name='sldd' style='width:{$optionlen}px' onchange='location.href=this.options[this.selectedIndex].value;'>\r\n";
	for($mjj=1;$mjj<=$totalpage;$mjj++)
	{
		if($mjj==$page)
		{
			$optionlist .= "<option value='".str_replace("{page}",$mjj,$tnamerule)."' selected>$mjj</option>\r\n";
		}
		else
		{
			$optionlist .= "<option value='".str_replace("{page}",$mjj,$tnamerule)."'>$mjj</option>\r\n";
		}
	}
	$optionlist .= "</select></li>\r\n";

	//获得数字链接
	$listdd="";
	$total_list = $list_len * 2 + 1;
	if($page >= $total_list)
	{
		$j = $page-$list_len;
		$total_list = $page+$list_len;
		if($total_list>$totalpage)
		{
			$total_list=$totalpage;
		}
	}
	else
	{
		$j=1;
		if($total_list>$totalpage)
		{
			$total_list=$totalpage;
		}
	}
	for($j;$j<=$total_list;$j++)
	{
		if($j==$page)
		{
			$listdd.= "<li class=\"thisclass\">$j</li>\r\n";
		}
		else
		{
			$listdd.="<li><a href='".str_replace("{page}",$j,$tnamerule)."'>".$j."</a></li>\r\n";
		}
	}
	$plist = '';
	if(eregi('index',$listitem)) $plist .= $indexpage;
	if(eregi('pre',$listitem)) $plist .= $prepage;
	if(eregi('pageno',$listitem)) $plist .= $listdd;
	if(eregi('next',$listitem)) $plist .= $nextpage;
	if(eregi('end',$listitem)) $plist .= $endpage;
	if(eregi('option',$listitem)) $plist .= $optionlist;
	if(eregi('info',$listitem)) $plist .= $maininfo;
	
	return $plist;
}

?>