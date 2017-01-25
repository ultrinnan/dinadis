<?php 
/*
Template Name: 404
*/
get_header(); ?>
<!-- header end -->
<div id="myCarousel" class="carousel slide top_slider" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/booking.jpg) no-repeat center;background-size:cover;">
			<div class="content">
				<h1 class="title">404</h1>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="box">
		<h1>404</h1>
		<h3>К сожалению, запрашиваемая вами страница не найдена.</h3>
		<h4>Возможно, она была уделена или вы ввели неправильный адрес.<br>Перейдите на главную страницу или воспользуйтей поиском.</h4>
		<div><a class="news_read_more" href="/">Перейти на главную страницу</a></div>
	</div>
</div>
<div class="parallax_box" data-parallax="scroll" data-image-src="<?php echo esc_url(get_template_directory_uri());?>/images/map.jpg">
	</div>
<?php get_footer(); ?>
