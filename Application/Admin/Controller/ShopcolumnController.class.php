<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/22
 * Time: 15:00
 */
namespace Admin\Controller;

use Think\Controller;
class ShopcolumnController extends CareController{
    public function index(){
        $list=D("Shopcolumn")->select();
        $this->assign("list",$list);
        $this->display();
    }
}