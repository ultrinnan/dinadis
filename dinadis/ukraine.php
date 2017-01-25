<?php
/*
Template Name: Ukraine
*/
get_header(); ?>
<!-- header end -->
<div id="myCarousel" class="carousel slide top_slider" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/ukraine.jpg) no-repeat center;background-size:cover;">
			<div class="content">
				<h1 class="title"><?=get_option('menu_ukraine');?></h1>
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
<div class="parallax_box" data-parallax="scroll" data-image-src="<?php echo esc_url(get_template_directory_uri());?>/images/dnepr.jpg">
	</div>

<div class="content" id="about">
	<div class="box">
		<?php
		$query = new WP_Query( 'pagename=kiev' ); 
		while ( $query->have_posts() ) {
		$query->the_post();?>
			<div class="title"><?php the_title(); ?></div>
			<section>
    	<?php
    		the_content( '', FALSE );
    	?>
		</section>
		<?php }
			wp_reset_postdata();
		?>
	</div>
</div>

<div class="content" id="about">
	<div class="box">
		<?php
		$query = new WP_Query( 'pagename=kharkov' ); 
		while ( $query->have_posts() ) {
		$query->the_post();?>
			<div class="title"><?php the_title(); ?></div>
			<section>
    	<?php
    		the_content( '', FALSE );
    	?>
		</section>
		<?php }
			wp_reset_postdata();
		?>
	</div>
</div>

<div class="content" id="about">
	<div class="box">
		<?php
		$query = new WP_Query( 'pagename=odessa' ); 
		while ( $query->have_posts() ) {
		$query->the_post();?>
			<div class="title"><?php the_title(); ?></div>
			<section>
    	<?php
    		the_content( '', FALSE );
    	?>
		</section>
		<?php }
			wp_reset_postdata();
		?>
	</div>
</div>

<div class="content" id="about">
	<div class="box">
		<?php
		$query = new WP_Query( 'pagename=dnepr' ); 
		while ( $query->have_posts() ) {
		$query->the_post();?>
			<div class="title"><?php the_title(); ?></div>
			<section>
    	<?php
    		the_content( '', FALSE );
    	?>
		</section>
		<?php }
			wp_reset_postdata();
		?>
	</div>
</div>

<div class="content" id="about">
	<div class="box">
		<?php
		$query = new WP_Query( 'pagename=lvov' ); 
		while ( $query->have_posts() ) {
		$query->the_post();?>
			<div class="title"><?php the_title(); ?></div>
			<section>
    	<?php
    		the_content( '', FALSE );
    	?>
		</section>
		<?php }
			wp_reset_postdata();
		?>
	</div>
</div>

<div class="parallax_box" data-parallax="scroll" data-image-src="<?php echo esc_url(get_template_directory_uri());?>/images/ukraine_land.jpg">
	</div>
<?php get_footer(); ?>