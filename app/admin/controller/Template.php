<?php
namespace app\admin\controller;

class Template extends Base
{
    public function index()
    {
        $this->tpl->fetch('template-list');
    }
}