<?php 

// Generic archive page, includes content in a three-by row

get_header(); ?>
<div class="nht-main">
	<div class="nht-container">
		<div class="nht-heading nht-heading--page-top">
			<h3 class='nht-heading__text'>
				Archive
			</h3>
		</div>

		<div class="nht-row nht-row--three-by">
			<?php get_template_part('loop'); ?>
		</div>

		<?php get_template_part('pagination'); ?>
	</div>
</div>

<?php get_footer(); ?>
