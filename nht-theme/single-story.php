<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="nht-main">
		<div class="nht-billboard nht-billboard--story">
			<div class="nht-billboard__overlay">
				<div class="nht-container">
					<div class="nht-story">
						<div class="nht-story__image">
							<!-- story thumbnail -->
							<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(); // Fullsize image for the single post ?>
								</a>
							<?php endif; ?>
							<!-- /story thumbnail -->
						</div>
						<div class="nht-story__title">
							<h3><?php the_title(); ?></h3>
						</div>
						<div class="nht-story__audio">
							<div class="nht-play-link" nht-player="true" rest-lookup="stories/<?php the_ID(); ?>" is-playing="false">
								<i class="fas fa-play"></i>
							</div>
							<div class="nht-story__runtime">
								<?php the_field('runtime'); ?>
							</div>
						</div>
						<div class="nht-story__credits">
							<?php get_template_part('loop-producers'); ?>
							<?php get_template_part('loop-illustration'); ?>
						</div>
						<div class="nht-story__excerpt">
							<?php the_content(); // Dynamic Content ?>
						</div>
						<div class="nht-story__meta">
							<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
						</div>
					</div>
				</div>
			</div>
			<div class="nht-billboard__bg"></div>
		</div>


		<div class="nht-container">
			<?php if( get_field('story_transcript') ):  ?>

			<div class='nht-heading'>
				<h3 class='nht-heading__text'>
					Transcript
				</h3>
			</div>

			<div class="nht-transcript" transcript-expanded="false">
				<?php echo get_field('story_transcript'); ?>
				<div class="nht-transcript__expand-section">
					<button class="nht-transcript__expand-button">
						Expand
					</button>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<?php endwhile; ?>

		<?php else: ?>

		<!-- article -->
		<div class="nht-container">

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</div>
		<!-- /article -->

		<?php endif; ?>

	</div>

<?php get_footer(); ?>
