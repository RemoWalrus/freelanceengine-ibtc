(function($) {
	$('.forum_svg_thread').each(function(index,element){
		var id = $(this).attr('id');
		var color = $(this).attr('data-color');
		$('#'+id+' svg').css('fill', '#fff');
	});
})(jQuery);