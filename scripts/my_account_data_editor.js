$(document).ready(function(){
    $('a').click(function(){
		$div="#"+$(this).attr("id")+"_div";
		$disp=$($div).css("display");
		$($div).slideToggle(500).siblings("div").hide();
	});	
});