

  //获取全部导航
  function getNav(listNavArg){
    $.ajax({
      url: listNavArg,
      type: "GET",
      dataType: "json",
      timeout: 1000,
      cache: false,
      error: navErrorFunc,
      success: navListFunc
    });
    function navErrorFunc(){
      alert("服务器出了一个问题");
    }
    function navListFunc(data){
      $.each(data.content, function(i, item) {  
        $("#navList").append(
          '<form role="form" id="nav-' + item.naid + '"><div class="row"><div class="col-md-3 input-group"><div class="input-group-addon">名称</div><input class="form-control" type="text" value="' + item.naname + '" readonly>' +
          '</div><div class="col-md-5 input-group"><div class="input-group-addon">地址</div><input class="form-control" type="text" value="' + item.destination_url + '" readonly></div><div class="col-md-2 input-group"><div class="input-group-addon">权重</div><input name="weight" class="form-control" type="text" value="' + item.weight +'"readonly></div><div class="btn-group"><button type="button" class="btn btn-danger btn-delNav">删除</button><button type="button" class="btn btn-default btn-chgNav">修改</button></div></div><div class="row" style="display:none;"><br><div class="col-md-10"><div class="alert alert-danger" role="alert" style="height:35px; text-align:center;padding: 5px;font-size: 16px;">确定要删除该导航吗</div></div></div><br></form>');
      });
    }
  }
  //获取新的通知
  function getNotice(listNotArg){
    $.ajax({
      url: listNotArg,
      type: "GET",
      dataType: "json",
      timeout: 1000,
      cache: false,
      success: notListFunc
    });
    function notListFunc(data){
      $.each(data.content, function(i, item) {
        $("#oldNotice").append(
            '<form role="form" id="not-' + item.nid + '" class="navForm"><div class="row"><div class="col-md-3 input-group"><div class="input-group-addon">名称</div><input class="form-control" type="text" value="' + item.ncontent + '"readonly></div><div class="col-md-4 input-group"><div class="input-group-addon">地址</div><input class="form-control" type="text" value="' + item.destination_url + '" readonly></div><div class="col-md-3 input-group"><div class="input-group-addon">创建时间</div><input class="form-control" type="text" value="' + item.create_time + '" readonly></div><div class="btn-group"><button type="button" class="btn btn-danger btn-delNotice">删除</button><button type="button" class="btn btn-default btn-cancelDelNotice" style="display:none;">取消</button></div></div><div class="row" style="display:none;"><br><div class="col-md-10"><div class="alert alert-danger" role="alert" style="height:35px; text-align:center;padding: 5px;font-size: 16px;">确定要删除该导航吗</div></div></div></div><br></form>'
          );
      }); 
    }
  }
  //获取全部事件
  function getEvent(listEveArg){
    $.ajax({
      url: listEveArg,
      type: "GET",
      dataType: "json",
      timeout: 1000,
      cache: false,
      error: eventErrorFunc,
      success: eventListFunc
    });
    function eventErrorFunc(){
      alert("服务器出了一个问题");
    }
    function eventListFunc (data) {
      $.each(data.content, function(i, item) {
        if(i%2==0){
          $("#oldEvent").append(
            '<div class="panel oldEveList panel-success"><div class="panel-heading"><h4 class="panel-title"><a class="eventtitle" data-toggle="collapse" data-parent="#oldEvent" href="#eveCon-' + item.eid +'">#' + item.etitle + '#&nbsp;&nbsp;&nbsp;&nbsp;/' + item.etime + '</a></h4></div><form id="eveCon-'+ item.eid +'" class="panel-collapse collapse"><div class="panel-body"><div class="event-content">' + item.econtent +'</div><br><br><div class="alert alert-danger" role="alert" style="display:none;">确定要删除该事件么</div><div class="btn-group"><button type="button" class="btn btn-danger btn-delEve">删除</button><button type="button" class="btn btn-default btn-chgEve">修改</button></div></form></div></div><br>');
        } else {
        $("#oldEvent").append(
            '<div class="panel oldEveList panel-warning"><div class="panel-heading"><h4 class="panel-title"><a class="eventtitle" data-toggle="collapse" data-parent="#oldEvent" href="#eveCon-' + item.eid +'">#' + item.etitle + '#&nbsp;&nbsp;&nbsp;&nbsp;/' + item.etime + '</a></h4></div><form id="eveCon-'+ item.eid +'" class="panel-collapse collapse"><div class="panel-body"><div class="event-content">' + item.econtent +'</div><br><br><div class="alert alert-danger" role="alert" style="display:none;">确定要删除该事件么</div><div class="btn-group"><button type="button" class="btn btn-danger btn-delEve">删除</button><button type="button" class="btn btn-default btn-chgEve">修改</button></div></form></div></div><br>');
        }
      });
    }
  }