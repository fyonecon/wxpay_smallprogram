jQuery(document).ready(function() {

		jQuery(window).load(function() {
    		$(".preloader").delay(200).fadeOut("fast");//动画容器
            //jQuery(".status").fadeOut();//动画图
            $(".spinner").delay(300).fadeOut();
		});
		kd_time();
});

function kd_time(){
	setTimeout("kd_write()",8000);
}

function kd_write(){
	var _kd_status = document.getElementById("kd-status");
	_kd_status.style.textAlign = "center";
	_kd_status.style.top = "32%";
	_kd_status.innerHTML = "网速较慢";
	_kd_status.style.color = "red";
	_kd_status.style.fontSize = "16px";
	_kd_status.style.backgroundColor = "black";
	_kd_status.style.position = "fixed";
	_kd_status.style.left = "0";
    _kd_status.style.width = "80%";
    _kd_status.style.lineHeight = "30px";
    _kd_status.style.right = "0";
    _kd_status.style.margin = "auto";
	_kd_status.style.borderRadius = "5px";
	setTimeout("kd_write1()",6000);
}
function kd_write1(){
	var _kd_status = document.getElementById("kd-status");
	_kd_status.style.textAlign = "center";
	_kd_status.style.top = "20%"-40+"px";
	_kd_status.innerHTML = "建议手动刷新页面";
	_kd_status.style.color = "red";
	_kd_status.style.fontSize = "16px";
	_kd_status.style.backgroundColor = "black";
	_kd_status.style.position = "fixed";
    _kd_status.style.left = "0";
    _kd_status.style.width = "80%";
    _kd_status.style.lineHeight = "30px";
    _kd_status.style.right = "0";
    _kd_status.style.margin = "auto";
	_kd_status.style.borderRadius = "5px";
    setTimeout("kd_refresh()",20000);
}

function kd_refresh() {
    // window.location.reload();
	return false;
}