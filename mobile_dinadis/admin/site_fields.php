<?php
$site_options = 'site_options'; // это часть URL страницы
 
/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function site_options() {
	global $site_options;
	add_menu_page( 'Дополнительные настройки сайта', 'Дополнительно', 'manage_options', $site_options, 'site_options_content', 'dashicons-admin-generic'); 
	//картинки тут - https://developer.wordpress.org/resource/dashicons/#slides
}
add_action('admin_menu', 'site_options');
 
/**
 * Возвратная функция (Callback)
 */
function site_options_content(){
		// var_dump('<pre>');
	if ($_POST) {
		// var_dump($_POST);
		// var_dump('---');
		$site_options = array();

		foreach ($_POST as $key => $value) {
			$site_options[$key] = $value;
		}

		$result = update_option('site_options', $site_options);
		// var_dump($result);
		unset($_POST);
	}

	$result = get_option('site_options');

	// var_dump($result);
	// var_dump('</pre>');
	// phpinfo();
	?>
		<div class="wrap">
		<h1>Дополнительные настройки сайта</h1>
		
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label for="main_phone">Основной телефон:</label>
				<input type="text" class="form-control" id="main_phone" name="main_phone" value="<?php echo $result['main_phone']?>">
			</div>
			<div class="form-group">
				<label for="main_email">Основной e-mail:</label>
				<input type="email" class="form-control" id="main_email" name="main_email" value="<?php echo $result['main_email']?>">
			</div>
			<div class="form-group">
				<label for="main_address">Адрес:</label>
				<textarea class="form-control" id="main_address" name="main_address"><?php echo $result['main_address']?></textarea>
			</div>

			<div class="form-group">
				<legend>Social media</legend>

				<label for="vk"><a target="_blank" href="<?php echo $result['vk']?>"><span class="social"><i class="fa fa-vk"></i></span></a> vk:</label>
				<input type="text" class="form-control" id="vk" name="vk" value="<?php echo $result['vk']?>">

				<label for="facebook"><a target="_blank" href="<?php echo $result['facebook']?>"><span class="social"><i class="fa fa-facebook"></i></span></a> Facebook:</label>
				<input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $result['facebook']?>">

				<label for="google"><a target="_blank" href="<?php echo $result['google']?>"><span class="social"><i class="fa fa-google"></i></span></a> Google+:</label>
				<input type="text" class="form-control" id="google" name="google" value="<?php echo $result['google']?>">
			  
			</div>

			<input type="submit" class="button-primary fixed_save" value="<?php _e('Save Changes') ?>" />
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

		</form>
	</div>
<?php
}