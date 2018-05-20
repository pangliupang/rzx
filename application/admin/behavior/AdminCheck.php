<?php
namespace app\admin\behavior;

use think\Controller;

/**
* 判断Admin登录状态
*/
class AdminCheck 
{
    use \traits\controller\Jump;//类里面引入jump;类

    //绑定到CheckAuth标签，可以用于检测Session以用来判断用户是否登录
    public function run(&$data){

        if(!$data){
            return $this->success('未登录，请登录！','login/login');
        }
        
    }
}