<?php
/*
Template Name: Exhibitions
*/
get_header(); ?>
<!-- header end -->
<div id="myCarousel" class="carousel slide top_slider" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/images/exib1.jpg) no-repeat center;background-size:cover;">
			<div class="content">
				<h1 class="title"><?=get_option('menu_exhib');?></h1>
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

<?php
$option_list = '';
$wp_query = new WP_Query();
$wp_query->query('category_name=exhibitions');
while ($wp_query->have_posts()) : $wp_query->the_post();
	$option_list .= the_title('<option>', '</option>', false);
endwhile;
wp_reset_postdata(); ?>

<div class="content">
	<div class="box">
	  <h1 class="title"><?=get_option('best_match');?></h1>
			<form action="" class="exhib_form clearfix">
				<div class="contact_form">
					<select name="exib_select" placeholder="Выбор выставки" required="required">
						<?=$option_list;?>
					</select>
					<input type="date" name="date" placeholder="Дата">
					<input type="number" name="room_count" placeholder="Количество номеров">
					<input type="number" name="guest_count" placeholder="Количество человек">
				</div>
				<div class="contact_form">
					<select name="budget" placeholder="Бюджет за номер в сутки">
						<option value="1">До 50 у.е.</option>
						<option value="2">50-100 у.е.</option>
						<option value="3">100 у.е. и выше</option>
					</select>
					<input type="text" name="phone" placeholder="Телефон">
					<input type="email" name="exhib_email" placeholder="E-mail" required="required">
					<input type="text" name="contact_person" placeholder="Контактное лицо" required="required">
				</div>
				<textarea class="textarea" name="exhib_comment" rows="4" placeholder="Дополнительная информация"></textarea>
				<span class="more" id="send_exib_form"><?=get_option('contact_button');?></span>
		  	</form>
	</div>
</div>

<div class="content" id="about">
	<div class="box">
		<div class="title"><?=get_option('exib_list');?></div>

			<div class="clearfix">
		<?php // Display blog posts on any page
$wp_query = new WP_Query();
$wp_query->query('category_name=exhibitions&showposts=4&paged='.$paged);

while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<a class="exhib_box" href="<?php the_permalink() ?>" rel="bookmark">
	<div class="exhib_date">
		<?php the_field('start_date'); ?> - <?php the_field('end_date'); ?>
	</div>
	<div class="shrink"></div>
	<div class="exhib_title">
		<?php the_title(); ?>
	</div>
	<div class="exhib_text">
		<?php the_content( '', FALSE );?>
	</div>
	<div class="shrink"></div>
	<div class="exhib_logo">
		<?php the_post_thumbnail();?>
	</div>
</a>

<?php endwhile; ?>
			</div>
	
<div class="pagination">
    <?php
    /*global $wp_query;*/

    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'prev_text'    => __('<'),
        'next_text'    => __('>')
    ) );
    ?>
</div>

<?php wp_reset_postdata(); ?>



	</div>
</div>

<div class="parallax_box" data-parallax="scroll" data-image-src="<?php echo esc_url(get_template_directory_uri());?>/images/exib2.jpg">
	</div>
<?php get_footer(); ?>