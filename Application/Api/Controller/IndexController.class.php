<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    
    public function index(){
        echo "1234";
    }

    //创建json
    public function createjson(){
        //定义一个数组
        $personArray = array(
            'name' => 'tom',
            'age' => 18,
            'job' => 'PHP',
        );
        //使用josn_encode（）
        $psersongJson = json_encode($personArray);
        dump($psersongJson);
    }
    //解析json
    public function readJson(){
        $personJson = '{"name":"tom","age":18,"job":"PHP"}';
        $a = json_decode($personJson);
        dump($a);
        dump($a->name);

        $b = json_decode($personJson,true);
        dump($b);
        dump($b['name']);

    }

    //生产XML
    public function createXML(){
        //xml
        
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= '<person>';
        $xml .= '<name>tom</name>';
        $xml .= '<age>18</age>';
        $xml .= '<job>PHP</job>';
        $xml .= '</person>';
      //    $xml .= '<person>';
      // $xml .='<name>tom</name>';
      // $xml .='<age>18</age>';
      // $xml .='<job>php</job>';
      // $xml .= '</person>';
        //保存xml
        echo file_put_contents('./data.xml', $xml);
      // echo   file_put_contents('./data.xml', $xml);

    }
    //解析XML
    public function readXML(){

        // $xmldata = file_get_contents('./data.xml');
        $xmldata = file_get_contents('./data.xml');
        // $xmlObj = simplexml_load_string($xmldata);
        $xmlobj = simplexml_load_string($xmldata);
        dump($xmlobj);
        echo $xmlobj->name;

    }


    public function test(){
        $url = 'https://www.baidu.com/';
        $content = request($url);
        echo file_put_contents('./badu.html',$content);
    }

    public function testDB(){
        echo "12";
        //实例化模型
     M('user')->select();




    }



}