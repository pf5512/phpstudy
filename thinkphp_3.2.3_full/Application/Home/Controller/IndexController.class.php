<?php
namespace Home\Controller;
use Think\Controller;
use Libiary\Vendor\Mail;
use Org\Net\HttpCurl;
use Common\Pinyin;
class IndexController extends Controller {
    public function index(){
		C("index","index");
		
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	
	public function index2()
	{
		$Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation('2.1.1.1'); // 获取某个IP地址所在的位置
		$this->show('<div type="text/css">'.$area[country].'-->'.$area[area].'</div>','utf-8');
	}
	
	public function index3()
	{  
        if(SendMail("15521109628@163.com","测试邮件。","测试内容。"))
            $this->success('发送成功');
        else
            $this->error('发送失败');
	}
	
	public function mail()
	{
		if(IS_POST)
		{
			$title=I("title","UnkownTitle","strip_tags");
			$content=I("content","Nocontent","strip_tags");
			$reveiver=I("receiver","yingjiechen@live.cn","strip_tags");
			
			SendMail($reveiver,$title,$content);
			$this->success("发送成功","/index.php/Index/mail");
			
		}
		else
		{
			$this->display();
		}
	}
	
	public function processBar()
	{
		// 实例化Download对象
		$down = new \Common\Util\Http\Download(function($completed, $total, $percentage){
		   echo $completed .'/' .$total, ' ', $percentage .'%', '<br>';
		 });
		$down->begin('http://yinyueshiting.baidu.com/data2/music/18605547/18605122122400128.mp3?xcode=c146fc657557302808a65907a49a17b0', 'demo.mp3');

	}
	
	public function Pinyin()
	{
		import("ORG.Util.Pinyin");
		$py = new \org\util\PinYin();
		echo $py->getAllPY("输出汉字所有拼音"); //shuchuhanzisuoyoupinyin
		echo $py->getFirstPY("输出汉字首拼音"); //schzspy

	}
}