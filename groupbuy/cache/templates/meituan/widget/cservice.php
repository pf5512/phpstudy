<? $kf=ini('data.cservice') ?>
<div class="t_area_out ">
<h1>在线客服</h1>
<div class="t_area_in">
<ul class="kefu_list" >
<? if($kf['qq'] != '') { ?>
<? $qqs = explode(',', $kf['qq']) ?>
<li class="kefu_qq">
<? if(is_array($qqs)) { foreach($qqs as $qq) { ?>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qq?>&site=qq&menu=yes" title="点击这里给我发消息"><img src="http://wpa.qq.com/pa?p=2:<?=$qq?>:41" /></a>
<? } } ?>
</li>
<? } ?>

<? if($kf['msn'] != '') { ?>
<li class="kefu_msn">MSN：<?=$kf['msn']?></li>
<? } ?>

<? if($kf['aliww'] != '') { ?>
<li class="kefu_aliww">
<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?=$kf['aliww']?>&siteid=cntaobao&status=1&charset=utf-8" title="点击这里给我发消息"><img src="http://amos.alicdn.com/online.aw?v=2&uid=<?=$kf['aliww']?>&site=cntaobao&s=1&charset=utf-8" /></a>
</li>
<? } ?>

<? if($kf['phone'] != '') { ?>
<li class="kefu_phone">电话：<?=$kf['phone']?></li>
<? } ?>
</ul>
</div>
</div>