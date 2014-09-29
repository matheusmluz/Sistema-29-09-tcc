$(document).ready(function(){
	$('#menuDesktop li').focus(function(){
		$('#menuDesktop ul li ul').css('display','block');
	});
});