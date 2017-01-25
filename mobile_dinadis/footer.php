<!-- footer		 -->
<?php
$site_options = get_option('site_options');
?>
	<div class="content" id="contacts">
		<div class="box">
			<div class="title"><?=get_option('contact_form');?></div>
			<div class="contacts clearfix">
				<div class="contact_form">
				<form id="contact_form">
					<input type="text" name="name" placeholder="Имя" required>
					<input type="email" name="email" placeholder="E-mail" required>
					<input type="text" name="subject" placeholder="Тема" required>
					<textarea name="comment" rows="4" placeholder="Комментарий" required></textarea>
				</form>
				<span class="more" id="send_form"><?=get_option('contact_button');?></span>
					
				</div>
				<div class="contact_details">
					<div class="title">DINADIS Business Travel</div>
					<div class="cont_box"><?=$site_options['main_address'];?>
					</div>
					<div class="cont_box">
						тел: <?=$site_options['main_phone'];?><br>
						<?=$site_options['main_email'];?>
					</div>
					<div class="cont_box">
	       				<a target="_blank" href="<?=$site_options['facebook'];?>"><span class="social"><i class="fa fa-facebook"></i></span></a>
	        			<a target="_blank" href="<?=$site_options['google'];?>"><span class="social"><i class="fa fa-google"></i></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="map">
		<div class="map_mask"></div>
		<div class="map_box">
			<div id="map" style="width: 100%; height: 400px"></div>
			<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2543.6102936252646!2d30.613295551606377!3d50.392462899321224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c5c9fd52bfdd%3A0x39b9553c5f6e6f3a!2z0JfQsNCy0LDQu9GM0L3QsCDQstGD0LvQuNGG0Y8sIDEw0JEsINCa0LjRl9CyLCAwMjAwMA!5e0!3m2!1sru!2sua!4v1472056381375" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>-->
		</div>
	</div>

	<div class="footer">
		Copyright &copy; 2016. DINADIS Business Travel. www.DINADIS.ua
		<div class="footer_author">
	    	<a target="_blank" href="http://fedirko.pro"><img src="http://fedirko.pro/share/logo_small_bw.png" alt="FEDIRKO.PRO logo" title="created by FEDIRKO.PRO"></a>
		</div>
	</div>
	<?php wp_footer(); ?>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/js/parallax.min.js"></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/js/bootstrap.min.js"></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/fancybox/jquery.fancybox.js"></script>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/js/main.js"></script>
</body>
</html>