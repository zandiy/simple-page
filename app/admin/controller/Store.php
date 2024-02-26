<?php
namespace app\admin\controller;

class Store extends Base
{
    public function index()
    {
        $this->tpl->fetch('store-list');
    }
}