<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/21
 * Time: 15:16
 */
namespace Admin\Controller;

use Think\Controller;

class CareController extends Controller
{

    public function _initialize()
    {
        $this->check_login();
        $this->get_allmean();
        $this->get_nowmean();
    }
//    公用参数声明
    protected $selectmodel = CONTROLLER_NAME; //查询时候的对象
    protected $addmodel = CONTROLLER_NAME; //添加时候的对象
    protected $orderby = "id desc";//排序

//    判断是否登录
    public function check_login()
    {
        if ($_SESSION["admin"] == null) {
            $this->redirect("Index/login");
        }
    }

//这个是设置条件
    public function setwhere(&$where)
    {
        foreach ($_GET as $key => $v) {
            $this->assign($key, $v);
        }
    }

//列表
    public function index()
    {
        $User = D($this->selectmodel); // 实例化User对象
        import('@.Util.Page'); // 导入分页类
        $where = array();
        $this->setwhere($where);
        $count = $User->where($where)->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 25); // 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('theme', "%upPage% %linkPage% %downPage%");
        $show = $Page->show(); // 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where($where)->order($this->orderby)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        // echo D()->getLastSql();
        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->display("index"); // 输出模板
    }

//    详细页面的时候
    public function one()
    {
        $db = D($this->addmodel);
        if ($_GET["id"] != null) {
            $this->assign("one", $db->where(array("id" => $_GET["id"]))->find());
        }
        $this->display("one");
    }

//    更新数据
    public function update()
    {
        $temp = null;
        $db = D($this->addmodel);
        $id = $_POST["id"];
        unset($_POST["id"]);
        if ($id != null) {
            if ($db->where(array("id" => $id))->save($_POST) > 0) {
                $this->redirect("index");
            } else {
                echo "操作失败";
            }
        } else {
            if ($db->add($_POST) > 0) {
                $this->redirect("index");
            } else {
                echo "操作失败";
            }
        }
    }

//    删除数据
    public function del()
    {
        $db = D($this->addmodel);
        if ($db->where(array("id" => $_GET["id"]))->delete() > 0) {
            $this->redirect("index");
        } else {
            $this->error("操作失败");
        }
    }
    //    删除数据
    public function del_hide()
    {
        $db = D($this->addmodel);
        $data["is_del"] = 1;
        if ($db->where(array("id"=>$_GET["id"]))->save($data) > 0) {
            $this->redirect("index");
        } else {
            $this->error("操作失败");
        }
    }

    //    上传图片的方法
    public function upload_img()
    {
        $picname = $_FILES['mypic']['name'];
        $picsize = $_FILES['mypic']['size'];
        if ($picname != "") {
            if ($picsize > 10024000) {
                echo '图片大小不能超过10M';
                exit;
            }
            $type = strstr($picname, '.');
            if ($type != ".gif" && $type != ".jpg" && $type != ".png" && $type != ".jpeg") {
                echo '图片格式不对！';
                exit;
            }
            $rand = rand(100, 999);
            $pics = date("YmdHis") . $rand . $type;
            
            //根据时间创建目录
            if(!is_dir("./Public/upload/".date("Y"))){
                mkdir("./Public/upload/".date("Y"));
            }
            if(!is_dir("./Public/upload/".date("Y")."/".date("m")))
            {
                mkdir("./Public/upload/".date("Y")."/".date("m"));
            }
            
            //上传路径
            $pic_path = "./Public/upload/".date("Y")."/".date("m") ."/". $pics;
            move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
            
        }
        $size = round($picsize / 1024, 2);
        $arr = array(
            'name' => "/Public/upload/".date("Y")."/".date("m") ."/". $pics,
            'pic' => $pics,
            'size' => $size
        );
        echo json_encode($arr);
    }

//    获取所有的菜单
    public function get_allmean()
    {
        $this->assign("allmean", D("menu")->where(array("is_show" => 1))->order("sort asc")->select());
    }

//    获取当前的菜单
    public function get_nowmean()
    {
        $this->assign("function", ACTION_NAME);
        $this->assign("controller",CONTROLLER_NAME);
        $now = D("menu")->where(array("controller" => CONTROLLER_NAME))->find();
        if ($now["sid"] == 0) {
        } else {
            $now = D("menu")->where(array("id" => $now["sid"]))->find();
        }
        $this->assign("now", $now);
    }
    //显示
    public function show(){
        D($this->addmodel)->where(array("id"=>I("get.id")))->save(array("is_show"=>1));
        $this->redirect("index");
    }
    //隐藏
    public function hide(){
        D($this->addmodel)->where(array("id"=>I("get.id")))->save(array("is_show"=>0));
        $this->redirect("index");
    }
    
}