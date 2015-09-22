<?php
namespace Home\Controller;
use Think\Controller;
use Libiary\Vendor\Mail;
use Think\Verify;

class CommonController extends Controller {
	
	public $Verify;
	
	public function genVerify()
	{
		$Verify=new Verify();
		$Verify->useImgBg=true;
		$Verify->fontSize=16;
		$Verify->length=4;
		$Verify->useNoise=false;
		$Verify->entry();
	}
	
	public function getCities()
	{
		$cityblocklist=C("cityblock");
		return $cityblocklist;
	}
	
	public function getCitie($pro)
	{
		$cityblocklist=C("cityblock");
		$cities=$cityblocklist[$pro]["city"];
		$str="";
		foreach($cities as $k => $city)
		{
			$str.="<option value='$k'>$city[city_name]</option>";
		}
		return $str;
	}
	
	public function getCitieHtml($pro)
	{
		echo $this->getCitie($pro);
	}
	
	public function getAreas($pro,$city)
	{
		$cityblocklist=C("cityblock");
		$areas=$cityblocklist[$pro]["city"][$city]["area"];
		$str="";
		foreach($cities as $k => $city)
		{
			$str.="<option value='$k'>$area</option>";
		}
		return $str;
	}
	
	public function getAreasHtml($pro,$city)
	{
		echo $this->getAreas($pro,$city);
	}
	
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	
	public function getPosByIp()
	{
		$Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation('2.1.1.1'); // 获取某个IP地址所在的位置
		$this->show('<div type="text/css">'.$area[country].'-->'.$area[area].'</div>','utf-8');
	}
	
	public function mail()
	{  
        if(SendMail("15521109628@163.com","测试邮件。","测试内容。"))
            $this->success('发送成功！');
        else
            $this->error('发送失败');
	}
	
	 protected function filter_word($value){
        $word = F('word','','./Public/Cache/');
        if(!$word){
        	$word=M('word')->select(); 
        }
        $val = $value;
        foreach($word as $item){
            $count = mb_strlen($item['word'],'utf8');
            $val = str_replace($item['word'],str_repeat('*',$count),$val);   //将非法词汇，提出成星号*
        }
        return $val;
    }
}