<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	<div class="nht-card nht-card--issue">
		<div class="nht-card__inner">

			<div class="nht-card__top">

				<div class="nht-card__overlay">
					<div class="nht-play-link">
						<i class="fas fa-microphone"></i>
					</div>
				</div>

				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<?php the_post_thumbnail(array(180,180), ['class' => 'nht-card__img', 'title' => 'Feature image']); // Declare pixel size you need inside the array ?>
				<?php endif; ?>
				<!-- /post thumbnail -->

			</div>

		</div>
	</div>
</a>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article>
		<!-- /article -->

<?php endif; ?>