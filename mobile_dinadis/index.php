<?php get_header(); ?>
<!-- header end -->
<div id="myCarousel" class="carousel slide top_slider" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/booking.jpg) no-repeat center;background-size:cover;">
			<div class="content">
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="box">
	  <h1 class="title"><?php the_title(); ?></h1>
	  <section>
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</section>
	</div>
</div>
<div class="parallax_box" data-parallax="scroll" data-image-src="<?php echo esc_url(get_template_directory_uri());?>/images/map.jpg">
	</div>
<?php get_footer(); ?>