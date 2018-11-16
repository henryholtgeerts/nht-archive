<?php get_header('issue'); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php $issue_url = get_field('issue_url'); ?>

	<iframe id="nht-issue__frame" src="<?php echo $issue_url ?>" scrolling="no" frameborder="0"></iframe>
	
	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

<?php endif; ?>

<?php get_footer('issue');