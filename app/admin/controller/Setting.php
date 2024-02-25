<?php

namespace app\admin\controller;

class Setting extends Base
{
    public function base()
    {
        $this->tpl->fetch('set-base');
    }

}