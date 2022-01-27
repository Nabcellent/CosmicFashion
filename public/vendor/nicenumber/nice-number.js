(function ($) {
	$.fn.niceNumber = function (options) {
		let defaults = {
			autoSize: true,
			autoSizeBuffer: 1,
			buttonDecrement: '-',
			buttonIncrement: '+',
			buttonPosition: 'around',

			/**
				callbackFunction
				@param {$input} currentInput - the input running the callback
				@param {number} amount - the amount after increase/decrease
				@param {object} settings - the passed niceNumber settings
			**/
			onDecrement: false,
			onIncrement: false,
			onChange: false,
		};
		let settings = $.extend(defaults, options);

		return this.each(function () {
			let currentInput = this,
				$currentInput = $(currentInput),
				maxValue = $currentInput.attr('max'),
				minValue = $currentInput.attr('min'),
				attrMax = null,
				attrMin = null;

			// Skip already initialized input
			if ($currentInput.attr('data-nice-number-initialized')) return;

			// Handle max and min values
			if (maxValue !== undefined && maxValue !== false) {
				attrMax = parseFloat(maxValue);
			}

			if (minValue !== undefined && minValue !== false) {
				attrMin = parseFloat(minValue);
			}

			// Fix issue with initial value being < min
			if (attrMin && !currentInput.value) {
				$currentInput.val(attrMin);
			}

			// Generate container
			let $inputContainer = $('<div/>', {
				class: 'nice-number',
			}).insertAfter(currentInput);

			// Generate interval (object so it is passed by reference)
			let interval = {};

			// Generate buttons
			let $minusButton = $('<button class="nice-number-button-minus btn btn-sm">')
				.attr('type', 'button')
				.html(settings.buttonDecrement)
				.on('mousedown mouseup mouseleave', function (event) {
					changeInterval(event.type, interval, function () {
						let currentValue = parseFloat($currentInput.val() || 0);
						if (attrMin == null || attrMin < currentValue) {
							let newValue = currentValue - 1;
							$currentInput.val(newValue);

							if (settings.onDecrement) {
								settings.onDecrement($currentInput, newValue, settings);
							}

							if (settings.onChange) {
								settings.onChange(newValue, $currentInput, settings);
							}
						}
					});

					// Trigger the input event here to avoid event spam
					if (event.type === 'mouseup' || event.type === 'mouseleave') {
						$currentInput.trigger('input');
					}
				});

			let $plusButton = $('<button class="nice-number-button-plus btn btn-sm">')
				.attr('type', 'button')
				.html(settings.buttonIncrement)
				.on('mousedown mouseup mouseleave', function (event) {
					changeInterval(event.type, interval, function () {
						let currentValue = parseFloat($currentInput.val() || 0);
						if (
							attrMax == null ||
							attrMax > currentValue
						) {
							let newValue = currentValue + 1;
							$currentInput.val(newValue);

							if (settings.onIncrement) {
								settings.onIncrement($currentInput, newValue, settings);
							}

							if (settings.onChange) {
								settings.onChange(newValue, $currentInput, settings);
							}
						}
					});

					// Trigger the input event here to avoid event spam
					if (event.type === 'mouseup' || event.type === 'mouseleave') {
						$currentInput.trigger('input');
					}
				});

			// Remember that we have initialized this input
			$currentInput.attr('data-nice-number-initialized', true);

			// Append elements
			switch (settings.buttonPosition) {
				case 'left':
					$minusButton.appendTo($inputContainer);
					$plusButton.appendTo($inputContainer);
					$currentInput.appendTo($inputContainer);
					break;
				case 'right':
					$currentInput.appendTo($inputContainer);
					$minusButton.appendTo($inputContainer);
					$plusButton.appendTo($inputContainer);
					break;
				case 'around':
				default:
					$minusButton.appendTo($inputContainer);
					$currentInput.appendTo($inputContainer);
					$plusButton.appendTo($inputContainer);
					break;
			}

			// Nicely size input
			if (settings.autoSize) {
				$currentInput.width(
					$currentInput.val().length + settings.autoSizeBuffer + 'ch'
				);
				$currentInput.on('keyup input', function () {
					$currentInput.animate(
						{
							width:
								$currentInput.val().length +
								settings.autoSizeBuffer +
								'ch'
						},
						200
					);
				});
			}
		});
	};

	function changeInterval(eventType, interval, callback) {
		if (eventType === 'mousedown') {
			interval.timeout = setTimeout(function () {
				interval.actualInterval = setInterval(function () {
					callback();
				}, 100);
			}, 200);
			callback();
		} else {
			if (interval.timeout) {
				clearTimeout(interval.timeout);
			}
			if (interval.actualInterval) {
				clearInterval(interval.actualInterval);
			}
		}
	}
})(jQuery);
