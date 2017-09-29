
	//获取要定位元素距离浏览器顶部的距离
	function movetop(target){
			var navH = $(target).offset().top;
			var th=$(".head").height();
			var cha=navH-th
	//滚动条事件
	$(window).scroll(function() {
		//获取滚动条的滑动距离
		var scroH = $(this).scrollTop();
		//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
		if(scroH >= cha) {
			$(target).css({
				"position": "fixed",
				"top": 0,
				"marginTop":"1.1rem"
			});
			$(".typethree").css(
				"marginTop","1rem"
			)
			
		} else{
			$(target).css({
				"position": "static",
				"marginTop":0
			});
			$(".typethree").css(
				"marginTop","0"
			)
		}
	})
	}
	
    