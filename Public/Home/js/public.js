
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

