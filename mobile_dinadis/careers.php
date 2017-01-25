<?php
/*
Template Name: Careers
*/
get_header(); 
$send_cv = get_option('send_cv');?>
<!-- header end -->
<div id="myCarousel" class="carousel slide top_slider" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		?>
		<div class="item active" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/vacancy1.jpg) no-repeat center;background-size:cover;">
			<div class="content">
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="box">
		<div class="title"><?=get_option('cv_header');?></div>
		<?php
		$wp_query = new WP_Query();
		$wp_query->query('category_name=careers');

		while ($wp_query->have_posts()) : $wp_query->the_post();
		?>
			<h2 class="career_title"><?php the_title(); ?></h2>
			<div class="career_box">
				<div class="career_descr"><?php the_content(); ?></div>
				<a class="more career_aply" href="mailto:<?=$site_options['main_email'];?>"><?=$send_cv;?></a>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>

<div class="parallax_box" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/vacancy2.jpg) no-repeat center; background-size:cover;">
	</div>


<?php get_footer(); ?>