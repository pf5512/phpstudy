<?php

/**
 * 模块：WAP
 * @copyright (C)2011 Cenwor Inc.
 * @author Moyo <dev@uuland.org>
 * @package module
 * @name wap.mod.php
 * @version 1.0
 */

class ModuleObject extends MasterObject
{
    function ModuleObject( $config )
    {
        $this->MasterObject($config);
        $runCode = Load::moduleCode($this);
        $this->$runCode();
    }
    function Main()
    {
        include handler('template')->file('@wap/index');
    }
	
    public function account_login()
	{
		include handler('template')->file('@wap/account_login');
	}
	
	public function account_logcheck()
	{
		$username = post('username', 'txt');
		$password = post('password', 'txt');
		$loginR = account()->Login($username, $password, true); 		if ($loginR['error'])
		{
			$errmsg = $loginR['result'];
			include handler('template')->file('@wap/account_login');
		}
		else
		{
			$ref = account()->loginReferer();
			$ref || $ref = rewrite('index.php?mod=wap');
			header('Location: '.$ref);
		}
	}
	
	public function account_logout()
	{
		account()->Logout(MEMBER_NAME);
		header('Location: '.rewrite('index.php?mod=wap'));
	}
	
	public function coupon_input()
	{
		$msgcode = get('msgcode', 'chars');
		$number = get('number') ? get('number', 'number') : '';
		$password = get('password') ? get('password', 'number') : '';
		if ($msgcode)
		{
			$mmaps = array(
				'ops-success' => '验证消费成功！',
				'input-blank' => '请输入号码和密码！',
				'not-found' => TUANGOU_STR . '券输入无效！',
				'access-denied' => '此券不是您的产品！',
				'password-wrong' => TUANGOU_STR . '券密码错误！',
				'be-used' => '此券已经被使用了！',
				'be-overdue' => '此券已经过期了！',
				'be-invalid' => '此券已经失效了！'
			);
			$msg = isset($mmaps[$msgcode]) ? $mmaps[$msgcode] : '未知错误';
			if ($msgcode == 'ops-success')
			{
				$product = logic('coupon')->ProductGet(get('last', 'number'));
			}
		}
		include handler('template')->file('@wap/coupon_input');
	}
	
	public function coupon_verify()
	{
		$number = post('number') ? post('number', 'number') : '';
		$password = post('password') ? post('password', 'number') : '';
		if ($number && $password)
		{
			$result = logic('coupon')->MakeUsed($number, $password);
			if ($result['error'])
			{
				$this->coupon_input_msg($result['errcode'], $number, $password);
			}
			else
			{
				$this->coupon_input_msg('ops-success', '', '', $number);
			}
		}
		else
		{
			$this->coupon_input_msg('input-blank', $number, $password);
		}
	}
	
	private function coupon_input_msg($msgcode, $number = '', $password = '', $last = '')
	{
		$url = rewrite('index.php?mod=wap&code=coupon&op=input&msgcode='.$msgcode.'&number='.$number.'&password='.$password.'&last='.$last);
		header('Location: '.$url);
	}

	public function get_password() {
		if(MEMBER_ID > 0) {
			$this->msg('您已经登录了');
		}

		$is_android = stripos($_SERVER['HTTP_USER_AGENT'], 'android');
		
		$act = ($_GET['act'] ? $_GET['act'] : $_POST['act']);

		if('step2' == $act) {
			$username = post('username');
			if(empty($username)) {
				$this->msg('用户名不能为空', -1);
			}
			$username = account()->username($username);
			$user = dbc(DBCMax)->select("members")->where(array('username' => $username))->limit(1)->done();
			if(false == $user) {
				$this->msg('用户已经不存在了', -1);
			}
			$uid = $user['uid'];
			if(empty($user['phone']) || false == $user['phone_validate']) {
				$this->msg('该用户没有设置手机或该号码还没有通过验证，不能通过手机方式找回密码');
			}
			$phone = substr($user['phone'], 0, 3) . '****' . substr($user['phone'], -4);
			$ret = logic('phone')->VfSend($user['phone'], $uid);
			if($ret) {
				$this->msg($ret);
			}
		} elseif ('step3' == $act) {
			$uid = post('uid', 'int');
			if($uid < 1) {
				$this->msg('请指定一个用户UID');
			}
			$user = user($uid)->get();
			if(false == $user) {
				$this->msg('用户已经不存在了');
			}
			$vfcode = post('vfcode');
			if(empty($vfcode)) {
				$this->msg('手机验证码不能为空', -1);
			}
			if('' == $this->Post['password'])
			{
				$this->msg('新密码不能为空', -1);
			}			
			if($this->Post['password']!=$this->Post['confirm'])
			{
				$this->msg('两次输入的密码不一致', -1);
			}
			$ret = logic('phone')->Vfcode($user['phone'], $vfcode, $uid);
			if($ret) {
				$this->msg($ret, -1);
			}
			
			if($user['email2']=='zuitu'){
				$password=md5($this->Post['password'].'@4!@#$%@');
			}else{
				$password=md5($this->Post['password']);
			}
			$sql="UPDATE ".TABLE_PREFIX. 'system_members'." SET `password`='{$password}' WHERE uid='$uid'";
			$this->DatabaseHandler->Query($sql);
			$sql="UPDATE ".TABLE_PREFIX.'system_memberfields'." SET `authstr`='',`auth_try_times`='0' WHERE uid='$uid'";
			$this->DatabaseHandler->Query($sql);

						if ( true === UCENTER )
			{
				include_once (UC_CLIENT_ROOT . './client.php');
				$result = uc_user_edit($user['username'], '', $this->Post['password'], '', 1);
				if($result ==0 || $result ==1)
				{
					;
				}
				elseif($result ==-8)
				{
					$this->msg('您的帐号在UC里是管理员，请到UC里修改密码！');
				}
				else
				{
					$this->msg('通知UC修改密码失败，请检查你的UC配置！');
				}
			}

			$this->msg("新密码设置成功");
		}

		include handler('template')->file('@wap/get_password');
	}

	public function msg($msg, $to = '', $time = 1) {
		include handler('template')->file('@wap/msg');
		exit;
	}
}

?>