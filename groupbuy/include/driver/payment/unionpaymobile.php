<?php

/**
 * 支付方式：中国银联移动支付
 * @copyright (C)2011 Cenwor Inc.
 * @author Moyo <dev@uuland.org>
 * @package payment
 * @name unionpaymobile.php
 * @version 1.0
 */

class unionpaymobilePaymentDriver extends PaymentDriver
{
	
    public function inner_disabled()
    {
        return WEB_BASE_ENV_DFS::$APPNAME == 'index';
    }
				private $trade_url = 'https://mgate.unionpay.com/gateway/merchant/trade';//此地址为生产环境下交易地址
	private $query_url = 'https://mgate.unionpay.com/gateway/merchant/query';//此地址为生产环境下查询地址
	
	public function CreateLink($payment, $parameter)
	{
		$parameter['trade_url'] = $this->trade_url;
		if(!$parameter['time']){			$order = logic('order')->GetOne($parameter['sign']);
			$parameter['time'] = $order['buytime'];
		}
		$validResp = $this->trade($payment, $parameter, $resp);
		if($validResp && $resp['tn']){
			return $resp['tn'];		}
	}
	
	public function StreamVerify($order, $stream)
    {
		$payment = logic('pay')->GetOne($order['paytype']);
		$parameter = array(
			'query_url' => $this->query_url,
			'time' => $order['buytime'],
			'sign' => $order['orderid']
		);
		$validResp = $this->query($payment, $parameter, $resp);
		if($validResp){
			return 'TRADE_OK';
		}else{
			return 'TRADE_ERROR';
		}
	}
	
	public function CreateConfirmLink($payment, $order)
	{
		return '?mod=buy&code=tradeconfirm&id='.$order['orderid'];
	}
	
	public function CallbackVerify($payment)
	{
		$this->__create_logfile();
		$order = logic('order')->GetOne($_POST['orderNumber']);
		if($order && $order['paytype'] == $payment['id']){
			if($_POST['transStatus'] == '00' && $this->verifySignature($_POST,$payment)){			
				if($order['product']['type'] == 'ticket'){
					return 'TRADE_FINISHED';
				}else{
					return 'WAIT_SELLER_SEND_GOODS';
				}
			}else{
				return 'VERIFY_FAILED';
			}
		}else{
			return 'VERIFY_FAILED';
		}
	}
	
	public function GetTradeData()
	{
		$order = logic('order')->GetOne($_POST['orderNumber']);
		$trade = array();
        $trade['sign'] = $_POST['orderNumber'];
        $trade['trade_no'] = $_POST['qn'];
        $trade['price'] = $_POST['settleAmount'];
        $trade['money'] = $trade['price'];
        $trade['status'] = ($order['product']['type'] == 'ticket') ? 'TRADE_FINISHED' : 'WAIT_SELLER_SEND_GOODS';
        return $trade;
	}
	
	public function StatusProcesser($status)
	{
		if ($status != 'VERIFY_FAILED')
        {
            echo 'success';
        }
        else
        {
            echo 'fail';
        }
        return true;
	}
	
	public function GoodSender($payment, $express, $sign, $type)
	{
		if ($type == 'ticket')
        {
            logic('callback')->Bridge($sign)->Processed($sign, 'TRADE_FINISHED');
        }
        else
        {
            logic('callback')->Bridge($sign)->Processed($sign, 'WAIT_BUYER_CONFIRM_GOODS');
        }
	}

		private function trade($payment, $parameter, &$resp) {
		$nvp = $this->buildReq($payment, $parameter, 'trade');
    	$respString = $this->post($parameter['trade_url'], $nvp);
    	return $this->verifyResponse($payment, $respString, $resp);
    }

		private function query($payment, $parameter, &$resp) {
    	$nvp = $this->buildReq($payment, $parameter, 'query');
    	$respString = $this->post($parameter['query_url'], $nvp);
    	return $this->verifyResponse($payment, $respString, $resp);
    }
	
	
	private function buildReq($payment, $parameter, $type = 'trade')
	{
		$post_para = $this->getpostdata($payment, $parameter, $type);
		$filteredReq = $this->paraFilter($post_para);
		$signature = $this->buildSignature($filteredReq,$payment);
		$filteredReq['signature'] = $signature;
    	$filteredReq['signMethod'] = 'MD5';    	
    	return $this->createLinkstring($filteredReq, false, true);
	}

		private function post($url, $content = null)
	{
		if(function_exists("curl_init")){
			$curl = curl_init();
			if(is_array($content)){
				$data = http_build_query($content);
			}
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_TIMEOUT, 60);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			$ret_data = curl_exec($curl);
			$ret_erro = curl_errno($curl);
			curl_close($curl);
			if(!$ret_erro){
				return $ret_data;
			}
		}
	}

		private function verifyResponse($payment, $respString, &$resp) {
    	if($respString != ""){
    		parse_str($respString, $para);
    		$signIsValid = $this->verifySignature($para,$payment);
    		$resp = $para;
    		if ($signIsValid) {
    			return true;
    		}else {
    			return false;
    		}
    	}
    }

	
	private function verifySignature($para,$payment) {
    	$respSignature = $para['signature'];
    	$filteredReq = $this->paraFilter($para);
    	$signature = $this->buildSignature($filteredReq,$payment);
    	if ("" != $respSignature && $respSignature==$signature) {
    		return true;
    	}else {
    		return false;
    	}
    }

	private function getpostdata($payment, $parameter, $type = 'trade')
	{
		$data = array(
			'trade'=>
				array(
					'version' => '1.0.0',
					'charset' => strtoupper(ini('settings.charset')),
					'transType' => '01',
					'merId' => $payment['config']['merchantid'],
					'backEndUrl' => ini('settings.site_url').'/unionnotify.php',
					'frontEndUrl' => $parameter['notify_url'],
					'orderDescription' => $parameter['name'],
					'orderTime' => date("YmdHis",$parameter['time']),
					'orderNumber' => $parameter['sign'],
					'orderAmount' => $parameter['price'] * 100,					'orderCurrency' => '156'
				),
			'query'=>
				array(
					'version' => '1.0.0',
					'charset' => strtoupper(ini('settings.charset')),
					'transType' => '01',
					'merId' => $payment['config']['merchantid'],
					'orderTime' => date("YmdHis",$parameter['time']),
					'orderNumber' => $parameter['sign']
				)
		);
		return $data[$type];
	}

	private function paraFilter($para)
	{
		$result = array ();
		while(list($key,$value) = each($para))
		{
			if ($key == 'signature' || $key == 'signMethod' || $key == 'mod' || $value == "pid" || $value == ""){
				continue;
			} else {
				$result[$key] = $para[$key];
			}
		}
		return $result;
	}
	private function buildSignature($req,$payment)
	{
		$prestr = $this->createLinkstring($req, true, false);
		$prestr = $prestr.'&'.md5($payment['config']['password']);
		return md5($prestr);
	}
	private function createLinkString($para, $sort, $encode)
	{
		$linkString = "";
		if($sort){
			$para = $this->argSort($para);
		}
		while(list($key,$value) = each($para))
		{
			if($encode){
				$value = urlencode($value);
			}
			$linkString.=$key.'='.$value.'&';
		}
		$linkString = substr($linkString,0,count($linkString)-2);
		return $linkString;
	}
	private function argSort($para)
	{
		ksort($para);
		reset($para);
		return $para;
	}
		private function __create_logfile(){
		$filename = DATA_PATH.'unionmobilepaylog/'.date('YmdHis').'.txt';
		$output = date('Y-m-d H:i:s')."\r\n";
		unset($_POST['mod']);
		$post = var_export($_POST, true);
		$output .= $post."\r\n";
		file_put_contents($filename, $output);
	}
}
?>