<?php
namespace app\admin\controller;

class Plugin extends Base
{
    public function index()
    {
        $this->tpl->fetch('plugin-list');
    }
}