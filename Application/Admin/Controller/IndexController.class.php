<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     * 加载首页
     */
   public function index(){
       if(session("admin")!=null){
        $a=new CareController();
        $a->get_allmean();
        $this->display();
       }else{
           $this->redirect("login");
       }
   }

    /**
     * 加载登录
     */
    public function login(){
        if(session("admin")!=null){
            $this->redirect("index");
        }else{
            $this->display();
        }
    }

    /**
     * 登录的方法
     */
    public function check_login(){
        $data["username"]=I("post.username");
        $data["userpwd"]=I("post.userpwd","","md5");
        $one=D("admin")->where($data)->find();
        echo D()->getLastSql();
        if($one!=null)
        {
            session("admin",$one);
        }
       $this->redirect("index");
    }
    /***
     * 退出登录
     */
    public function loginout(){
        session("admin",null);
        $this->redirect("index");
    }
}