<?php
namespace Admin\Controller;
use Think\Controller;
class AdController extends CareController{
    /**
     * 对应广告分类
     */
    public function flist(){
        $this->assign('ad',D('ad')->where(array("id"=>I("get.id")))->find());
        $this->assign('list',D('adbody')->where(array('a_id'=>I('get.id')))->order("sort desc")->select());
        $this->display("flist");
    }
    /**
     * 广告详细
     */
    public function fone(){
        $this->assign("ad",D('ad')->where(array("id"=>I("get.aid")))->find());
        $this->assign("one",D('adbody')->where(array('id'=>I('get.id')))->find());
        $this->display();
    }
    /**
     * 广告添加修改
     */
    public function fupdate(){
        $temp = null;
        $db = D("adbody");
        $id = $_POST["id"];
        unset($_POST["id"]);
        if ($id != null) {
            if ($db->where(array("id" => $id))->save($_POST) > 0) {
               $this->redirect("flist?id=".I("post.ad_id"));
            } else {
                echo "操作失败";
            }
        } else {
            if ($db->add($_POST) > 0) {
                $this->redirect("flist?id=".I("post.ad_id"));
            } else {
                echo "操作失败";
            }
        }
        
    }

    /**
     * 删除广告的方法
     */
    public function fdel()
    {
        $db = D($this->addmodel);
        if ($db->where(array(
            "id" => $_GET["id"]
        ))->delete() > 0) {
            $this->redirect("flist?id=".I("get.ad_id"));
        } else {
            $this->error("操作失败");
        }
    }
    
}
