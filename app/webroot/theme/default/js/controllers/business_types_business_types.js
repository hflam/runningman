$('.weight').on('change', function() {
	var $this = $(this);
	var ajaxLoader = $('.ajax-loader-'+ $this.data('business_types_business_type'));
	//console.log('weight for business_types_business_type ' + $this.data('business_types_business_type') + ' changed to: ' + $this.val());
	$.ajax({
	  url: '/admin/ajax/btbt_weight_adj/' + $this.data('business_types_business_type') + '/' + $(this).val(),
		beforeSend: function() {
			$this.hide();
			ajaxLoader.show();
  		},
		success: function(data) {
	    //console.log('Load was performed.');
		ajaxLoader.hide();
		$this.show();
	  }
	});
});

