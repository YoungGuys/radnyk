$(document).ready(function() {

	/*************************************
				перезавантаження
	*************************************/
	$('.js-reload').click(function(){
		location.reload();
	});

	/*************************************/
	var body = $('body');

	/************************************************************************************
	 Modall
	 *************************************************************************************/
	var blocked = false;

	//закриття модального вікна при кліку на modal_bg
	$('.modal_bg').click(function(event){
		if (!blocked) {
			e = event || window.event
			if (e.target == this) {
				if ( confirm("Закрити вікно?") ) {
					$('.wrap').removeClass('is-blur');
					$(this).removeClass('visible');
					$(this).find('.modal_window').removeClass('visible');
					$(this).find('.modal_window').css('display', 'none');
					body.css({
						'overflow': 'auto',
						'margin-right': 0
					});
				}
			}
		}
	});

	//закриття модального вікна кл. "ESC"
	body.keydown(function(e){
		if ( (e.which == 27) || (e.keyCode == 27) ) {
			$('.wrap').removeClass('is-blur');
			$('.modal_bg').removeClass('visible');
			$('.modal_window')
				.removeClass('visible')
				.css('display', 'none');
		}
	});

	$('.modal_window .ok').click(function() {
		var _this = $(this);
		blocked = false;
		closeModalOk(_this);
	});
	$('.js-close_modal').click(function() {
		var _this = $(this);
		blocked = false;
		closeModalOk(_this);
	});

	$('.modal_window .i-close').click(function() {
		var _this = $(this);
		closeModal(_this);
	});

	//центруємо вікна при завантаженні сторінки
	$('.modal_window').each(function (i, elem) {
		fn_modal_center(elem);
	});

	//виклик модального вікна
	body.on('click', '.js_mod', function(e){
		e.preventDefault();

		var _this = $(this);
		fn_openModal(_this);
	});

	body.on('click', '.js_mod_close', function(e){
		var _this = $(this);
		closeModal(_this);
	});





/*
	$('body').on( 'click', '.modal_window textarea', function() {
		$('.mod-ckeditor').css('display', 'block');
		$('.mod-ckeditor').animate({'opacity' : '1'}, 200);
		$('.mod-ckeditor .modal_window').css('display', 'inline-block');
		openModal_window();
		var text = $(this).text();
		CKEDITOR.instances['editor1'].insertText(text);
	});

	$('.ok-ck').click(function(){
		var text_ckeditor = CKEDITOR.instances['editor1'].getData();
		$('.modal_window .text-area').html(' ');
		$('.modal_window .text-area').text(text_ckeditor);
	});
*/
	/*************************************/

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
	var elem = $('.post_photo_carusel_container__item');
	var elemText = $('.author_post_photo__item');
	var elemIndex;

	var galleryOption = {
		height: galleryContImg.outerHeight(),
 		count: elem.length,
 		numSlide: 0
	};

	elem.eq(galleryOption.numSlide).addClass('is-visible');
	elemText.eq(galleryOption.numSlide).addClass('is-visible');

	elem.find('img').height(galleryOption.height);
	$('.prev_post_photo').click(function(){	fn_slide('prev'); });

	$('.next_post_photo').click(function(){ fn_slide('next'); });
	function fn_slide(ruh) {
		if (ruh == "prev") {
			if ( galleryOption.numSlide > 0) {
				galleryOption.numSlide--;
			}
		}
		else {
			if ( elem.eq(galleryOption.numSlide + 1).length ) {
				galleryOption.numSlide++;
			}
		}

		elem.removeClass('is-visible');
		elem.eq(galleryOption.numSlide).addClass('is-visible');

		elemText.removeClass('is-visible');
		elemText.eq(galleryOption.numSlide).addClass('is-visible');

		galleryObj.find('.num_post_photo').text(galleryOption.numSlide + 1 +'/' + galleryOption.count);
	}





	elem.click(function(){
		elemIndex = $(this).index();
		$('#mod_photo')
			.addClass('visible')
			.parent()
			.addClass('visible');
		fn_mod_photo();
	});





	function fn_mod_photo() {
		var width = $('#mod_photo .mod_content').width(),
			height = 0;

		for (var i = 0; i <= galleryOption.count - 1; i++) {
			var this_el_height = $('.mod_photo_container li').eq(i).height();
			if (height < this_el_height) {
				height = this_el_height;
			}
		}


		$('.mod_photo_container').css('width', width * 2 + 10 + 'px');

		$('.mod_photo_container > ul > li').css({
			'width': width + 'px',
			'height': height + 'px',
			'display': 'none'
		});

	 	galleryModObjCont.removeClass('mod_slide__visible');
		galleryModObjCont.eq(elemIndex).addClass('mod_slide__visible');

		fn_modal_center('#mod_photo');
	}

	$('.mod_prev_photo').click(function(){ fn_mod_slide('prev') });
	$('.mod_next_photo').click(function(){ fn_mod_slide('next')	});

	var galleryModObjCont = $('#mod_photo .mod_photo_container > ul > li');
	function fn_mod_slide(ruh) {
		if (ruh == "prev") {
		 	if ( elemIndex > 0) {
		 		elemIndex--;
		 	}
		}
		else {
		 	if ( galleryModObjCont.eq(elemIndex + 1).length ) {
		 		elemIndex++;
		 	}
		}

		galleryModObjCont.eq(elemIndex - 1).removeClass('mod_slide__visible');
		galleryModObjCont.eq(elemIndex).addClass('mod_slide__visible');

		$('.mod_num_photo').text(elemIndex + 1 +'/' + galleryOption.count);
	}





	body.on('click', '.fileUpload', function(){
		$('.file_upld__src').removeClass('is-visible');
	});

	body.on('change', '.fileUpload', function(){
		var _this = $(this);

		if (_this.val() != '') {
			_this.parent().find('.file_upld__src').text( _this.val().split('\\')[2] );
			$('.file_upld__src').addClass('is-visible');
		}
		else {
			$('.file_upld__src').removeClass('is-visible');
		}
	});



	$('.js-sendAdvice').submit(function(e){
		e.preventDefault();

		var form = $(this);
		var type = $(this).parents('.modal_window').find('.mod_advice__title').text();

		$.ajax({
			type: 'POST',
			url: 'sendmessage.php',
			data: form.serialize() + "&type=" + type,
			success: function(data) {
				if(data == "true") {
					form.find('[name="name"]')   .val('');
					form.find('[name="email"]')  .val('');
					form.find('[name="message"]').val('');

					closeModalId('mod_addAdvice');
					closeModalId('mod_getAdvice');
					fn_openModalId('mod_ok');
				}
			}
		});
	});


	var footerNews = setInterval(footerNextNews,1000);

	var footerNewsSlideNum = 0;
	var footerNewsSlideCount = $('.footer-news__item').length;

	$('.footer-news__item').eq(footerNewsSlideNum).addClass('is-active');

	function footerNextNews() {
		footerNewsSlideNum++;

		if (footerNewsSlideNum < footerNewsSlideCount) {
			footerNewsSlideNum = 0;
		}

		$('.footer-news__item').eq(footerNewsSlideNum);
	}


});







//відкриття модального вікна, пошук назви вікна "js_mod_" + name
//відкриває віно з id = "mod_" + name
function fn_openModal(elem) {
	var class_list = $(elem).attr('class').split(/\s+/);

	for (var i = 0; i < class_list.length; i++) {
		var reg_search = class_list[i].search(/js_mod_\w+/),
			reg_match = class_list[i].match(/js_mod_\w+/);
		if ( !reg_search ) {
			var name_window = new String(reg_match).split('_');
			var el = 'mod_' + name_window[2];

			fn_openModalId(el);
		}
	}
}



function fn_openModalId(name_modalId) {
	var el = '#' + name_modalId;

	$('.wrap').addClass('is-blur');
	fn_modal_center(el);
	var w_scroll = fn_scroll();
	$('body').css({
		'overflow': 'hidden',
		'margin-right': w_scroll
	});
	$(el).css('display','table');
	$(el).parent().addClass('visible');
	$(el).addClass('visible');

	if ( $(el).hasClass('is-blocked') ) {
		blocked = true;
	}
}

function closeModal(_this) {
	$('.wrap').removeClass('is-blur');

	_this.parents('.modal_window')
		.removeClass('visible')
		.css('display', 'none');

	_this.parent()
		.parent()
		.removeClass('visible');

	$('body').css({
		'overflow': 'auto',
		'margin-right': 0
	});
}


function closeModalId(id) {
	$('.wrap').removeClass('is-blur');

	$('#' + id)
		.removeClass('visible')
		.css('display', 'none');

	$('#' + id)
		.parent()
		.removeClass('visible');

	$('body').css({
		'overflow': 'auto',
		'margin-right': 0
	});
}


function closeModalOk(_this) {
	$('.wrap').removeClass('is-blur');

	_this
		.parents('.modal_window')
		.removeClass('visible')
		.css('display', 'none');

	_this
		.parents('.modal_bg')
		.removeClass('visible');

	$('body').css({
		'overflow': 'auto',
		'margin-right': 0
	});
}








/*


***********************************************************************************
Modall
************************************************************************************

var blocked = false;
function closeModal() {
	$('.modal_bg').removeClass('visible');
	$('.modal_window').removeClass('visible');
}

//закриття модального вікна при кліку на modal_bg
$('.modal_bg').click(function(event){
	if (!blocked) {
		e = event || window.event
		if (e.target == this) {
			closeModal();
		}
	}
});

//закриття модального вікна кл. "ESC"
$('body').keydown(function(e){
	if ( (e.which == 27) || (e.keyCode == 27) ) {
		closeModal();
	}
});

$('.modal_window .ok')	   .click(function() { blocked = false; closeModal(); });
$('.modal_window .i-close').click(function() { closeModal(); });

//вирівнювання модального вікна по вертикалі
function fn_modal_center(elem) {
	var elem = $(elem);
	var elem_height = elem.outerHeight(),
		window_height = $(window).height(),
		document_height = $(document).height(),
		pos_scroll = document.body.scrollTop,
		elem_top;

	if ( elem_height < window_height + 50 ) {
		elem_top = (window_height - elem_height) / 2;
		elem.css('position','fixed');
		elem.css('top', 0 );
		elem.css('margin-top',elem_top);
	}
	else {
		elem.css('position','absolute');
		elem.css('top', pos_scroll );
		elem.css('margin-top',0);

		if ( pos_scroll > document_height - pos_scroll) {
			var new_pos = document_height - elem_height - 60;

			elem.css('top', new_pos);
			$('body').animate({scrollTop : new_pos},200);
		}
	}
}

//відкриття модального вікна, пошук назви вікна "js_mod_" + name
//відкриває віно з id = "mod_" + name
function fn_openModal(elem) {
	var class_list =$(elem).attr('class').split(/\s+/);

	for (var i = 0; i < class_list.length; i++) {
		var reg_search = class_list[i].search(/js_mod_\w+/),
			reg_match = class_list[i].match(/js_mod_\w+/);
		if ( !reg_search ) {
			var name_window = new String(reg_match).split('_');
			var el = '#mod_' + name_window[2] + '';

			fn_modal_center(el);
			$(el).parent().addClass('visible');
			$(el).addClass('visible');

			if ( $(el).hasClass('blocked') ) {
				blocked = true;
			}
		}
		else if ( ( !reg_search ) && ( i == 3) ) {
			alert('Даного модального вікна не має в DOM дереві!')
		}
	}
}

//вирівнювання модального вікна при зміні розмірів viewport
$(window).resize(function() {
	//fn_modal_center('.modal_window');
});

//центруємо вікна при завантаженні сторінки
$('.modal_window').each(function (i, elem) {
	fn_modal_center(elem);
});

	непогано б допілить
$(window).scroll(function(){
$('.modal_window').css('top', document.body.scrollTop);
})



//виклик модального вікна
$('.js_mod').click(function(e){
	e.preventDefault();

	var _this = $(this);
	fn_openModal(_this);
});
*/
