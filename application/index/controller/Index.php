<?php
namespace app\index\controller;
use	think\Controller;
use think\Db;

class Index extends Controller
{
    public function index() {
        return $this->fetch();
    }
    public function webjianse() {
        return $this->fetch();
    }
    public function weixinkaifa() {
        return $this->fetch();
    }
    public function moban01() {
        return $this->fetch();
    }
    public function moban02() {
        return $this->fetch();
    }
    public function moban03() {
        return $this->fetch();
    }
    public function moban04() {
        return $this->fetch();
    }

    public function news() {
        $sort = $_GET['sort'];
        $list = Db('article')->where('sort', $sort)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function case02() {
        return $this->fetch();
    }
    public function case03() {
        return $this->fetch();
    }
    public function case04() {
        return $this->fetch();
    }
    public function aboutus() {
        return $this->fetch();
    }
    public function news_wangzhan() {
        $id = $_GET['id'];
        $res = Db('article')->where('id', $id)->select();
        $this->assign('list',$res);
        //var_dump($res);
        $front = Db('article')->where('id', '<', $id)->order('id desc')->limit(1)->select();
        //var_dump($front);
        
        $after = Db('article')->where('id', '>', $id)->order('id asc')->limit(1)->select();
        //var_dump($after);

        $this->assign('front',$front);

        $this->assign('after',$after);
        

        /*$front=Db('article')->where("id", '<', $id)->order('id desc')->limit(1)->select();  
        if(!$front) {
            $this->assign('front','<a href="#">上一篇：没有了</a>');  
        } else {
            $this->assign('front','<a href="news_wangzhan?id="'.$front['id'].'>上一篇：网站建设的把控点</a>');  
        }

        //下一篇  

        $after=Db('article')->where("id", '>', $id)->order('id desc')->limit(1)->select();  


        if(!$after) {
            $this->assign('front','<a href="#">下一篇：没有了</a>');  
        } else {
            $this->assign('front','<a href="news_wangzhan?id="'.$front['id'].'>下一篇：网站建设的把控点</a>'); 
        }*/
        return $this->fetch();
    }

}
