<? include handler('template')->file('@admin/header'); ?>
 <form action="admin.php" method="get" name="search"> <input type="hidden" name="mod" value="sessions" size="40"> <input type="hidden" name="code" value="search" size="40"> <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder"> <tr class="header"> <td colspan="3"><span style="float:right">在线用户:<?=$total?>人</span> 搜索在线用户 </td> </tr> <tr> <td class="altbg1" width="30%"> 用户名: </td> <td class="altbg2"><input type="text" name="username" value="<?=$username?>" size="40"> <td rowspan="2" class="altbg1" width="200"><button name="do" value='' type="submit" class="button back2">搜索一下</button></td> </td> </tr> <tr> <td class="altbg1" width="30%"> IP地址: </td> <td class="altbg2"><input type="text" name="ip" value="<?=$ip?>" size="40"> </td> </tr> </table> </form> 
<? if($session_list > 0) { ?>
 <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder"> <tr align="center" class="header"> <td>用户</td> <td>IP</td> <td>最后访问时间</td> </tr> 
<? if($order_html) { ?>
 <tr> <td colspan="8"><div style="float:right;" align="right">排序方式：<?=$order_html?></div></td> </tr> 
<? } ?>
 
<? if(is_array($session_list)) { foreach($session_list as $session) { ?>
 <tr onmouseover="this.className='tr_hover'" onmouseout="this.className='tr_normal'"> <td>
<? if($session['uid']>0) { ?>
 <a href="admin.php?mod=member&code=modify&id=<?=$session['uid']?>"><?=$session['username']?></a> 
<? } else { ?> 
<? if($robot[$session['ip']]) { ?>
 <a href="admin.php?mod=robot&code=view&name=
<? echo urlencode($robot[$session['ip']]) ?>
&day=10" title="蜘蛛:<?=$robot[$session['ip']]?>"><b><?=$robot[$session['ip']]?></b></a> 
<? } else { ?><?=$session['username']?>
<? } ?>
 
<? } ?>
 </td> <td> <?=$session['ip']?> </td> <td> <?=$session['dateline']?> </td> </tr> 
<? } } ?>
 <tr> <td colspan="8" class="altbg1"> <?=$pages?> </td> </tr> <tr id="div_none" style="display:none;"> <td colspan="6" class="altbg1"></td> </tr> <tr id="div_del" style="display:none;"> <td colspan="6" class="altbg1"></td> </tr> </table> 
<? } else { ?> <div style='color:red'>没有找到相关的记录，请更改搜索条件</div> 
<? } ?>
 <table cellspacing="0" cellpadding="0" border="0" width="95%" align="center"> <tr> <td class="multi"></td> </tr> </table> <br>
<? include handler('template')->file('@admin/footer'); ?>