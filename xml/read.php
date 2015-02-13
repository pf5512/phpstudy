<?php
    $XML=new DOMDocument("1.0","utf-8");	// 实例化一个对象，并设置 XML 版本和编码
    $XML->validateOnParse=true;			// 开启验证，DTD 验证文档格式
    $XML->load("language.xml");			// 打开一个 XML 文件
    $langs=$XML->getElementById("b002");	// 获取 id 为 "b002" 的节点
    echo $langs->nodeValue;			// 输出 《西游记》
?>