$(function(){
	if($(".Notice_res .lunbo p").length>0){
		$(".Notice").show();
		
	}else{
		$(".Notice").hide();
	};
	var h=$(".Notice .lunbo").html();
	$(".Notice .lunbo").append(h);
	var lbt_length=$(".Notice .lunbo p").length;
	var lbt_width=$(".Notice .lunbo p").width();
	$(".lunbo .lunbo").width(lbt_length*lbt_width)
	function move(){
		$(".lunbo").animate({
			"marginLeft":-(lbt_width)+"px"
		},4000,function(){
			$(".lunbo q").eq(0).appendTo($(".lunbo"));
			$(".lunbo").css({"marginLeft":0})
		})
	}
	setInterval(move,4000);
	      
})