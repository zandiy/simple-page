<?php
namespace app\index\controller;

use think\Template;

class Index
{
    public function index()
    {
        $tpl = new Template(config('template'));
        $tpl->fetch('index');
    }
}