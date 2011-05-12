$(document).ready(
	function() {
		index_slider();
	}
);

function index_slider() {
	var i = 0;
	var imax = $('.index_ad_img > li').length;
	var s = 300; //渐隐渐显过渡时间
	var t_s = 2000; //广告切换时间
	var timeout = null;
	//显示哪个tab
	function moveToAd(n) {
		i = n;
		$('.index_ad_img > li.first').fadeOut(s, function() {
			$(this).removeClass('first');
			$('.index_ad_img > li').eq(n).addClass('first').fadeIn(s);
			$('.index_ad_btn > li').removeClass('first').eq(n).addClass('first');
		});
	}
	//初始化广告动画
	function init_ad() {
		timeout = setTimeout(function() {
			i++;
			if(i > imax - 1) i = 0;
			moveToAd(i);
			init_ad();
		}, t_s);
	}
	//绑定事件
	function bindEvent() {
		$('.index_ad').hover(
			function() {
				clearTimeout(timeout);
			},
			function() {
				init_ad();
			}
		);
		$('.index_ad_btn > li').mouseover(
			function() {
				var n = $('.index_ad_btn > li').index(this);
				moveToAd(n);
			}
		);
	}
	bindEvent();
	init_ad();
}