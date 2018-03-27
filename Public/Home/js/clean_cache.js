// <script src="__PUBLIC__/Home/js/clean_cache.js" type="text/javascript"></script>
//<script src="" id="script-scr" type="text/javascript"></script>
//利用js随机数清除cache
// clean_cache();
// function clean_cache() {
//     document.getElementById("script-scr").src="http://cdnaliyun.oss-cn-hangzhou.aliyuncs.com/js/public.js?ver="+Math.random();
// }

run_screen();
function  run_screen() {
    var scr_width = window.innerWidth;
    // console.log(scr_width);
    if (scr_width>700){
        alert("本网站不提供给PC设备或者超大屏设备。。即将离开本网站");
        window.location.replace("https://www.bing.com");
    }else {
        // console.log("设备很OK。");
    }
    setTimeout("run_screen()", 1500);
}
