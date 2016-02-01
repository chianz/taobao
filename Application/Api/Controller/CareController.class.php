<?php
namespace Api\Controller;

use Think\Controller;

class CareController extends Controller
{

    public function _initialize()
    {
        if (cookie("key")==null)
        {
            $key="23123dsgsdfgdsf";
            if (! $key == $_POST["key"]) {
                echo "key错误";
                exit();
            }else{
                unset($_POST["key"]);
                cookie("key",$_POST["key"]);
            }
        }
        
    }
}