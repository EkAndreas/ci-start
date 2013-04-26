(function(jQuery) {
	jQuery.fn.calculateMortgage = function(options) {
		var defaults = {
			currency: '&euro;',
			params: {}
		};
		options = jQuery.extend(defaults, options);

		var calculate = function(params) {
			params = jQuery.extend({
				balance: 0,
				rate: 0,
				term: 0,
				period: 0
			}, params);

			var N = params.term * params.period;
			var I = (params.rate / 100) / params.period;
			var v = Math.pow((1 + I), N);
			var t = (I * v) / (v - 1);
			var result = params.balance * t;

			return result;

		};

		return this.each(function() {
			var jQueryelement = jQuery(this);
			var jQueryresult = calculate(options.params);
			var output = '<p class="calc_result">' + options.currency + ' ' + jQueryresult.toFixed(2) + '</p>';
			jQuery(output).appendTo(jQueryelement);


		});

	};


})(jQuery);

jQuery(function() {
	jQuery('#test').on('submit', function(e) {
		e.preventDefault();
		var jQueryparams = {
			balance: jQuery('#balance').val(),
			rate: jQuery('#rate').val(),
			term: jQuery('#term').val(),
			period: jQuery('option:selected', '#period').val()
		};

		jQuery(this).calculateMortgage({
			params: jQueryparams
		})

	});


});
