$(function() {

	//	禁止全屏滚动
	var mo = function(e) {
		e.preventDefault();
	};

	/***禁止滑动***/
	function stop() {
		document.body.style.overflow = 'hidden';
		document.addEventListener("touchmove", mo, false); //禁止页面滑动
	}

	/***取消滑动限制***/
	function move() {
		document.body.style.overflow = ''; //出现滚动条
		document.removeEventListener("touchmove", mo, false);
	}

	$(".body_1 div").on("click", function() {
		
			$(".toy").css({
				"transform":"scale(1)",
	            "-ms-transform":"scale(1)",
	            "-webkit-transform":"scale(1)",
	            "-o-transform":"scale(1)",
	            "-moz-transform":"scale(1)",
			})
			stop()
	})
})