<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CareController {
    public function index(){
        $User = D("Shop"); // 实例化User对象
        import('@.Util.Page'); // 导入分页类
        $where = array();        
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
}