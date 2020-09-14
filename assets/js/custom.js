(function($) {
	$('.forum_svg').each(function(index,element){
		var id = $(this).attr('id');
		var color = $(this).attr('data-color');
		$('#'+id+' svg').css({'fill', color});
	});
}(jQuery);