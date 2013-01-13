$('.rev_adj').on('change', function() {
	var $this = $(this);
	var ajaxLoader = $('.ajax-loader-'+ $this.data('campaign_location'));
	//console.log('rev for campaign location ' + $this.data('campaign_location') + ' changed to: ' + $this.val());
	$.ajax({
	  url: '/admin/ajax/rev_adj/' + $this.data('campaign_location') + '/' + $(this).val(),
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

