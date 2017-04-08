<?php
namespace Api\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ApiController extends Controller{
	public function weather(){
		//url地址
		$url = 'http://api.map.baidu.com/telematics/v2/weather?location=%E5%8C%97%E4%BA%AC&ak=B8aced94da0b345579f481a1294c9094
';

	   $content = request($url,false);

	   $content = simplexml_load_string($content);

	   dump($content);
	}
	



}
