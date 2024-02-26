<?php
namespace app\admin\controller;

use misterxin\Loader;
use misterxin\Request;

class Template extends Base
{
    public function index()
    {
        $this->tpl->fetch('template-list');
    }

    public function setting($tplname='',$methodName='')
    {
        if(Request::getInstance()->isPost()){
            
            json(['code'=>1]);
        }
        $tplclass = 'template\\'.$tplname.'\\Setting';
        if(!class_exists($tplclass)){
            exit('此主题暂无自定义设置');
        }
        if(!$methodName){
            $methodName = 'index';
        }
        Loader::make($tplclass,$methodName);
    }
}