<?php
$z[0]=Array("match","<div id=\"Cnt-Main-Article-QQ\" bosszone=\"content\" style=\"position: relative;\">[内容]</div>",5,121);
$z[1]=Array("trim","<iframe([^>]*)>(.*)</iframe>",126,188);
$z[1][4]['replace']="";
$z[2]=Array("trim","<div([^.]*)>",190,236);
$z[2][4]['replace']="";
$z[3]=Array("trim","</div>",238,278);
$z[3][4]['replace']="";
$z[4]=Array("function","",283,314);

?>