<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    public function listNav(){
        $Navigator = M('Navigator');
        $zock = $Navigator->where()->order('weight')->select();
        $data['status'] = 1;
        $data['content'] = $zock;
        $this -> ajaxReturn($data);
    }
    public function listEve(){
        $Event = M('Event');
        $zock = $Event->where()->order('etime desc')->select();
        $data['status'] = 1;
        $data['content'] = $zock;
        $this -> ajaxReturn($data);
    }
    public function listNot(){
        $Notice = M('Notice');
        $zock = $Notice->where()->order('create_time desc')->select();
        $data['status'] = 1;
        $data['content'] = $zock;
        $this -> ajaxReturn($data);
    }
    public function showNot(){
        $Notice = M('Notice');
        $zock = $Notice->where()->order('create_time desc')->limit(1)->select();
        $data['status'] = 1;
        $data['content'] = $zock;
        $this -> ajaxReturn($data);
    }
}