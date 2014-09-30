<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(!isset($_SESSION['myzjut']) || $_SESSION['myzjut'] == ''){
            $this->display("login");
        }elseif (session('myzjut') == 'HJK') {
            $this->display("admin");
        }
    }
    //检查登陆
    public function checkLogin(){
        $login["username"] = $_POST["username"];
        $login["pwd"] = $_POST["password"];
        $User = M("User")-> where($login) ->select();
        if($User && !$user['lock']){
            session("myzjut", "HJK");
            // $this -> redirect("Admin");
            $this->success("登陆成功","http://localhost/JoyNet/admin");
            // $data['status'] = 1;
            // $this -> ajaxReturn($data);
        }else{
            $this->error('登陆失败');
            // $data['status'] = 2;
            // $this -> ajaxReturn($data);
        }
    }
    public function loginOrNot(){
        if (session("myzjut")!="HJK") {
            $data['status'] = 3;
            $this -> ajaxReturn($data);die;
        }
    }
    //关于导航的操作
    public function addNav(){
        $this->loginOrNot();
        $newNav["naname"] = $_POST["naname"];
        $newNav["destination_url"] = $_POST["destination_url"];
        $newNav["weight"] = $_POST["weight"];
        $Navigator = M('Navigator');
        $Navigator -> data($newNav) -> add();
        $zock = $Navigator -> where($newNav) ->select();
        if($zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }
    public function chgNav(){
        $this->loginOrNot();
        $chgNav["naid"] = $_POST["naid"];
        $chgNav["naname"] = $_POST["naname"];
        $chgNav["destination_url"] = $_POST["destination_url"];
        $chgNav["weight"] = $_POST["weight"];
        $Navigator = M('Navigator');
        $Navigator -> save($chgNav);
        $zock = $Navigator -> where($chgNav) ->select();
        if($zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }
    public function delNav(){
        $this->loginOrNot();
        $delNav["naid"] = $_POST["naid"];
        $Navigator = M('Navigator');
        $Navigator -> data($delNav) -> delete();
        $zock = $Navigator -> where($delNav) ->select();
        if(!$zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }
    
    //关于通知的操作
    public function addNot(){
        $this->loginOrNot();
        $newNot["ncontent"] = $_POST["ncontent"];
        $newNot["destination_url"] = $_POST["destination_url"];
        $newNot["create_time"] = date("y-m-d");
        $Notice = M('Notice');
        $Notice -> data($newNot) -> add();
        $zock = $Notice -> where($newNot) ->select();
        if($zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }
    public function delNot(){
        $this->loginOrNot();
        $delNot["nid"] = $_POST["nid"];
        $Notice = M('Notice');
        $Notice -> data($delNot) -> delete();
        $zock = $Notice -> where($delNot) ->select();
        if(!$zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }

    //关于大事件的操作
    public function addEve(){
        $this->loginOrNot();
        $newEve["etitle"] = $_POST["etitle"];
        $newEve["econtent"] = $_POST["econtent"];
        $newEve["etime"] = $_POST["etime"];
        $newEve["create_time"] = date("y-m-d");
        $Event = M('Event');
        $Event -> data($newEve) -> add();
        $zock = $Event -> where($newEve) ->select();
        if($zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }
    public function chgEve(){
        $this->loginOrNot();
        $chgEve["eid"] = $_POST["eid"];
        $chgEve["etitle"] = $_POST["etitle"];
        $chgEve["econtent"] = $_POST["econtent"];
        $chgEve["etime"] = $_POST["etime"];
        $chgEve["create_time"] = date("y-m-d");
        $Event = M('Event');
        $Event -> save($chgEve);
        $zock = $Event -> where($chgEve) ->select();
        if($zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }
    public function delEve(){
        $this->loginOrNot();
        $delEve["eid"] = $_POST["eid"];
        $Event = M('Event');
        $Event -> data($delEve) -> delete();
        $zock = $Event -> where($delEve) ->select();
        if(!$zock){
            $data['status'] = 1;
            $this -> ajaxReturn($data);
        }else {
            $data['status'] = 2;
            $this -> ajaxReturn($data);
        }
    }

}