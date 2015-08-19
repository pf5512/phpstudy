<?php
$z[0]=Array("match","<p style=\"TEXT-INDENT: 2em\">[内容]</p>",5,70);
$z[1]=Array("trim","<iframe([^>]*)>(.*)</iframe>",75,137);
$z[1][4]['replace']="";
$z[2]=Array("trim","<div([^.]*)>",139,185);
$z[2][4]['replace']="";
$z[3]=Array("trim","</div>",187,227);
$z[3][4]['replace']="";
$z[4]=Array("function","",232,263);

?>