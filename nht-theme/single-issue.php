<?php get_header('issue'); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $issue_url = get_field('issue_url'); ?>

	<?php echo $issue_url ?>

	<iframe src="https://www.w3schools.com">
		<p>Your browser does not support iframes.</p>
	</iframe>

		<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

<?php endif; ?>

<?php get_footer('issue');