<?php
namespace template\shihua;

use think\Template;

class Setting
{
    protected $tpl = null;
    public function __construct(Template $template)
    {
        $this->tpl = $template->config(config('template'));
    }
    public function index()
    {
        $this->tpl->fetch('setting');
    }
    public function othor()
    {
        $this->tpl->fetch('othor');
    }
}