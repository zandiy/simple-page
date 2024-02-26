<?php

namespace app\admin\controller;

class Setting extends Base
{
    public function index()
    {
        $this->tpl->fetch('set-base');
    }
    public function user()
    {
        $this->tpl->fetch('set-user');
    }
    public function password()
    {
        $this->tpl->fetch('set-password');
    }
    
}