<?php
namespace app\admin\controller;

use think\Template;

class Base
{
    protected $tpl = null;

    public function __construct(Template $template)
    {
        //加载模板公共文件
        $commonfile = get_path('template') . config('app.tpl') . DIRECTORY_SEPARATOR . 'common.php';
        if(is_file($commonfile)) require_once($commonfile);
        //配置模板
        $tplconfig = config('template');
        $tplconfig['view_path'] = realpath(__DIR__.'/../view').DIRECTORY_SEPARATOR;
        $tplconfig['tpl_replace_string']['__LAYMINI__']='/static/layuimini';
        $template->config($tplconfig);
        $this->tpl = $template;
    }

    protected function _view($method)
    {
        
        // return strtolower(end(explode('/',$method)));
        // return str_replace('::','/',strtolower(end(explode('\\',$method))));
    }

    // public function __call($name, $arguments)
    // {
    //     $this->tpl->fetch($name);
    // }
}