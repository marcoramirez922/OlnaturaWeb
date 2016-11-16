/*custom.min*/
	
jQuery(document).ready(function($){
	//portfolio - show link
	$('.divInteriores').hover(
		function () {
			$(this).animate({bottom:'0px'});
		},
		function () {
			$(this).animate({bottom:'-305px'});
		}
	);	
});


function ira(laDirec){
	window.location= laDirec;
}