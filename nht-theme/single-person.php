<?php get_header(); ?>

<div class="nht-main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="nht-billboard nht-billboard--person">
			<div class="nht-billboard__overlay">
				<div class="nht-container">
					<div class="nht-person">
						<div class="nht-person__image">
							<!-- person thumbnail -->
							<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(); // Fullsize image for the single post ?>
								</a>
							<?php endif; ?>
							<!-- /person thumbnail -->
						</div>
						<div class="nht-person__title">
							<h3><?php the_title(); ?></h3>
						</div>
						<div class="nht-person__excerpt">
							<?php the_content(); // Dynamic Content ?>
						</div>
						<div class="nht-person__meta">
							<p>Role: <?php the_field('role'); ?></p>
							<p>Year: <?php the_field('year'); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="nht-billboard__bg"></div>
		</div>


		<div class="nht-container">
			<div class='nht-heading'>
				<h3 class='nht-heading__text'>
					Stories
				</h3>
			</div>

			<div class="nht-row nht-row--three-by">
				<?php get_template_part('loop-stories'); ?>
			</div>
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

</div>

<?php get_footer(); ?>
