$(document).ready(function(){
	setTimeout(function(){
		ymaps.ready(init);
		var myMap,
			myPlacemark;

		function init(){
			myMap = new ymaps.Map("map", {
				center: [50.39234957, 30.61545650],
				zoom: 17
			});
			myMap.controls.remove('searchControl');
			myMap.controls.remove('zoomControl');
			myMap.controls.remove('routeEditor');
			myMap.controls.remove('geolocationControl');
			myMap.controls.remove('typeSelector');
			myMap.controls.remove('rulerControl');
			myMap.controls.remove('trafficControl');

			myPlacemark = new ymaps.Placemark([50.39234957, 30.61545650], {
				/*hintContent: 'Москва!',
				 balloonContent: 'Столица России'*/
			});

			myMap.geoObjects.add(myPlacemark);
		}
	},6000);
    $(document).scroll(function(){
        if($(document).scrollTop() > 1000){
            if($('.totop-btn').hasClass('hide')){
                $('.totop-btn').removeClass('hide');
            }
        }
        else{
            if(!$('.totop-btn').hasClass('hide')){
                $('.totop-btn').addClass('hide');
            }
        }
        if(scrolldirection<$(document).scrollTop()){
            scrolldirection=$(document).scrollTop();
            menuScroll('down');
        }
        if(scrolldirection>$(document).scrollTop()){
            scrolldirection=$(document).scrollTop();
            menuScroll('up');
        }

    });
    $('.totop-btn').click(function(){
        $('body').animate({
            scrollTop: 0
        }, 300);
    });
	$(".portfolio-img-a, .wp-customgallery").fancybox();
	$(".news-modal").click(function(e){
		e.preventDefault();
		$('#modal-'+$(this).data('mod')).modal('show');
	});
	$('.text a, .box section a, .modal-body a').click(function(e){
		if($(this).children('img') && !$(this).hasClass('wp-customgallery')){
			e.preventDefault();
		}
	});
});
var scrolldirection = 0;
var topposition=0;
function menuScroll(dir){
	var block_height=$('.menu_box.down').height();
    var doc_h = $(document).height();
    var lvl = $('.offset-lvl').offset().top;
	if(dir=='down'){
		if((lvl) >= doc_h -($('.map').height()+$('.footer').height())){
			if(topposition==0){
				topposition=$('.map').height();
			}
			$('.menu_box.down').css({'position': 'absolute', 'bottom': topposition});
		}
	}else if(dir=='up'){
		if(lvl < doc_h -($('.map').height()+$('.footer').height())){
			topposition=0;
			$('.menu_box.down').css({'position': 'fixed', 'top': 'inherit', 'bottom': 0});
		}
	}
}
$('.languages li').click(function() {
	$('.cur_lang').text($(this).text());
});

$('.menu_main li').click(function() {
	$('.menu_main li').removeClass();
	$(this).addClass('current-menu-item');
});

var show_menu_time = 1000;
if(window.location.pathname==="/" || window.location.pathname==="/uk/" || window.location.pathname==="/en/"){
	show_menu_time = 5500;
}
setTimeout(function() {
	$('#myCarousel').carousel({
		pause: null
	});
	$('.right_menu').show().addClass('animated bounceInRight');
	$('.menu_box.down').show().addClass('animated bounceInUp');
	return false;
}, show_menu_time);

$('.career_title').click(function() {
	var is_active = false;
	if($(this).hasClass('active')){
		is_active = true;
	}
	$('.career_title').removeClass('active');
	$('.career_box').hide('slow');
	if(!is_active){
		$(this).addClass('active');
		$(this).next('.career_box').toggle('slow');
	}
});

$('.map_mask').click(function() {
	$(this).hide();
});

$('#send_form').click(function() {
	$("#contact_form").submit();	
});
$('#send_exib_form').click(function() {
	$(".exhib_form").submit();	
});

$("#contact_form").submit(function(e) {
	e.preventDefault();
	var name = $("input[name='name']").val();
	var email = $("input[name='email']").val();
	var subject = $("input[name='subject']").val();
	var comment = $("textarea[name='comment']").val();
	// console.log(comment);
	if (name != '' && email != '' && subject != '' && comment != '') {
		$.ajax({
			type: "POST",
			url: "../wp-content/themes/dinadis/admin/ajax_processor.php",
			// dataType: "json",	// Тип данных, в которых сервер должен прислать ответ
			data: "action=send&name="+name+"&subject="+subject+"&email="+email+"&comment="+comment,	// Строка POST-запроса
			error: function () {
				alert('При выполнении запроса произошла ошибка');
			},
			success: function ( data ) {
				// console.log(data);
				if (data != 'error') {
					$('#contact_form').trigger('reset');
					alert('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время.');
				} else {
					alert('При выполнении запроса на сервере произошла ошибка.');
				}
			}
		});
	}
});
$(".exhib_form").submit(function(e) {
	e.preventDefault();
	var contact_person = $("input[name='contact_person']").val();
	var phone = $("input[name='phone']").val();
	var email = $("input[name='exhib_email']").val();
	var date = $("input[name='date']").val();
	var room_count = $("input[name='room_count']").val();
	var guest_count = $("input[name='guest_count']").val();
	var subject = $("select[name='exib_select']").val();
	var comment = $("textarea[name='exhib_comment']").val();
	var budget = $("select[name='budget']").val();
	// console.log(comment);
	if (contact_person != '' && email != '' && subject != '' && comment != '') {
	console.log('click');

		$.ajax({
			type: "POST",
			url: "../wp-content/themes/dinadis/admin/ajax_processor.php",
			// dataType: "json",	// Тип данных, в которых сервер должен прислать ответ
			data: "action=exhib_send&contact_person="+contact_person+"&subject="+subject+"&phone="+phone+"&email="+email+"&comment="+comment+"&date="+date+"&room_count="+room_count+"&guest_count="+guest_count+"&budget="+budget,	// Строка POST-запроса
			error: function () {
				alert('При выполнении запроса произошла ошибка');
			},
			success: function ( data ) {
				// console.log(data);
				if (data != 'error') {
					$('.exhib_form ').trigger('reset');
					alert('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время.');
				} else {
					alert('При выполнении запроса на сервере произошла ошибка.');
				}
			}
		});
	}
});