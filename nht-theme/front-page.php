<?php get_header(); 

$hero = get_field('billboard');	?>

	<div class="nht-main">
		<div class="nht-billboard">
			<div class="nht-billboard__overlay">
				<div class="nht-container">
					<div class="nht-billboard__title">
						<h2 style="color: <?php echo $hero['text_color']; ?>" ><?php echo $hero['sub_heading']; ?></h2>
						<?php if( $hero['heading_image'] ): ?>
							<img class="nht-billboard__image-heading" src="<?php echo $hero['heading_image']; ?>" style="margin: <?php echo $hero['heading_image_offset_y']; ?>% 0 0 <?php echo $hero['heading_image_offset_x']; ?>%;"></img>
						<?php else: ?>
							<h1 style="color: <?php echo $hero['text_color']; ?>"><?php echo $hero['heading']; ?></h1>
						<?php endif; ?>
					</div>
					<div class="nht-billboard__desc">
						<p style="color: <?php echo $hero['text_color']; ?>"><?php echo $hero['description']; ?></p>
					</div>
					<?php $post = $hero['cta_link'];
					setup_postdata( $post ); ?>
					<div class="nht-billboard__cta-area">
						<a class="nht-play-link nht-play-link--large" style="color: <?php echo $hero['text_color']; ?>; border-color: <?php echo $hero['text_color']; ?>;" href="<?php echo the_permalink(); ?>">
							<i class="fas fa-microphone"></i>
						</a>
						<a class="nht-billboard__cta-link" style="color: <?php echo $hero['text_color']; ?>" href="<?php echo the_permalink(); ?>">
						<?php echo $hero['cta_link_text']; ?>
						</a>
					</div>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				</div>
			</div>
			<div class="nht-billboard__bg" style="background-image: url(<?php echo $hero['background_image']; ?>); background-size: cover;"></div>
		</div>

		<div class="nht-container">

			<?php if( get_field('featured_stories') ):  ?>

			<div class='nht-heading'>
				<h3 class='nht-heading__text'>
					FEATURED STORIES
				</h3>
			</div>

			<div class="nht-row nht-row--three-by">
				<?php get_template_part('loop-featured'); ?>
			</div>

			<?php endif; ?>

			<?php if( get_field('past_issues') ):  ?>

			<div class='nht-heading'>
				<h3 class='nht-heading__text'>
					Past Issues
				</h3>
			</div>

			<div class="nht-row nht-row--three-by">
				<?php get_template_part('loop-past-issues'); ?>
			</div>

			<?php endif; ?>

			<div class='nht-heading'>
				<h3 class='nht-heading__text'>
					NEWS
				</h3>
			</div>

			<?php get_template_part('loop-news'); ?>
		</div>
    </div>

<?php get_footer(); ?>
