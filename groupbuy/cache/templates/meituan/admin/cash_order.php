<? include handler('template')->file('@admin/header'); ?>
 
<? if($orderid) { ?>
 <div class="header"> <a href="?mod=cash&code=order&orderid=<?=$orderid?>">用户提现记录详情</a> </div> <table id="orderTable" cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder"> <thead> <tr class="tr_nav"> <td width="15%">提现记录流水号</td> <td width="10%">提现用户</td> <td width="6%">提现金额</td> <td width="16%">提现方式</td> <td width="8%">受理状态</td> </tr> </thead> <tbody> <tr> <td><?=$order['orderid']?></td> <td><? echo app('ucard')->load($order['userid']); ?></td> <td><?=$order['money']?></td> <td>
<? if($order['paytype'] =='money') { ?>
上门提现<br/><? } elseif($order['paytype'] =='bank') { ?>银行转帐[<?=$order['bankname']?>]<br/>[<?=$order['bankusername']?>]<?=$order['bankcard']?><br/><? } elseif($order['paytype'] =='alipay') { ?>支付宝<br/>[<?=$order['bankusername']?>]<?=$order['alipay']?>
<? } ?>
</td> <td>
<? if($order['status'] =='doing') { ?>
正在处理<? } elseif($order['status'] =='no') { ?>等待处理<? } elseif($order['status'] =='yes') { ?><font color="green">提现成功</font>
<? } else { ?><font color="red">提现失败</font>
<? } ?>
</td> </tr> </tbody> </table> 
<? logic('payfrom')->html($order['userid']) ?>
 
<? if($order['status'] =='doing') { ?>
 <div class="header">确认操作</div> <form action="<?=$action?>" method="post" >
<input type="hidden" name="FORMHASH" value='<?=FORMHASH?>'/> <table id="orderTable" cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder"> <tr><td>操作结果</td><input type="hidden" name="orderid" value="<?=$order['orderid']?>"> <td><label><input type="radio" name="status" value="yes">提现成功</label><label><input type="radio" name="status" value="error" style="margin-left:20px">提现失败</label> <input type="submit" value=" 提 交 " style="margin-left:100px;"></td> </tr> <tr><td>备注</td><td><textarea name="info" style="width:600px;height:60px;"></textarea></td></tr> </table> </form> 
<? } ?>
 <div class="header">记录详情</div> <table id="orderTable" cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder"> <thead> <tr class="tr_nav"> <td width="15%">操作时间</td> <td width="10%">操作人</td> <td width="6%">处理方式</td> <td>备注</td> </tr> </thead> <tbody> <tr> <td><? echo date('Y-m-d H:i:s', $order['createtime']); ?></td> <td>用户本人</td> <td>提交申请</td> <td>用户前台操作</td> </tr> 
<? if($order_log) { ?>
 
<? if(is_array($order_log)) { foreach($order_log as $one) { ?>
 <tr> <td><? echo date('Y-m-d H:i:s', $one['createtime']); ?></td> <td><?=$one['username']?></td> <td><?=$one['status']?></td> <td><?=$one['info']?></td> </tr> 
<? } } ?>
 
<? } ?>
 </tbody> </table> 
<? } else { ?><?=ui('loader')->js('#admin/js/cash.order.ops')?>
<div class="header"> <a href="?mod=cash&code=order">用户提现记录列表</a> </div>
<?=ui('isearcher')->load('admin.cash_order_list')?>
<table id="orderTable" cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder"> <thead> <tr class="tr_nav"> <td width="15%">提现记录流水号</td> <td width="10%">提现用户</td> <td width="6%">提现金额</td> <td width="16%">提现方式/受理时间</td> <td width="8%">提现处理</td> </tr> </thead> <tbody> 
<? if(is_array($list)) { foreach($list as $one) { ?>
 <tr id="ro_on_<?=$one['id']?>"> <td>
<?=$one['orderid']?>
</td> <td><? echo app('ucard')->load($one['userid']); ?></td> <td>
<?=$one['money']?>
</td> <td>
<? if($one['paytype'] =='money') { ?>
上门提现<br/><? } elseif($one['paytype'] =='bank') { ?>银行转帐[<?=$one['bankname']?>]<br/>
[<?=$one['bankusername']?>]<?=$one['bankcard']?><br/><? } elseif($one['paytype'] =='alipay') { ?>支付宝<br/>[<?=$one['bankusername']?>]<?=$one['alipay']?><br/>
<? } ?>

<? if($one['paytime'] > 0) { ?>
受理时间：<? echo date('Y-m-d H:i:s', $one['paytime']); ?>
<? } else { ?>等待处理
<? } ?>
</td> <td>
<? if($one['status']=='no') { ?>
<a href="javascript:cashOrderConfirm('<?=$one['orderid']?>');">[允许提现]</a><? } elseif($one['status'] =='doing') { ?>正在处理<br><a href="?mod=cash&code=order&orderid=<?=$one['orderid']?>"><font style="border:1px solid #999;padding:4px;background-color:#f2f2f2;">开始受理</font></a><? } elseif($one['status'] =='yes') { ?><font color="green">提现成功</font><br><a href="?mod=cash&code=order&orderid=<?=$one['orderid']?>">查看详情</a>
<? } else { ?><font color="red">提现失败</font><br><a href="?mod=cash&code=order&orderid=<?=$one['orderid']?>">查看详情</a>
<? } ?>
</td> </tr> 
<? } } ?>
 </tbody> <tfoot> <tr> <td colspan="5"><?=page_moyo()?></td> </tr> </tfoot> </table> 
<? } ?>
<? include handler('template')->file('@admin/footer'); ?>