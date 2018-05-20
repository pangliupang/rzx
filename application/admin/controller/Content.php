<?php
namespace app\admin\controller;

use	think\Controller;
use think\Hook;
use think\Session;
use think\Db;
use	think\Request;

class Content extends Controller {
	//列表
	public function index() {
		$params = Session::get('username');
    	Hook::listen('CheckAuth',$params);
    	$list = db('article')->paginate(6);
        $page = $list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
		return $this->fetch();
	}
	public function toadd() {
		return $this->fetch('content/addContent');
	}
	public function addContent(Request $request) {
		$author = Session::get('username');
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$sort = $_POST['sort'];
		$tofrom = $_POST['tofrom'];
		$editorValue = $_POST['editorValue'];
		$file = $request->file('image');
		//	移动到框架应用根目录/public/uploads/	目录下								
		$info = $file->validate(['ext' => 'jpg,png,gif'])->move(ROOT_PATH .'public/static'.DS.'uploads');
		$image = $info->getSaveName();
		//exit($title.''.$editorValue);
		$time = time();
		$res = Db::name('article')->insert(['author' => $author, 'title' => $title, 'image' => $image, 'descript' => $desc, 'sort' => $sort, 'tofrom' => $tofrom, 'content' => $editorValue, 'createtime' => $time]);

    	
 		if($res) {
 			$this->success('新增成功', 'content/index');
 		} else {
 			//$this->ajaxReturn(json_encode($error),'JSON');
 			$this->success('新增失败');
 		}
	}
	public function toUpdate() {
		$id = $_GET['id'];
		$res = Db::name('article')->where('id', $id)->select();
		//var_dump($res);
		$this->assign('list', $res);
		return $this->fetch('content/updateContent');

	}
	public function updateContent(Request $request) {
		$id = $_POST['id'];
		$author = Session::get('username');
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$sort = $_POST['sort'];
		$tofrom = $_POST['tofrom'];
		$editorValue = $_POST['editorValue'];
		$time = time();
		$file = $request->file('image');
		//var_dump($file);
		if($file) {
			//	移动到框架应用根目录/public/uploads/	目录下								
			$info = $file->validate(['ext' => 'jpg,png,gif'])->move(ROOT_PATH .'public/static'.DS.'uploads');
			$image = $info->getSaveName();
			$res = Db::name('article')->where('id', $id)->update(['author' => $author, 'title' => $title, 'image' => $image, 'descript' => $desc, 'sort' => $sort, 'tofrom' => $tofrom, 'content' => $editorValue, 'createtime' => $time]);
		} else {
			//exit($title.''.$editorValue);
		
			$res = Db::name('article')->where('id', $id)->update(['author' => $author, 'title' => $title, 'descript' => $desc, 'sort' => $sort, 'tofrom' => $tofrom, 'content' => $editorValue, 'createtime' => $time]);
		}
    	
 		if($res) {
 			$this->success('更新成功', 'content/index');
 		} else {
 			//$this->ajaxReturn(json_encode($error),'JSON');
 			$this->success('更新失败');
 		}
	}
	public function delete() {
		$id = $_GET['id'];
    	$res = Db::name('article')->where('id', $id)->delete();
    	if($res) {
    		$this->success('删除成功', 'content/index');
    	} else {
    			$this->error('删除失败');
    	}
    	
    }

}