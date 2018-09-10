<?php get_header('issue'); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $issue_html = get_field('issue_url'); ?>

    <?php echo $issue_html ?>

		<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

<?php endif; ?>

<?php get_footer('issue');