<?php
$language_options = 'language_options'; // это часть URL страницы
 
/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function language_options() {
	global $language_options;
	add_menu_page( 'Опции мультиязычности сайта', 'Мультиязычность', 'manage_options', $language_options, 'language_options_content', 'dashicons-admin-site'); 
	//картинки тут - https://developer.wordpress.org/resource/dashicons/#slides
}
add_action('admin_menu', 'language_options');
 
/**
 * Возвратная функция (Callback)
 */
function language_options_content(){
		// var_dump('<pre>');
	if ($_POST) {
		// var_dump($_POST);
		// var_dump('---');
		update_option('more_button', $_POST['more_button']);
		update_option('send_cv', $_POST['send_cv']);
		update_option('contact_button', $_POST['contact_button']);
		update_option('scroll', $_POST['scroll']);
		update_option('menu_about', $_POST['menu_about']);
		update_option('menu_services', $_POST['menu_services']);
		update_option('menu_contacts', $_POST['menu_contacts']);
		update_option('menu_ukraine', $_POST['menu_ukraine']);
		update_option('menu_news', $_POST['menu_news']);
		update_option('menu_exhib', $_POST['menu_exhib']);
		update_option('menu_careers', $_POST['menu_careers']);
		update_option('more_offers', $_POST['more_offers']);
		update_option('more_news', $_POST['more_news']);
		update_option('hotel_booking', $_POST['hotel_booking']);
		update_option('booking_ukr', $_POST['booking_ukr']);
		update_option('booking_outside', $_POST['booking_outside']);

		update_option('contact_form', $_POST['contact_form']);
		update_option('cv_header', $_POST['cv_header']);
		update_option('best_match', $_POST['best_match']);
		update_option('exib_list', $_POST['exib_list']);
		// var_dump($result);
	}

	$more_button = get_option('more_button');
	$send_cv = get_option('send_cv');
	$contact_button = get_option('contact_button');
	$scroll = get_option('scroll');
	$menu_about = get_option('menu_about');
	$menu_services = get_option('menu_services');
	$menu_contacts = get_option('menu_contacts');
	$menu_ukraine = get_option('menu_ukraine');
	$menu_news = get_option('menu_news');
	$menu_exhib = get_option('menu_exhib');
	$menu_careers = get_option('menu_careers');
	$more_offers = get_option('more_offers');
	$more_news = get_option('more_news');
	$hotel_booking = get_option('hotel_booking');
	$booking_ukr = get_option('booking_ukr');
	$booking_outside = get_option('booking_outside');

	$contact_form = get_option('contact_form');
	$cv_header = get_option('cv_header');
	$best_match = get_option('best_match');
	$exib_list = get_option('exib_list');

	// var_dump($result);
	// var_dump('</pre>');
	// phpinfo();
	?>
		<div class="wrap">
		<h1>Опции мультиязычности сайта</h1>
		
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<legend>Кнопки</legend>

				<label for="more_button">Подробнее:</label>
				<input type="text" class="form-control" id="more_button" name="more_button" value="<?=$more_button;?>">

				<label for="send_cv">Отправить резюме:</label>
				<input type="text" class="form-control" id="send_cv" name="send_cv" value="<?=$send_cv;?>">
				
				<label for="contact_button">Отправить:</label>
				<input type="text" class="form-control" id="contact_button" name="contact_button" value="<?=$contact_button;?>">

				<label for="scroll">Скрольте:</label>
				<input type="text" class="form-control" id="scroll" name="scroll" value="<?=$scroll;?>">

				<label for="more_news">Больше новостей:</label>
				<input type="text" class="form-control" id="more_news" name="more_news" value="<?=$more_news;?>">

				<label for="more_offers">Больше предложений:</label>
				<input type="text" class="form-control" id="more_offers" name="more_offers" value="<?=$more_offers;?>">

				<label for="hotel_booking">Бронирование отелей:</label>
				<input type="text" class="form-control" id="hotel_booking" name="hotel_booking" value="<?=$hotel_booking;?>">

				<label for="booking_ukr">В Украине:</label>
				<input type="text" class="form-control" id="booking_ukr" name="booking_ukr" value="<?=$booking_ukr;?>">

				<label for="booking_outside">За рубежом:</label>
				<input type="text" class="form-control" id="booking_outside" name="booking_outside" value="<?=$booking_outside;?>">
				
				<hr>

				<label for="menu_about">Меню О компании:</label>
				<input type="text" class="form-control" id="menu_about" name="menu_about" value="<?=$menu_about;?>">
				
				<label for="menu_services">Меню Услуги:</label>
				<input type="text" class="form-control" id="menu_services" name="menu_services" value="<?=$menu_services;?>">
				
				<label for="menu_contacts">Меню Контакты:</label>
				<input type="text" class="form-control" id="menu_contacts" name="menu_contacts" value="<?=$menu_contacts;?>">
				
				<hr>
				<label for="menu_ukraine">Меню про Украину:</label>
				<input type="text" class="form-control" id="menu_ukraine" name="menu_ukraine" value="<?=$menu_ukraine;?>">
				
				<label for="menu_news">Меню Новости:</label>
				<input type="text" class="form-control" id="menu_news" name="menu_news" value="<?=$menu_news;?>">
				
				<label for="menu_exhib">Меню Выставки:</label>
				<input type="text" class="form-control" id="menu_exhib" name="menu_exhib" value="<?=$menu_exhib;?>">

				<label for="menu_careers">Меню Вакансии:</label>
				<input type="text" class="form-control" id="menu_careers" name="menu_careers" value="<?=$menu_careers;?>">
			  
			</div>
			<div class="form-group">
				<legend>Заголовки</legend>

				<label for="cv_header">Вакансии:</label>
				<input type="text" class="form-control" id="cv_header" name="cv_header" value="<?=$cv_header;?>">

				<label for="contact_form">Контактная форма:</label>
				<input type="text" class="form-control" id="contact_form" name="contact_form" value="<?=$contact_form;?>">

				<label for="best_match">Подбор наиболее выгодных предложений:</label>
				<input type="text" class="form-control" id="best_match" name="best_match" value="<?=$best_match;?>">

				<label for="exib_list">Список выставок:</label>
				<input type="text" class="form-control" id="exib_list" name="exib_list" value="<?=$exib_list;?>">
			  
			</div>
			
			<input type="submit" class="button-primary fixed_save" value="<?php _e('Save Changes') ?>" />
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

		</form>
	</div>
<?php
}