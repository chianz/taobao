<?php
namespace Api\Controller;

use Think\Controller;

class IndexController extends CareController
{

    /*
     * 获取分类
     */
    public function get_clumn()
    {
        $list = D("shopcolumn")->select();
        $this->ajaxReturn($list);
    }

    /*
     * 添加商品的方法
     */
    public function addshop()
    {
        if ($_POST["id"] != null) {
            $id = $_POST["id"];
            unset($_POST["id"]);
            $this->ajaxReturn(D("shop")->where(array(
                "id" => $id
            ))
                ->save($_POST));
        } else {
            $this->ajaxReturn(D("shop")->add($_POST));
        }
    }

    /**
     * 获取商品
     */
    public function get_shop()
    {
        $this->ajaxReturn(D("shop")->where($_POST["where"])->limit(100)->select());
    }
}