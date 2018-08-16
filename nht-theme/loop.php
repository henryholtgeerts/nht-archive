<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="nht-card nht-card--story">
			<div class="nht-card__inner">

				<div class="nht-card__top">

					<div class="nht-card__overlay">
						<div class="nht-play-link" nht-player="true" rest-lookup="stories/<?php the_ID(); ?>">
							<i class="fas fa-headphones"></i>
						</div>
						<div class="nht-card__runtime">
							7:44
						</div>
					</div>

					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(array(180,180), ['class' => 'nht-card__img', 'title' => 'Feature image']); // Declare pixel size you need inside the array ?>
						</a>
					<?php endif; ?>
					<!-- /post thumbnail -->

				</div>

				<div class="nht-card__bottom">

					<h6>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h6>

					<p class="nht-card__excerpt"><?php the_excerpt(); ?></p>

					<?php get_template_part('loop-producers'); ?>

				</div>

			</div>
		</div>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>