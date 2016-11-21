$(document).ready(function(){
    $('a').click(function(){
		$div="#"+$(this).attr("id")+"-div";
		$disp=$($div).css("display");
		$($div).slideToggle(500).siblings("div").hide();
		$pdiv = "#"+$(this).attr("id")+"-div-p";
		$($pdiv).hide();
	});	
});