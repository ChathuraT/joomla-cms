/**
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @package     Joomla
 * @subpackage  JavaScript Tests
 * @since       3.7.0
 * @version     1.0.0
 */

define(['jquery', 'testsRoot/calendar/spec-setup', 'jasmineJquery'], function ($) {

	describe('Calendar set for the input element', function () {
		beforeAll(function () {
			var element = document.querySelector(".field-calendar");
			JoomlaCalendar.init(element);
		});

		it('Should have calendar element under the input element', function () {
			expect($('body')).toContainElement('.js-calendar');
		});

		it('Calendar should be hidden', function () {
			expect($('.js-calendar').css('display')).toEqual('none');
		});

		it('Should appear on button click', function () {
			$('#jform_created_btn').trigger('click');

			expect($('.js-calendar').css('display')).toEqual('block');
		});

		it('Should have the correct date', function () {
			expect($('.field-calendar').find('input').val()).toEqual('2016-09-01 05:17:00');
		});


	});
});
