$(document).ready(function() {

	/************************************************************************************
	Slider
	*************************************************************************************/
	var slide = 0;
 	var slide_count = $('.slide_item').length,
 		num_slide = $('.slide_item'),
 		slider_control = $('.slider_control li'),
		slider_go = setInterval(slider, 2500);

	$('.slider').mouseenter(function(){ clearInterval(slider_go); })
	$('.slider').mouseleave(function(){ slider_go = setInterval(slider, 2500); })

 	function slider() {
 		slide++;
 		next_slide(slide);
 	}

 	function next_slide(numSlide) {
 		var num_slide_visible = $('.slide__visible').index();

 		if ( slide_count == num_slide_visible ) {
 			slide = 0;
			numSlide = 0;
 		}

		num_slide.removeClass('slide__visible');
		num_slide.eq(numSlide).addClass('slide__visible');

		slider_control.removeClass('slider_control__active');
		slider_control.eq(numSlide).addClass('slider_control__active');
 	}

 	$('.slider_control li').click(function(){
 		slide = $(this).index();

 		num_slide.removeClass('slide__visible');
 		slider_control.removeClass('slider_control__active');
 		next_slide(slide);
 	});


	var slide_width = num_slide.width();

	num_slide.each(function(){
		var slide_img = $(this).find('img');
		var slide_img_width = $(this).find('img').width();

		if (slide_width < slide_img_width) {
			slide_img.css('left', (slide_img_width - slide_width) / 2);
		}
	});
	/************************************************************************************
	*************************************************************************************/


	$('.js_bnt_print').click(function(){
		print(document);
	});

	$('.js_last_video').click(function(){
		$('.last_video').removeClass('hide');
		$('.popular_video').addClass('hide');
	});

	$('.js_popular_video').click(function(){
		$('.last_video').addClass('hide');
		$('.popular_video').removeClass('hide');
	});

	/************************************************************************************
	Post Gallery
	*************************************************************************************/
	var galleryObj = $('.post_photo_carusel');
	var galleryContImg =  $('.post_photo_carusel_container');
	var elem = $('.post_photo_carusel_container ul li');
	var elemIndex;

	var galleryOption = {
		height: galleryContImg.outerHeight(),
 		count: elem.length,
 		numSlide: 0
	}
	elem.find('img').height(galleryOption.height);

	$('.prev_post_photo').click(function(){	fn_slide('prev'); });
	$('.next_post_photo').click(function(){ fn_slide('next'); });

	function fn_slide(ruh) {
		if (ruh == "prev") {
		 	if ( galleryOption.numSlide > 0) {
		 		galleryOption.numSlide--;

	 			elem.removeClass('gallery_slide__visible');
				elem.eq(galleryOption.numSlide).addClass('gallery_slide__visible');
		 	}
		}
		else {
		 	if ( elem.eq(galleryOption.numSlide + 1).length ) {
		 		galleryOption.numSlide++;

	 			elem.removeClass('gallery_slide__visible');
				elem.eq(galleryOption.numSlide).addClass('gallery_slide__visible');
		 	}
		}
		galleryObj.find('.num_post_photo').text(galleryOption.numSlide + 1 +'/' + galleryOption.count);
	}


	elem.click(function(){
		elemIndex = $(this).index();
		$('#mod_photo').parent().addClass('visible');
		$('#mod_photo').addClass('visible');
		fn_mod_photo();
	})





	function fn_mod_photo() {
		var width = $('#mod_photo .mod_content').width(),
			height = 0;

		for (var i = 0; i <= galleryOption.count - 1; i++) {
			var this_el_height = $('#mod_photo .mod_photo_container li').eq(i).height();
			if ( height < this_el_height ) {
				height = this_el_height;
			}
		};

		$('.mod_photo_container').css('width', width * 2 + 10 + 'px')
		$('.mod_photo_container > ul > li').css('width', width + 'px');
		$('.mod_photo_container > ul > li').css('height', height + 'px');
		$('.mod_photo_container > ul > li').css('display', 'none');

	 	galleryModObjCont.removeClass('mod_slide__visible');
		galleryModObjCont.eq(elemIndex).addClass('mod_slide__visible');

		fn_modal_center('#mod_photo');
	}

	$('.mod_prev_photo').click(function(){ fn_mod_slide('prev') });
	$('.mod_next_photo').click(function(){ fn_mod_slide('next')	});

	var galleryModObjCont = $('#mod_photo .mod_photo_container > ul > li');
	function fn_mod_slide(ruh) {
		if (ruh == "prev") {
			if (elemIndex > 0) {
				elemIndex--;
				galleryModObjCont.eq(elemIndex + 1).removeClass('mod_slide__visible');
				galleryModObjCont.eq(elemIndex).addClass('mod_slide__visible');
			}
		}
		else {
		 	if ( galleryModObjCont.eq(elemIndex + 1).length ) {
		 		elemIndex++;

	 			galleryModObjCont.eq(elemIndex - 1).removeClass('mod_slide__visible');
				galleryModObjCont.eq(elemIndex).addClass('mod_slide__visible');
		 	}
		}
		$('#mod_photo .mod_content .mod_num_photo').text(elemIndex + 1 +'/' + galleryOption.count);
	}








	$('.js-show-menu').click(function(){
		var menuH = parseInt($('.js-menu').height());

		$('.header__info').animate({
			'height': 48 + menuH
		}, 500);

		$('.js-menu').css('visibility', 'visible');
	});


});






