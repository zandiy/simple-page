<?php
namespace app\admin\controller;

class Index extends Base
{
    public function index()
    {
        $this->tpl->fetch('index');
    }

    public function welcome()
    {
        $this->tpl->fetch('welcome');
    }

    public function menu()
    {
        $homeInfo = [
            'title'=>'首页',
            'href'=>'index/welcome?t=1'
        ];
        $logoInfo = [
            'title'=>'单页管理',
            'image'=>'',
            'href' =>''
        ];
        $menu = [
            ['控制台','dashboard','index/welcome',[]],
            ['站点设置','gear','setting',[]],
            ['模板管理','laptop','template',[]],
            ['插件管理','plug','plugin',[]],
            ['在线拓展','cloud-download','store','',[]],
        ];
        $menuInfo = [
            'title'=>'常规管理',
            'icon'=>'fa-address-book',
            'href' =>'',
            'target'=> "_self",
            'child'=>$this->initMenu($menu)
        ];
        $menuInit = [
            'homeInfo'=>$homeInfo,
            'logoInfo'=>$logoInfo,
            'menuInfo'=>[$menuInfo],
        ];
        // echo json_encode($menuInit,JSON_UNESCAPED_UNICODE);
        json($menuInit);
    }

    protected function initMenu($menu)
    {
        $list = [];
        foreach($menu as $k=>$v){
            $list[$k]['title'] = $v[0];
            $list[$k]['icon'] = 'fa fa-'.$v[1];
            $list[$k]['href'] = $v[2];
            $list[$k]['target'] = '_self';
            if($v[3]){
                $list[$k]['child'] = $this->initMenu($v[3]);
            }else{
                $list[$k]['child'] = $v[3];
            }
        }
        return $list;
    }

}