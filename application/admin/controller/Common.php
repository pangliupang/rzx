<?php
namespace app\admin\controller;
use	think\Controller;
use	think\Session;
use think\Db;

class Common extends Controller
{
    public function header()
    {
        return $this->fetch();
    }
    public function footer()
    {
        return $this->fetch();
    }
}
