<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo GetLang('favorites'); ?></title>
<?php include(DEDEMEMBER."/templets/head_inc.htm"); ?>
<script type="text/javascript">
$(function() {
	$("#navigation .sort").click(function(){
		$(this).next(".menu").toggleClass("invisible");
		$(this).toggleClass("hover");
	})
	//列表
	$("table.list1 tr:even").addClass("even"); //偶行风格
	//点击高亮
	$("table.list1 td").click(function() {
		$(this).parent("tr").toggleClass("click");
		$(this).parent("tr").toggleClass("hover");
	});
	$("table.list1 td").hover(function() {
		$(this).parent("tr").addClass("hover");
	},
	function() {
		$(this).parent("tr").removeClass("hover");
	});
	//checked 全选&反选&单选
	$("#checkedClick").click(function(){
		$("form [name='deleteid']").each(function(){
			if($(this).attr("checked")){
				$(this).removeAttr("checked");
				}
			else{
				$(this).attr("checked",'true');
				}
		})
	});
})
</script>
</head>
<body>
<?php include(DEDEMEMBER."/templets/head.htm"); ?>
<div class="wrapper mT10">
  <div class="west">
    <?php include(DEDEMEMBER."/templets/menu.htm"); ?>
  </div>
  <div class="east mL10">
    <div class="heading mB10"><strong class="icon doc mL10" style="width:400px;"><?php echo GetLang('mydocuments'); ?></strong></div>
    <table cellspacing="1" class="list1 blueA">
      <thead>
        <tr>
          <th width="5%"><input name="checkedClick" type="checkbox" value="" id="checkedClick"></th>
          <th><?php echo GetLang('title'); ?></th>
          <th width="15%"><?php echo GetLang('time'); ?></th>
          <th width="20%"><?php echo GetLang('operation');?></th>
        </tr>
      </thead>
      <tbody>
      <?php
$atts = array();
$atts['tagname'] = 'datalist';
$blockValue = $this->refObj->GetArcList($atts,$this->refObj,$fields); 
foreach( $blockValue as $key=>$fields )
{
?>
      <tr>
        <td align="center"><input type="checkbox" name="deleteid" value="<?php echo $fields['id']; ?>" /></td>
        <td><a href='/plus/view.php?aid=<?php echo $fields["id"]; ?>' target='_blank'><?php echo $fields["title"]; ?></a></td>
        <td align="center"><?php echo MyDate('m-d H:i', $fields['senddate']); ?></td>
        <td align="center"><a class="text_button" href="/plus/recommend.php?lang=<?php echo $userLang; ?>&aid=<?php echo $fields['id']; ?>" target="_blank">[<?php echo GetLang('recommend'); ?>]</a></td>
      </tr>
      <?php
}
?>
      </tbody>
      
    </table>
    <div class="fLeft mT10">
      <button class="buttonGary2" onclick="DelSel('0');" type="button" ><?php echo GetLang('del'); ?></button>
    </div>
    <ul class="paglist clear">
      <?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['listsize'] = '5';
 echo $this->refObj->GetPageList($atts,$this->refObj,$fields); 
?>

    </ul>
  </div>
</div>
<div class="clearfix"></div>
<?php include(DEDEMEMBER."/templets/foot.htm"); ?>
</body>
</html>