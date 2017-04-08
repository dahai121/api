<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
public function register(){
    if(IS_POST){
        $username = I('post.username');
        $password = I('post.password');
        $email = I('post.email');
        $salt = md5(time());
        //写入信息
        $data = array(
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'salt' => $salt,
        );
        $res = M('user')->add($data);
        if($res){
            //注册成功后发送邮件
            $content = <<<aa
感觉您注册我们的产品，<br />
请点击进行激活 <br />
<a href="http://www.api.com/Index.php/Home/User/jihuo/id/$res/salt/$salt">点击链接</a>进行邮箱激活
aa;

        $sendRs =  sendMail('激活邮件',$content,$email);
        if($sendRs === true){
            $this->success('注册成功,请到邮箱激活');
        }
        }else{
            $this->error('失败');
        }

    }else{
        $this->display();
    }
}

    public  function jihuo(){
        $id = I('get.id');
       $res =  M('user')->where("id='$id'")->setField('active',1);

        if($res){
            $this->success('激活成功');
        }else{
            $this->error('激活失败');
        }

    }

    public function login(){

        $this->display();

    }




}

