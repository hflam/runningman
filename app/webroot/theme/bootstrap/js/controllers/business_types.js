$('.child-business-types').hide();
$('.bt-toggle').on('click', function() {
	$('.child-btid-' + $(this).data('btid')).slideToggle();
});