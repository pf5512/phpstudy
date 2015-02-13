<?php
    $XML=new DOMDocument("1.0","utf-8");	// 实例化一个对象，并设置 XML 版本和编码
    $XML->load("language.xml");			// 打开一个 XML 文件
    $root=$XML->documentElement;		// 获取根节点
    $parent=$XML->getElementsByTagName("Languages")->item(0);	// 获取指定的节点集合的父元素
    $langs=$XML->getElementsByTagName("Lang");			// 获取指定的节点集合
    $lang=$langs->item(1);					// 通过 item() 获取指定节点
    
    // 下面的三行代码用于测试，测试三次，每次只使用其中一行，通过对比来验证结论！
    
    $XML->removeChild($lang);			// 错误，$XML 不是父节点（删除此行程序会正常）
    $root->removeChild($lang);			// 正确，$root 恰巧是父节点，因为嵌套只有一层
    $parent->removeChild($lang);		// 正确，$parent 是真正的父节点
    
    $XML->save("language.xml");			// 亲，记得保存
    
    $XML=new DOMDocument("1.0","utf-8");	// 实例化一个对象，并设置 XML 版本和编码
    $XML->load("media.xml");			// 打开一个 XML 文件
    $root=$XML->documentElement;		// 获取根节点
    $parent=$XML->getElementsByTagName("music")->item(0);	// 获取指定的节点集合的父元素
    $songs=$XML->getElementsByTagName("song");			// 获取指定的节点集合
	
    foreach($songs as $song)				// 遍历要操作的整个节点集合
    {
        if($song->getAttribute("id")=="102")		// 删除 id 为102的节点
        {   // 调试四次，每次只使用其中一行！
            $XML->removeChild($song);			// 错误，$XML 不是父节点
            $root->removeChild($song);			// 错误，$root 不是父节点
            $songs->removeChild($song);			// 错误，$songs 不是父节点
            $parent->removeChild($song);		// 正确，$parent 是真正的父节点
        }
    }
    
    $XML->save("media.xml");			// 亲，全部讲完了，记得好评呢~
?>