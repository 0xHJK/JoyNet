//页面特效
//导航鼠标移入
function navMouseOver(){
$(".navListItem").hover(function(){
    $("#navTag").stop();
    $("#navTag").animate({left:$(this).position().left},"high");
});
}
//导航宽度适应
function navBarWidth(){
    $("#nav").animate({width:$(".navListItem").length*130+1+'px'});
}

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
        $("#navList").html(
            "<li class='navListItem'><a href='http://www.zjut.com/'  target='_blank'>首页</a></li>" +
            "<li class='navListItem'><a href='http://bbs.zjut.edu.cn/'  target='_blank'>论坛</a></li>" +
            "<li class='navListItem'><a href='http://hd.izjut.com/'  target='_blank'>圈圈</a></li>" +
            "<li class='navListItem'><a href='http://feel.zjut.com/'  target='_blank'>电台</a></li>" +
            "<li class='navListItem'><a href='http://pan.zjut.com/'  target='_blank'>网盘</a></li>" +
            "<li class='navListItem'><a href='http://news.zjut.com/'  target='_blank'>资讯</a></li>" +
            "<li class='navListItem'><a href='http://go.zjut.com/'  target='_blank'>导航</a></li>");
        navMouseOver();
        navBarWidth();
    }
    function navListFunc(data){
        // console.log(data.content);
        $("#navList").empty();
        $.each(data.content, function(i, item) {
            // alert(item.destination_url);
            $("#navList").append("<li class='navListItem'><a href='" + item.destination_url + "' target='_blank'>" + item.naname + "</a></li>");
        });
        navMouseOver();
        navBarWidth();
    }
}

//获取新的通知
function getNotice(showNotArg){
    $.ajax({
        url: showNotArg,
        type: "GET",
        dataType: "json",
        timeout: 1000,
        cache: false,
        success: notListFunc
    });
    function notListFunc(data){
        console.log(data.content[0].ncontent);
        // $.each(data.data, function(i, item) {  
            $("#notice").html("<h2><a href='" + data.content[0].destination_url + "' target='_blank'>" + data.content[0].ncontent + "</a></h2>");
        // }); 
    }
}

//获取全部事件
function getEve(listEveArg){
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
        $("#event").html(
            "<li><div class='time'><span class='year'>2014/09</span><span class='day'>13</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>2014级新生招新</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2014/07</span><span class='day'>07</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘网络服务器转移</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2013/09</span><span class='day'>09</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>工大助手上线</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2013/01</span><span class='day'>01</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>荣获2013年浙江省文化传播创新十佳网站</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2012/05</span><span class='day'>05</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘网络十周年庆</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2012/03</span><span class='day'>03</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>第一届精弘毅行</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2012/02</span><span class='day'>02</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>荣获第五届“全国高校百佳网站”荣誉称号</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2011/12</span><span class='day'>12</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>和香港环境保护协会协作举办水果贺卡2011活动，并荣获全国优秀团队奖</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2010/05</span><span class='day'>05</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>举办首届精弘商铺毕业生跳蚤市场</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2009/10</span><span class='day'>10</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘商铺开始-shop.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2009/10</span><span class='day'>10</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘商铺开始-shop.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2009/02</span><span class='day'>02</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>学工部站点竣工-www.xgb.zjut.edu.cn</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2008/12</span><span class='day'>12</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>个人空间升级至精弘家园（Ucenter Home）</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2008/09</span><span class='day'>09</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘举办软件自由日系列活动，并成立开源社区-mosn.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2007/12</span><span class='day'>12</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>与校会合作直播TOP10</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2007/06</span><span class='day'>06</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>“新生论坛”升级</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2006/12</span><span class='day'>12</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>FEEL电台举办第一次真情祝福活动</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2006/05</span><span class='day'>05</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>第一版学生邮件开始-mail.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2005/05</span><span class='day'>05</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘论坛两周年，管理团队录制《精弘论坛两周年视频》</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2005/02</span><span class='day'>02</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>公共FTP开始-ftp.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2004/12</span><span class='day'>12</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>Feel电台创立-radio.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2004/05</span><span class='day'>05</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘博客开始-blog.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2003/12</span><span class='day'>12</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>新闻网开始-news.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2003/05</span><span class='day'>05</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘论坛开始-bbs.zjut.com</a><div class='content'></div></div></li>" +
            "<li><div class='time'><span class='year'>2002/05</span><span class='day'>05</span><span class='event_round'></span></div><div class='eventList'><a href='#' class='title'>精弘苑网站诞生-www.zjut.com</a><div class='content'></div></div></li>"
        );
    }
    function eventListFunc (data) {
        $("#event").fadeOut();
        $("#event").empty();
        $.each(data.content, function(i, item) {
            var arrTime = item.etime.split("-");
            $("#event").append(
                "<li><div class='time'>" + 
                "<span class='year'>" + arrTime[0] + "</span>" + 
                "<span class='day'>" + arrTime[1] + "</span>" +
                "<span class='event_round'></span>" +
                "</div><div class='eventList'>" +
                "<p class='title'>" + item.etitle + "</p>" +
                "<div class='content'>" + item.econtent + "</div>" +
                "</div></li>"
            );
        });
        $("#event").fadeIn();
    }
}
