$(document).ready(function() {
	$('li.submenu').hover(function() {
		var li = $(this);
		var id = $(this).attr('id');
		$('#submenu').slideDown();
		$('#submenu .menu').hide();
		$('#'+id+'_sub').show();
		$('li.submenu').removeClass('hover');
		$(this).addClass('hover');
		var position = li.position();
		var li_width = li.width();
		var sub_width = $('#'+id+'_sub').width();
		var li_pos_x = position.left;
		var count = li_pos_x - ((sub_width - li_width)/2);
		$('#'+id+'_sub').css("left", count);
	}, function() {
	});
	
	$('#submenu').hover(function() {
	}, function() {
		submenu_hide();
	});
	
	$('li.simple').hover(function() {
		submenu_hide();
	}, function() {
	});
	
	function submenu_hide()
	{
		$('#submenu').slideUp();
		$('li.submenu').removeClass('hover');
		$('#submenu .menu').hide();
	}
});
