<?php
namespace Home\Controller;

use Think\Controller;

class CareController extends Controller
{

    public function _initialize()
    {
        $this->assign("webset",D("webset")->where(array("id"=>1))->find());
        
    }
}