<?php

/*
*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
*/

$post_objects = get_field('past_issues');

if( $post_objects ): ?>
		<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>
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
							<?php the_post_thumbnail('large', ['class' => 'nht-card__img', 'title' => 'Feature image']); // Declare pixel size you need inside the array ?>
						<?php endif; ?>
						<!-- /post thumbnail -->

					</div>

				</div>
			</div>
		</a>
	<?php endforeach; ?>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;