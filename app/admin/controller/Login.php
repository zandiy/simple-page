<?php
namespace app\admin\controller;

use misterxin\Captcha;

class Login extends Base
{
    public function index()
    {
        $this->tpl->assign(['title'=>'登录']);
        $this->tpl->fetch('login');
    }
    public function captcha()
    {
        $captcha = new Captcha(4);
        $captcha->img();
    }
}