<?php
namespace app\admin\controller;

class Index extends Base
{
    public function index()
    {
        $this->tpl->fetch('index');
    }
}