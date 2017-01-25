<?php
/*
Template Name: News
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
		<div class="item active" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/news2.jpeg) no-repeat center;background-size:cover;">
			<div class="content">
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="box">
		<?php
		$wp_query = new WP_Query();
		$wp_query->query('category_name=news');

		while ($wp_query->have_posts()) : $wp_query->the_post();
		?>

			<div class="news_block clearfix">
				<div class="news_thumb">
					<a href="#" data-mod="<?php the_ID(); ?>" class="news-modal" rel="bookmark"><?php the_post_thumbnail();?></a>
				</div>
				<div class="news_short">
					<div class="news_short_title">
						<a href="#" data-mod="<?php the_ID(); ?>" class="news-modal" rel="bookmark"><?php the_title(); ?></a>
					</div>
					<div class="news_short_text">
						<?php
						global $mam_global_fix_this_more_link;
						$mam_global_fix_this_more_link = '<br><a href="#" class="news-modal" data-mod="'.get_the_ID().'"><span class="news_read_more">' . get_option('more_button') . '</span></a>';
						the_content();
						unset($mam_global_fix_this_more_link);
						?>
					</div>
					<div class="news_date">
						<?php the_time('d.m.Y'); ?>
					</div>
				</div>
			</div>
			<div class="modal fade" id="modal-<?php the_ID(); ?>">
				<div class="modal-dialog custom-modal">
					<div class="modal-content">
						<div class="modal-body custom-modal-body">
							<h4 class="modal-title modal-title-style"><? the_title(); ?></h4>
							<div class="clearfix"></div>
							<?php
							$content = get_extended( $post->post_content );
							$excerpt = $content['main'];
							$main_content = apply_filters('the_content', $content['extended']);
							echo $excerpt.$main_content;
							?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>

<div class="parallax_box" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/news3.jpg) no-repeat center; background-size:cover;">
	</div>


<?php get_footer(); ?>
