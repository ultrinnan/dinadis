<?php get_header();
?>
<!-- header end -->

<div id="myCarousel" class="carousel slide top_slider">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php
		$wp_query = new WP_Query();
		$wp_query->query('category_name=main_slider&p=6');
		while ($wp_query->have_posts()) : $wp_query->the_post();
		$more = get_option('more_button');
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		?>
		<div class="item active" style="background: url(<?php echo $large_image_url[0];?>) no-repeat center;background-size:cover;">
			<div class="content">
				<div class="title carousel-row-1"><?php the_title(); ?></div>
				<div id="item">
					<div class="more top-head-btn"><?=get_option('hotel_booking');?></div>
					<div id="item_hover">
						<a class="more top-head-btn" href="<?php home_url(); ?>booking-in-ukraine/"><?=get_option('booking_ukr');?></a>
						<a class="more top-head-btn" href="<?php home_url(); ?>booking-outside/"><?=get_option('booking_outside');?></a>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>

		<?php
		$wp_query = new WP_Query();
		$wp_query->query('p=12');
		while ($wp_query->have_posts()) : $wp_query->the_post();
		$more = get_option('more_button');
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		?>
		<div class="item" style="background: url(<?php echo $large_image_url[0];?>) no-repeat center;background-size:cover;">
			<div class="content">
				<div class="title carousel-row-1"><?php the_title(); ?></div>
				<div id="item">
					<div class="more top-head-btn"><?=get_option('tickets');?></div>
					<div id="item_hover">
						<a class="more top-head-btn" href="<?php home_url(); ?>air-tickets"><?=get_option('tickets_air');?></a>
						<a class="more top-head-btn" href="<?php home_url(); ?>railway-tickets"><?=get_option('tickets_rw');?></a>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>

		<?php
		$wp_query = new WP_Query();
		$wp_query->query('p=9');

		while ($wp_query->have_posts()) : $wp_query->the_post();
		$more = get_option('more_button');
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		?>
		<div class="item" style="background: url(<?php echo $large_image_url[0];?>) no-repeat center;background-size:cover;">
			<div class="content">
				<div class="title carousel-row-1"><?php the_title(); ?></div>
				<a class="more top-head-btn carousel-row-2" href="<?php the_permalink(); ?>"><?php echo $more;?></a>
			</div>
		</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1" class=""></li>
		<li data-target="#myCarousel" data-slide-to="2" class=""></li>
	</ol>
</div>

	<div class="content" id="about">
		<div class="box freetext">
			<?php
			$query = new WP_Query( 'pagename=about' );
			// The Loop
			while ( $query->have_posts() ) {
			$query->the_post();?>
				<div class="title"><?php the_title(); ?></div>
				<div class="text <?php if(get_post_gallery()): ?>gallery-block<?php endif; ?>">
        	<?php
        		the_content( '', FALSE );
        	?>
    		</div>
    		<?php }
    			wp_reset_postdata();
			$more = get_option('more_button');
			?>
			<a class="more" href="<?php home_url(); ?>about"><?php echo $more;?></a>
		</div>
	</div>

	<div class="parallax_box" data-parallax="scroll" data-image-src="<?php echo esc_url(get_template_directory_uri());?>/images/plane.jpeg">
	</div>

	<div class="content" id="services">
		<div class="box">
			<div class="title">услуги</div>
			<div class="services">
				<div id="booking" class="service">
					<div class="service_img hotel">
						
					</div>
					<div class="service_title">
						<?=get_option('hotel_booking');?>
					</div>
					<div id="booking_hover">
						<a class="more" href="<?php home_url(); ?>booking-in-ukraine/" data-mod="ukr"><?=get_option('booking_ukr');?></a>
						<a class="more" href="<?php home_url(); ?>booking-outside/" data-mod="outside"><?=get_option('booking_outside');?></a>
					</div>
				</div>
				<?php
				$query = new WP_Query( 'page_id=84' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="airplane">
						<div class="service_img airplane">
							
						</div>
						<div class="service_title">
							<?php the_title(); ?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>

				<?php
				$query = new WP_Query( 'page_id=86' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="train">
						<div class="service_img train">
							
						</div>
						<div class="service_title">
							<?php
							the_title();
							?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>

				<?php
				$query = new WP_Query( 'page_id=88' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="speaker">
						<div class="service_img speaker">
							
						</div>
						<div class="service_title">
							<?php the_title(); ?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>

				<?php
				$query = new WP_Query( 'page_id=90' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="car">
						<div class="service_img car">
							
						</div>
						<div class="service_title">
							<?php the_title();?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>

				<?php
				$query = new WP_Query( 'page_id=92' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="balloon">
						<div class="service_img balloon">
							
						</div>
						<div class="service_title">
							<?php the_title(); ?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>

				<?php
				$query = new WP_Query( 'page_id=94' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="relax">
						<div class="service_img relax">
							
						</div>
						<div class="service_title">
							<?php the_title(); ?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>

				<?php
				$query = new WP_Query( 'page_id=96' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="shield">
						<div class="service_img shield">
							
						</div>
						<div class="service_title">
							<?php the_title(); ?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>

				<?php
				$query = new WP_Query( 'page_id=98' ); 
				while ( $query->have_posts() ) {
				$query->the_post();?>
					<a href="<?php the_permalink(); ?>" class="service" data-mod="visa">
						<div class="service_img visa">
							
						</div>
						<div class="service_title">
							<?php the_title(); ?>
						</div>
					</a>
	    		<?php }
	    			wp_reset_postdata();
				?>
				
			</div>
		</div>
	</div>

	<div class="content">
		<div class="box">
			<div class="title"><?=get_option('portfolio_main');?></div>
			<div class="portfolio">
				<?php
				$query = new WP_Query( 'page_id=218' );
				while ( $query->have_posts() ) {
					add_filter('post_gallery', 'shortcode_gallery_portfolio', 10, 2);
					$query->the_post();?>
					<?php
					the_content();
					?>
				<?php }
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="box">
			<div class="title">партнерьI</div>
			<div class="partners">
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
				<div class="partner">
					<img src="<?php echo esc_url(get_template_directory_uri());?>/images/partner1.png" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="parallax_box" data-parallax="scroll" data-image-src="<?php echo esc_url(get_template_directory_uri());?>/images/map.jpg">
	</div>
<?php get_footer(); ?>