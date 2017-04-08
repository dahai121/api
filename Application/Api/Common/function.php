<?php 
////Api
//function request($url,$https=true,$method='get',$data=null){
//	//1.初始化URL
//	$ch = curl_init($url);
//	//2.设置请求参数
//	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//	//判断是否为https
//	if($https === true){
//		//绕过证书验证
//		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
//	}
//	//判断post请求
//	if($method === 'post'){
//		curl_setopt($ch,CURLOPT_POST,ture);
//		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
//	}
//	//
//	$content = curl_exec($ch);
//	//
//	curl_close($ch);
//	return $content;
//}







