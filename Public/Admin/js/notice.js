
//消息通知通用模型

//<script>run_notice("title<i class=\"fa fa-spinner fa-spin\"></i>", "content", 3000);</script>

function run_notice(title, content, time) {

    $("#notice").show(300);
    $("#title").html(title);
    $("#content").html(content);

    setTimeout("notice_()", time);

}

function notice_(){
    $("#notice").hide(1000);
}