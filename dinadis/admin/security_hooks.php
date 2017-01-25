<?php
//Запрет пингбэков и трэкбэков на самого себя start ---------------------------
function disable_self_ping( &$links ) {
  foreach ( $links as $l => $link )
    if ( 0 === strpos( $link, home_url() ) )
      unset($links[$l]);
}
add_action( 'pre_ping', 'disable_self_ping' );
//Запрет пингбэков и трэкбэков на самого себя end ---------------------------

//Скрываем версию WordPress start --------------------------
function remove_wp_version_wp_head_feed() {
  return '';
}
add_filter('the_generator', 'remove_wp_version_wp_head_feed');
//удаляем ридми, который тоже содержит версию
$file=$_SERVER['DOCUMENT_ROOT'].'/readme.html';
if (file_exists($file)) {
  unlink($file);
}
//Скрываем версию WordPress end --------------------------
?>