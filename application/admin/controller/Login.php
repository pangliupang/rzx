<?php
namespace app\admin\controller;
use	think\Controller;
use think\Session;
use think\Db;

class Login extends Controller
{
    //跳转登录页面
    public function login() {
    	return $this->fetch();
    }
    //登录逻辑
    public function toLogin() {
    	$username = $_POST['username'];
    	$password = md5($_POST['password']);
    	//exit($username.' '.$password);
    	$where = array('username' => $username, 'password' => $password);
    	$res = Db::name('user')->where($where)->find();
        //var_dump($res);
    	if($res) {
			Session::set('username', $username);
            Session::set('id', $res['id']);
            $this->success('登录成功', 'index/index');
    	} else {
    		$this->error('登录失败');
    	}
    }
    //退出登录
    public function toLogout() {
        Session::delete('username');
        Session::delete('id');
        if(Session::get('id')) {
            $this->success('退出失败', 'index/index');
        } else {
            $this->success('退出登录成功', 'login/login');
        }
    }
    //修改密码
    public function updatePass() {
        $username = Session::get('username');
        $password1 = md5($_POST['password1']);
        $password2 = md5($_POST['password2']);
        //exit($username.' '.$password);
        $where = array('username' => $username, 'password' => $password1);
        var_dump($where);
        $res = Db::name('user')->where($where)->find();
        //var_dump($res);
        if($res) {
            Db::name('user')->where('id', $res['id'])->update(['password' => $password2]);
            $this->success('密码修改成功', 'index/index');
        } else {
            $this->error('密码修改失败', 'index/index');
        }
    }

}
