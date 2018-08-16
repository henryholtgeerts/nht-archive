<?php get_header(); ?>

    <div class="nht-main">
		<div class="nht-container">
			<div class="nht-heading nht-heading--page-top">
				<h3 class='nht-heading__text'>
				<?php the_title(); ?>
				</h3>
			</div>
		
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>

					<br class="clear">

					<?php edit_post_link(); ?>

				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<div class='row'>
					<div class='col-8 offset-2 text-justify'>
						<p class='announcements'>
							Sorry, nothing to display. :(
						</p>
					</div>
				</div>

			<?php endif; ?>

		</div>

    </div>

<?php get_footer(); ?>
