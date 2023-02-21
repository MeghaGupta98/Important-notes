(function ($) {
	'use strict';

	/**
	 * All of the code for your common JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(document).ready(function () {
		// console.log(mwb_mbfw_common_obj, "check");
		if ($('.mbfw_time_picker').length > 0) {
			$('.mbfw_time_picker').timepicker();
		}
		$(document).on('change', 'form.cart :input', function () {
			setTimeout(() => {
				var form_data = new FormData($('form.cart')[0]);
				if ($('.mwb_mbfw_booking_product_id').val()) {
					retrieve_booking_total_ajax(form_data);
				}
			}, 900)
		});
		$('#mwb-mbfw-booking-from-time, #mwb-mbfw-booking-to-time').on('keydown paste focus mousedown', function (e) {
			e.preventDefault();
		});


		var offtimes = $('#offtimes').val();
		var off_dates = [];
		if (offtimes) {
			const arr = offtimes.split(',');
			if (arr.length) {
				for (let key of arr) {
					off_dates.push(moment(key).format('DD-MM-YYYY'));
				}
			}
		}

		var holidays = $('#holidays').val();
		var holi_dates = [];
		if (holidays) {
			const arr = holidays.split(',');
			if (arr.length) {
				for (let key of arr) {
					holi_dates.push(moment(key).format('DD-MM-YYYY'));
				}
			}
		}



		// $('.mwb_mbfw_time_date_picker_frontend').datetimepicker({
		// 	format  : 'd-m-Y h:i A',
		// 	minDate : mwb_mbfw_common_obj.minDate,
		// 	minTime : $('#mwb-mbfw-booking-from-time').attr('data-stime'),
		// 	maxTime : $('#mwb-mbfw-booking-from-time').attr('data-etime'),
		// 	formatTime:'h:i A',
		// 	step:60,
		// 	disabledDates: off_dates,
		// 	formatDate:'d-m-Y',
		// 	// minTime : mwb_mbfw_common_obj.minTime
		// });
		var stime = moment($('#mwb-mbfw-booking-from-time').attr('data-stime'), "HH:mm").format("hh:mm A");
		var etime = moment($('#mwb-mbfw-booking-from-time').attr('data-etime'), "HH:mm").format("hh:mm A");
		let fromTime = moment($('#mwb-mbfw-booking-from-time').attr('data-stime'), 'HH:mm');

		let array = [];

		for (var i = 0; 25 > i; i++) {
			let result = moment(fromTime).add(i, 'hours').format('HH:mm')
			let result2 = moment(fromTime).add(i, 'hours').format('hh:mm A')
			array.push(result)
			if (result2 == etime) {
				break;
			}
		}



		// console.log(array)

		$(function () {
			$('#mwb-mbfw-booking-from-time').datetimepicker({
				format: 'd-m-Y h:i A',
				minDate: mwb_mbfw_common_obj.minDate,
				// minTime : stime,
				// maxTime : etime,
				formatTime: 'h:i A',
				step: 60,
				disabledDates: off_dates,
				formatDate: 'd-m-Y',
				allowTimes: array
				// minTime : mwb_mbfw_common_obj.minTime
			});

			$('#mwb-mbfw-booking-to-time').datetimepicker({
				// datepicker: true,
				// format  : 'h:i A',
				format: 'd-m-Y h:i A',
				minDate: mwb_mbfw_common_obj.minDate,
				// minTime : stime,
				// maxTime : etime,
				formatTime: 'h:i A',
				// formatDate:'d-m-Y',
				// step:60,
				allowTimes: array,
				onSelectTime: function (ct, $i) {
					var from_time = $('#mwb-mbfw-booking-from-time').val();
					var ft = moment(from_time, 'DD-MM-YYYY HH:mm').format('DD-MM-YYYY');
					var ct2 = moment(ct, 'DD-MM-YYYY HH:mm').format('hh:mm A');
					$('#mwb-mbfw-booking-to-time').val(ft + ' ' + ct2);
				}
			});
		});

		$('.mwb_mbfw_date_picker_frontend').datetimepicker({
			format: 'd-m-Y',
			timepicker: false,
			minDate: mwb_mbfw_common_obj.minDate,
		}); mwb_mbfw_common_obj.ajax_url
		$('.mwb_mbfw_time_picker_frontend').datetimepicker({
			format: 'H:i',
			datepicker: false,
		});
		$('#mwb-mbfw-booking-from-time').on('change', function () {
			setTimeout(() => {
				var from_time = $(this).val();
				var ff = moment(from_time, 'DD-MM-YYYY hh:mm A').format('DD-MM-YYYY');
				var to_time = $('#mwb-mbfw-booking-to-time').val();
				if (from_time && to_time) {
					if (moment(from_time, 'DD-MM-YYYY hh:mm A') >= moment(to_time, 'DD-MM-YYYY hh:mm A')) {
						$(this).val('');
						alert(mwb_mbfw_public_obj.wrong_order_date_2);
					}
					var startTime = moment(from_time, 'DD-MM-YYYY hh:mm A');
					var end = moment(to_time, 'DD-MM-YYYY hh:mm A');
					var duration = moment.duration(end.diff(startTime));
					var day = startTime.format("d");
					if (day == 5 || day == 6 || day == 0 || holi_dates.includes(ff)) {
						if (duration.asMinutes() < 240) {
							$(this).val('');
							alert('Please selectmwb_mbfw_common_obj.ajax_url atleast four hours.');
						}
					} else {
						if (duration.asMinutes() < 120) {
							$(this).val('');
							alert('Please select atleast two hours.');
						}
					}
				}
			}, 600)
		});
		$('#mwb-mbfw-booking-to-time').on('change', function () {
			setTimeout(() => {
				var from_time = $('#mwb-mbfw-booking-from-time').val();
				var to_time = $(this).val();
				var ff = moment(to_time, 'DD-MM-YYYY hh:mm A').format('DD-MM-YYYY');
				console.log('to', to_time, from_time)
				if (from_time && to_time) {
					if (moment(from_time, 'DD-MM-YYYY hh:mm A') >= moment(to_time, 'DD-MM-YYYY hh:mm A')) {
						$(this).val('');
						alert(mwb_mbfw_public_obj.wrong_order_date_1);
					}
					var startTime = moment(from_time, 'DD-MM-YYYY hh:mm A');
					var end = moment(to_time, 'DD-MM-YYYY hh:mm A');
					var duration = moment.duration(end.diff(startTime));
					var day = startTime.format("d");
					if (day == 5 || day == 6 || day == 0 || holi_dates.includes(ff)) {
						if (duration.asMinutes() < 240) {
							$(this).val('');
							alert('Please select atleast four hours.');
						}
					} else {
						if (duration.asMinutes() < 120) {
							$(this).val('');
							alert('Please select atleast two hours.');
						}
					}
				}
			}, 600)
		});
	});
})(jQuery);




function retrieve_booking_total_ajax(form_data) {
	
	if ($('.mwb-mbfw-total-area').length > 0) {
		form_data.append('action', 'mbfw_retrieve_booking_total_single_page');
		form_data.append('nonce', 	mwb_mbfw_common_obj.nonce);
		jQuery.ajax({
			url: mwb_mbfw_common_obj.ajax_url,
			method: 'post',
			data: form_data,
			processData: false,
			contentType: false,
			success: function (msg) {
				$('.mwb-mbfw-total-area').html(msg);
			}
		});
	}
}


(function getBookingDateTime()
{
	var url = mwb_mbfw_common_obj.ajax_url;

	console.log('request going to be sent');
	var data = {
		action: 'getBookingDateTime',		
	}

	jQuery.ajax({
		url: mwb_mbfw_common_obj.ajax_url,
		method: 'get',
		data: data,
		processData: false,
		contentType: false,
		success: function (msg) {
			console.log('success ==>> ',msg);
		}
	});

// 	$.ajax({
// 		url,
// 		method: 'GET',
// 		beforeSend: () => {
// 			console.log('before send');
// 		},
// 		fail: (xhr, status, error ) => {
// 			console.log('error----');
// 			console.log( status );
// 			console.log( error );
// 		},
// 		success: () => {
// 			console.log('success');
// 		},
// 		complete: () => {
// 			console.log('complete');
// 		}
// });

console.log('request sent');

})();

$(document).ready(function () {
	// console.log(mwb_mbfw_common_obj.ajax_url, "url");
	// function getData() {
		// var data = {
		// 	action: 'get_booking_date_time',
		// 	nonce: mwb_mbfw_common_obj.nonce,
		// };
		// console.log(data, "data");
		// // var ajaxurl =  mwb_mbfw_common_obj.ajax_url;
		// jQuery.ajax({
		// 	url: mwb_mbfw_common_obj.ajax_url,
		// 	method: 'POST',
		// 	data: data,
		// 	processData: false,
		// 	contentType: false,
		// 	success: function () {
		// 		console.log("working");
		// 		// $('.mwb-mbfw-total-area').html(msg);
		// 	}
		// });

	// }
	// getData();
	// console.log(getData(), "yes");
});




