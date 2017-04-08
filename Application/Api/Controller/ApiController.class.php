<?php
namespace Api\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ApiController extends Controller{
	//天气预报
	public function weather(){
		//1.url地址调用天气预报接口
		$url = 'http://api.map.baidu.com/telematics/v2/weather?location=%E5%8C%97%E4%BA%AC&ak=B8aced94da0b345579f481a1294c9094';
		//2. 判断请求方式
		//3.发送请求
	   $content = request($url,false);
	   //4.处理返回的数据
	   $content = simplexml_load_string($content);//将xml数据转换为对象
		// dump($content);
	   $todayWeather = $content->results->result[0];
	   echo '实时温度为：'.$todayWeather->date.'<br />';
	   echo '天气情况为：'.$todayWeather->weather.'<br/>';
	}

	//获取电话号码归属地
	public function getAreaByPhone(){
		$phone = I('get.phone');
		//1.url
		$url = "http://cx.shouji.360.cn/phonearea.php?number=$phone";
		//2.判断请求方式
		//3.发送请求
		$content = request($url,false);
		//4.处理返回值
		$content = json_decode($content);//json转对象
		echo '查询号码省份：'.$content->data->province."<br />";
		echo '查询号码省份：'.$content->data->city."<br />";
		echo '查询号码省份：'.$content->data->sp."<br />";
	}

	//快递查询
	public  function express(){
		$type = 'yuantong';
		$postid = 'DD1276021655';
		$url = "http://www.kuaidi100.com/query?type=".$type."&postid=".$postid;
		$content = request($url);
		$content = json_decode($content);
		$data = $content->data;
		// dump($data);
		foreach ($data as $key => $value) {

			echo $value->time.'#######'.$value->context.'<br />';
		}

	}
	
	//发送邮件
	public function send(){
		$res = sendmail('aa','PHP发送','huigechao@163.com');
		if($res === true ){
			echo "1";
		}else{
			echo "2";
		}
	}	



}
