<?php
$csv_options = 'csv_options'; // это часть URL страницы
 
/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function csv_options() {
	global $csv_options;
	add_menu_page( 'CSV parser', 'CSV parser', 'manage_options', $csv_options, 'csv_options_content', 'dashicons-admin-generic'); 
	//картинки тут - https://developer.wordpress.org/resource/dashicons/#slides
}
add_action('admin_menu', 'csv_options');
 
/**
 * Возвратная функция (Callback)
 */
function csv_options_content(){
		// var_dump('<pre>');
	$status = '';
	if ($_POST || $_FILES) {
		// var_dump($_POST);
		// var_dump($_FILES['csv']);

		// $separator = $_POST['separator'];
		$file = $_FILES['csv'];

		$uploaddir = dirname(__DIR__).'/json/';
		if (!file_exists($uploaddir)) {
		    mkdir($uploaddir, 0755, true);
		}
		// var_dump($uploaddir);

		$csv = file_get_contents($file['tmp_name']);
		$all = explode("\n", $csv);
		$keys = explode('|', $all[0]);
		array_shift($all);
		$data = [];
		foreach ($all as $item) {
			$data[] = explode('|', $item);
		}

		$result = '[';
		foreach ($data as $item) {
			foreach ($item as &$item2) {
				if ($item2 == '') {
					$item2 = '""';
				}
			}
			$result_str = implode(',', $item);
			$result_str = rtrim(trim($result_str), ",");
			$result .= '[' . $result_str . '],';
		}
		$result .= ']';

		if (file_exists ($uploaddir . 'csv.json')) {
			file_put_contents($uploaddir . 'csv_' . date('d_m_Y_h_i_s', time()) . '.json', file_get_contents($uploaddir . 'csv.json'));
			$status .= 'Old JSON stored in - ' . $uploaddir . 'csv_' . date('d_m_Y_h_i_s', time()) . '.json<br>';
		}

		if (file_put_contents($uploaddir . 'csv.json', print_r($result, true))) {
			$status .= 'New JSON generated successfully. Stored in - ' . $uploaddir . 'csv.json<br>';
		}

	}

	// $result = get_option('csv_options');

	// var_dump($result);
	// var_dump('</pre>');
	// phpinfo();
	?>
		<div class="wrap">
		<h1>Parse CSV to JSON</h1>
		<h4 style="color:green;"><?=$status;?></h4>
		
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label for="csv">Upload CSV:</label>
				<input type="file" class="form-control" id="csv" name="csv" accept=".csv" >
			</div>

			<!-- <div class="form-group">
				<label for="separator">Separator:</label>
				<input type="text" class="form-control" id="separator" name="separator" value="|">
			</div> -->
			
			<input type="submit" class="button-primary fixed_save" value="<?php _e('Save Changes') ?>" />
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

		</form>
	</div>
<?php
}