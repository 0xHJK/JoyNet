<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
  <meta http-equiv="Content-Language" contect="zh-CN">
  <title>精弘网络-后台管理</title>
  <link rel="stylesheet" type="text/css" href="/JoyNet/Public/css/bootstrap.css">
  <link rel="icon" href="/JoyNet/Public/img/favicon.ico" type="image/x-icon">
  <style>
  .logo{
    color: #F2F2F2;
    text-indent: -999em;
    margin: 20px auto 60px;
    width: 100%;
    height: 400px;
    background: url(/JoyNet/Public/img/JoyNet.png) no-repeat 50% 50%;
    overflow: hidden;
  }
  </style>
  <script type="text/javascript" src="/JoyNet/Public/js/get-admin.js"></script>
  <script type="text/javascript" src="/JoyNet/Public/js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="/JoyNet/Public/js/bootstrap.min.js"></script>
  <script>
  $(function(){
    var listNavUrl = "http://localhost/JoyNet/index.php?a=listNav";
    var listEveUrl = "http://localhost/JoyNet/index.php?a=listEve";
    var listNotUrl = "http://localhost/JoyNet/index.php?a=listNot";

    var loginUrl = "http://localhost/JoyNet/admin";
    
    var addNavUrl = "http://localhost/JoyNet/admin.php?a=addNav";
    var delNavUrl = "http://localhost/JoyNet/admin.php?a=delNav";
    var chgNavUrl = "http://localhost/JoyNet/admin.php?a=chgNav";

    var addNotUrl = "http://localhost/JoyNet/admin.php?a=addNot";
    var delNotUrl = "http://localhost/JoyNet/admin.php?a=delNot";

    var addEveUrl = "http://localhost/JoyNet/admin.php?a=addEve";
    var delEveUrl = "http://localhost/JoyNet/admin.php?a=delEve";
    var chgEveUrl = "http://localhost/JoyNet/admin.php?a=chgEve";
    //调用函数获取数据
    getNav(listNavUrl);
    getNotice(listNotUrl);
    getEvent(listEveUrl);
    //关于导航的操作------------开始-------------
    //增加导航
    $("#btn-addNav").click(function(){
      addNav();
    });
    $("#row-addNav").keypress(function(e){
      if(e.which==13){
        addNav();
      }
    });
    function addNav(){
      $.post(addNavUrl,{
        naname: $("#navName").val(),
        destination_url: $("#navUrl").val(),
        weight: $("#navWeight").val()
      },function(data){
        console.log(data);
        navOrNot(data);
      },"json");
    }
    //删除导航
    $("#navList").on("click",".btn-delNav",function(){
      $(this).text("确定");
      $(this).removeClass("btn-delNav");
      $(this).addClass("btn-realDelNav");
      $(this).next().text("取消");
      $(this).next().removeClass("btn-default btn-chgNav");
      $(this).next().addClass("btn-info btn-cancelDelNav");
      $($(this).parents("form").children(".row")[1]).fadeIn();
    });
    //确认删除导航
    $("#navList").on("click",".btn-realDelNav",function(){
      $($(this).parents("form").children(".row")[1]).fadeOut();
      $.post(delNavUrl,{
        naid: $(this).parents("form").attr("id").split("-")[1]
      },function(data,status){
        navOrNot(data);
      },"json");
    });
    //取消删除导航
    $("#navList").on("click",".btn-cancelDelNav",function(){
      $($(this).parents("form").children(".row")[1]).fadeOut();
      $(this).prev().text("删除");
      $(this).prev().removeClass("btn-realDelNav");
      $(this).prev().addClass("btn-delNav");
      $(this).text("修改");
      $(this).removeClass("btn-info btn-cancelDelNav");
      $(this).addClass("btn-default btn-chgNav");
    });

    //修改导航
    $("#navList").on("click",".btn-chgNav",function(){
      $(this).parents("form").find("input").attr("readonly",false);
      $(this).text("更新");
      $(this).removeClass("btn-chgNav btn-default");
      $(this).addClass("btn-info btn-updNav");      
    });
    //更新导航
    $("#navList").on("click",".btn-updNav",function(){
      var navId = $(this).parents("form").attr("id").split("-")[1];
      $.post(chgNavUrl,{
        naid: navId,
        naname: $($(this).parents("form").find("input")[0]).val(),
        destination_url: $($(this).parents("form").find("input")[1]).val(),
        weight: $($(this).parents("form").find("input")[2]).val()
      },function(data){
        navOrNot(data);
      },"json");
    });

    //导航成功与否判断
    function navOrNot(data){
      if(data.status=="1"){
        $("#navList").fadeOut();
        $("#navList").empty();
        getNav(listNavUrl);
        $("#navList").fadeIn();
      }else if(data.status=="3"){
        alert("登陆超时，请重新登陆");
        window.location.href=loginUrl;
      }else {
        alert("服务器泡妞去了，请稍后重试或联系管理员");
        $("#navList").empty();
        getNav(listNavUrl);
      }
    }
    //关于导航的操作------------结束-------------

    //关于新活动的操作----------开始--------------
    $("#btn-addNotice").click(function(){
      addNotice();
    });
    $("#form-addNotice").keypress(function(e){
      if(e.which==13){
        addNotice();
      }
    });
    function addNotice(){
      $.post(addNotUrl,{
        ncontent: $("#notCon").val(),
        destination_url: $("#notUrl").val()
      },function(data){
        console.log(data);
        noticeOrNot(data);
      },"json");
    }

    //删除活动
    $("#oldNotice").on("click",".btn-delNotice",function(){
      $(this).text("确定");
      $(this).removeClass("btn-delNotice");
      $(this).addClass("btn-realDelNotice");
      $(this).next().show();
      $($(this).parents("form").children(".row")[1]).fadeIn();
    });
    //确认删除活动
    $("#oldNotice").on("click",".btn-realDelNotice",function(){
      $($(this).parents("form").children(".row")[1]).fadeOut();
      $.post(delNotUrl,{
        nid: $(this).parents("form").attr("id").split("-")[1]
      },function(data,status){
        noticeOrNot(data);
      },"json");
    });
    //取消删除活动
    $("#oldNotice").on("click",".btn-cancelDelNotice",function(){
      $($(this).parents("form").children(".row")[1]).fadeOut();
      $(this).prev().text("删除");
      $(this).prev().removeClass("btn-realDelNotice");
      $(this).prev().addClass("btn-delNotice");
      $(this).hide();
    });

    //判断添加通知成功与否
    function noticeOrNot(data){
      if(data.status=="1"){
        $("#oldNotice").fadeOut();
        $("#oldNotice").empty();
        getNotice(listNotUrl);
        $("#oldNotice").fadeIn();
      }else if(data.status=="3"){
        alert("登陆超时，请重新登陆");
        window.location.href=loginUrl;
      }else {
        alert("服务器泡妞去了，请稍后重试或联系管理员");
        $("#oldNotice").empty();
        getNotice(listNotUrl);
      }
    }
    //关于新活动的操作----------结束--------------

    //关于事件的操作----------开始--------------
    //添加事件
    $("#btn-addEve").click(function(){
      addEvent();
    });
    $("#form-addEve").keypress(function(e){
      if(e.which==13){
        addEvent();
      }
    });
    function addEvent(){
      $.post(addEveUrl,{
        etitle: $("#eveTitle").val(),
        econtent: $("#eveContent").val(),
        etime: $("#eveDate").val()
      },function(data){
        console.log(data);
        eventOrNot(data,"#itEvent");
      },"json");
    }

    //删除事件
    $("#oldEvent").on("click",".btn-delEve",function(){
      $(this).text("确定");
      $(this).removeClass("btn-delEve");
      $(this).addClass("btn-realDelEve");
      $(this).next().text("取消");
      $(this).next().removeClass("btn-default btn-chgEve");
      $(this).next().addClass("btn-info btn-cancelDelEve");
      $(this).parents("form").find(".alert-danger").fadeIn();
    });
    //确认删除事件
    $("#oldEvent").on("click",".btn-realDelEve",function(){
      $(this).parents("form").find(".alert-danger").fadeOut();
      $.post(delEveUrl,{
        eid: $(this).parents("form").attr("id").split("-")[1]
      },function(data,status){
        eventOrNot(data,"#itEvent");
      },"json");
    });
    //取消删除事件
    $("#oldEvent").on("click",".btn-cancelDelEve",function(){
      $(this).parents("form").find(".alert-danger").fadeOut();
      $(this).prev().text("删除");
      $(this).prev().removeClass("btn-realDelEve");
      $(this).prev().addClass("btn-delEve");
      $(this).text("修改");
      $(this).removeClass("btn-info btn-cancelDelEve");
      $(this).addClass("btn-default btn-chgEve");
    });

    //修改事件
    $("#oldEvent").on("click",".btn-chgEve",function(){
      var eveid = $(this).parents("form").attr("id").split("-")[1];
      var evetitle = $($(this).parents(".oldEveList").find(".eventtitle")[0]).text().split("#")[1];
      var evetime = $($(this).parents(".oldEveList").find(".eventtitle")[0]).text().split("/")[1];
      var evecontent = $(this).parents("form").find(".event-content").html();
      $(this).parents("form").find(".event-content").html(
        '<form role="form"><div class="row"><div class="col-md-7"><div class="form-group"><div class="input-group"><div class="input-group-addon">标题</div><input name="etitle" class="form-control eveChgTitle" type="text" value="' + evetitle + '"></div></div></div><div class="col-md-5"><div class="form-group"><div class="input-group"><div class="input-group-addon">事件日期</div><input name="etime" class="form-control eveChgTime" type="text" value="' + evetime + '"></div></div></div></div><textarea name="econtent" class="form-control eveChgCon" rows="5">' + evecontent + '</textarea><br></form>'
        );
      $(this).text("更新");
      $(this).removeClass("btn-chgEve btn-default");
      $(this).addClass("btn-info btn-updEve");      
    });
    //更新事件
    $("#oldEvent").on("click",".btn-updEve",function(){
      $.post(chgEveUrl,{
        eid: $(this).parents("form").attr("id").split("-")[1],
        etitle: $(this).parents("form").find(".eveChgTitle").val(),
        econtent: $(this).parents("form").find(".eveChgCon").val(),
        etime: $(this).parents("form").find(".eveChgTime").val()
      },function(data){
        console.log(data);
        eventOrNot(data,"#itEvent");
      },"json");
    });
    //判断添加事件成功与否
    function eventOrNot(data,locate){
      if(data.status=="1"){
        $("#oldEvent").fadeOut();
        $("#oldEvent").empty();
        getEvent(listEveUrl);
        $("#oldEvent").fadeIn();
        $("html,body").animate({scrollTop: $(locate).offset().top}, 500);
      }else if(data.status=="3"){
        alert("登陆超时，请重新登陆");
        window.location.href=loginUrl;
      }else {
        alert("服务器泡妞去了，请稍后重试或联系管理员");
        $("#oldEvent").empty();
        getEvent(listEveUrl);
      }
    }
  });
  </script>
</head>
<body>
  <div class="container" style="padding-bottom:80px;">
    <div class="box" id="header">
      <div class="header">
        <a href="index.php"><h1 class="logo" style="-webkit-animation: metro_grey 21s linear infinite;"></h1></a>
      </div>
    </div>
    <div class="panel-group" id="slideOuterDisable">
      <!-- 导航链接  -->
      <div class="panel panel-primary">
        <div class="panel-heading" style="height:100px;">
          <h3 class="panel-title">
            <a data-toggle="collapse" data-parent="#slideOuter" href="#itNav"><h1>导航链接</h1></a>
          </h3>
        </div>
        <div id="itNav" class="panel-collapse collapse in">
          <div class="panel-body" id="navTable">
            <form role="form">
              <div class="row" id="row-addNav">
                <div class="col-md-3 input-group">
                  <div class="input-group-addon">名称</div>
                  <input id="navName" name="naname" class="form-control" type="text" placeholder="名称">
                </div>
                <div class="col-md-5 input-group">
                  <div class="input-group-addon">地址</div>
                  <input id="navUrl" name="destination_url" class="form-control" type="text" placeholder="url">
                </div>
                <div class="col-md-2 input-group">
                  <div class="input-group-addon">权重</div>
                  <input id="navWeight" name="weight" class="form-control" type="text" placeholder="0-9">
                </div>
                <button type="button" id="btn-addNav" class="btn btn-primary">添加</button>
              </div><br>
            </form>
            <div id="navList"></div>
          </div>
        </div>
      </div><br>
      <!-- 最新活动 -->
      <div class="panel panel-primary">
        <div class="panel-heading" style="height:100px;">
          <h3 class="panel-title">
            <a data-toggle="collapse" data-parent="#slideOuter" href="#itNotice"><h1>最新活动</h1></a>
          </h3>
        </div>
        <div id="itNotice" class="panel-collapse collapse in">
          <div class="panel-body" id="notice-Table">
            <h4>最新活动</h4>
            <form id="form-addNotice" role="form" method="post" target="ajaxifm">
              <div class="row">
                <div class="col-md-5 input-group">
                  <div class="input-group-addon">名称</div>
                  <input name="ncontent" id="notCon" class="form-control" type="text" placeholder="活动名称名称">
                </div>
                <div class="col-md-5 input-group">
                  <div class="input-group-addon">地址</div>
                  <input name="destination_url" id="notUrl" class="form-control" type="text" placeholder="活动网址，可为空">
                </div>
                <button id="btn-addNotice" class="btn btn-primary">添加</button>
              </div>
            </form><br>
            <h4>历史活动</h4>
            <div id="oldNotice"></div>
          </div>
        </div>
      </div><br>
      <!-- 精弘大事记 -->
      <div class="panel panel-primary">
        <div class="panel-heading" style="height:100px;">
          <h3 class="panel-title">
            <a data-toggle="collapse" data-parent="#slideOuter" href="#itEvent"><h1>精弘大事记</h1></a>
          </h3>
        </div>
        <div id="itEvent" class="panel-collapse collapse in">
          <div class="panel-body">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">添加新事件</h4>
              </div>
              <div class="panel-body">
                <form role="form" id="form-addEve" method="post" target="ajaxifm">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">标题</div>
                          <input id="eveTitle" name="etitle" class="form-control" type="text" placeholder="请输入标题">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon">事件日期</div>
                          <input id="eveDate" name="etime" class="form-control" type="text" placeholder="yyyy-mm-dd">
                        </div>
                      </div>
                    </div>
                  </div>
                  <textarea id="eveContent" name="econtent" class="form-control" rows="5"></textarea><br>
                  <button id="btn-addEve" class="btn btn-primary">添加</button>
                </form>
                <iframe id="ajaxifm" name="ajaxifm" style="display:none;"></iframe>
              </div>
            </div><br>
            <h4>历史事件</h4>
            <div id="oldEvent"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>