<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/22
 * Time: 12:14
 */

namespace Admin\Controller;

use Think\Controller;

class MenuController extends CareController
{
    public function index()
    {
        $list = D('menu')->order('sort asc')->select();
        $this->assign('list', $list);
        $this->display();
    }
}