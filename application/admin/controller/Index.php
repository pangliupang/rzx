<?php
namespace app\admin\controller;
use	think\Controller;
use think\Hook;
use think\Session;
use think\Db;

class Index extends Controller
{
    public function index()
    {
    	$params = Session::get('username');
    	Hook::listen('CheckAuth',$params);
        return $this->fetch();
    }
}
