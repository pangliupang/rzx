<?php
namespace app\admin\controller;

use	think\Controller;
use think\Hook;
use think\Session;
use think\Db;

class User extends Controller
{
    public function index()
    {
    	$params = Session::get('username');
    	Hook::listen('CheckAuth',$params);
    	$list = db('user')->paginate(5);
        $page = $list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }
    //新增用户
    public function register() {
    	$username = $_POST['username'];
    	$password = md5($_POST['password']);
    	$time = time();
    	//var_dump($username.' '.$password);
    	$res = Db::name('user')->insert(['username' => $username, 'password' => $password, 'createtime' => $time]);
    	if($res) {
    		$this->success('新增成功', 'user/index');
    	} else {
    		$this->error('新增失败');
    	}
    }
    //gengxin
   	public function update() {
   		if(Session::get('username') == 'admin') {
   			$id = $_POST['id'];
    		$username = $_POST['username'];
    		$password = md5($_POST['password']);
    		$time = time();
    		//exit($id.' '.$username);
    		$res = Db::name('user')->where('id', $id)->update(['username' => $username, 'password' => $password, 'createtime' => $time]);
    		if($res) {
    			$this->success('修改成功', 'user/index');
    		} else {
    			$this->error('修改失败');
    		}
   		} else {
   			$this->success('修改失败，没有权限', 'user/index');
   		}
    	
    }
    //删除
    public function delete() {
    	if(Session::get('username') == 'admin') {
			$id = $_GET['id'];
    		$res = Db::name('user')->where('id', $id)->delete();
    		if($res) {
    			$this->success('删除成功', 'user/index');
    		} else {
    			$this->error('删除失败');
    		}
    	} else {
   			$this->success('删除失败，没有权限', 'user/index');
   		}
    	
    }


}
