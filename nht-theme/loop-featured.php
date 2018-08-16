<?php

/*
*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
*/

$post_objects = get_field('featured_stories');

if( $post_objects ): ?>
		<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>
		<div class="nht-card nht-card--story">
			<div class="nht-card__inner">

				<div class="nht-card__top">

					<div class="nht-card__overlay">
						<div class="nht-play-link" nht-player="true" rest-lookup="stories/<?php the_ID(); ?>" is-playing="false">
							<i class="fas fa-play"></i>
						</div>
						<div class="nht-card__runtime">
							<?php the_field('runtime'); ?>
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

	<?php endforeach; ?>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;