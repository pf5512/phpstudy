<?php
    $XML=new DOMDocument("1.0","utf-8");	// 实例化一个对象，并设置 XML 版本和编码
    $XML->load("language.xml");			// 打开一个 XML 文件
    
    $langs=$XML->getElementsByTagName("Lang");	// 通过标签名获取指定的节点集合
    $lang=$langs->item(1);			// 通过 item() 获取指定节点
    $lang->nodeValue="Japanese";		// 为节点赋值，Japanese
    
    $XML->save("language.xml");			// 亲，记得保存
?>