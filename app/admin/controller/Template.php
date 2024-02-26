<?php
namespace app\admin\controller;

use misterxin\Loader;
use misterxin\Request;

class Template extends Base
{
    public function index()
    {

        $dir = get_path('template'); // 替换为你的文件夹路径

        $directories = [];
        foreach (scandir($dir) as $entry) {
            if ($entry == '.' || $entry == '..') continue;
            $entryPath = $dir . '/' . $entry;
            if (is_dir($entryPath) && is_file($entryPath.'/config.php')) {
                $tplconfig  =   include_once($entryPath.'/config.php');
                $tplconfig['setting'] = 0;
                if(class_exists('template\\'.$entry.'\\Setting')) $tplconfig['setting'] = 1;
                if($tplconfig['id'] == config('app.tpl')){
                    $on = $tplconfig;
                    continue;
                }
                $directories[$entry] = $tplconfig;
                
            }
        }
        $this->tpl->assign(['on'=>$on,'views'=>$directories]);

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