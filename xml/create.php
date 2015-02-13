<?php
    $XML=new DOMDocument("1.0","utf-8");	// 实例化一个对象，并设置 XML 版本和编码
    
    $XML->formatOutput=true;			// 格式化输出，保留缩进
    $XML->preservaWhiteSpace=false;		// 不保留空格，这个是辅助格式化输出的
    
    $root=$XML->createElement("Languages");		// 创建根节点，有且只能有一个
    
    $lang1=$XML->createElement("Lang","Chinese");	// 创建一个子节点，这是方法一
    $lang1->setAttribute("id","1001");			// 设置子节点的属性
    
    $lang2=$XML->createElement("Lang");			// 创建一个子节点，这是方法二
    $lang2_text=$XML->createTextNode("English");	// 创建子节点的内容
    $lang2_Attr_n=$XML->createAttribute("id");		// 创建子节点的属性名称
    $lang2_Attr_v=$XML->createTextNode("1002");		// 创建子节点的属性内容
    $lang2_Attr_n->appendChild($lang2_Attr_v);		// 将属性内容赋值给属性名称
    $lang2->appendChild($lang2_text);			// 为创建的空子节点添加内容
    $lang2->appendChild($lang2_Attr_n);			// 为创建的空子节点添加属性

    $root->appendChild($lang1);				// 添加子节点，不添加将不能显示 $lang1
    $root->appendChild($lang2);				// 添加子节点，不添加将不能显示 $lang2
    
    $XML->appendChild($root);				// 最重要的一步：将根节点添加到文档里面
    
    $XML->save("language.xml");				// 保存 XML 文档，路径是相对路径
?>