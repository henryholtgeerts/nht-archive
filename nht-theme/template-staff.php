<?php 

/* Template Name: Staff Page Tempalte */ 

get_header(); ?>

<div class="nht-main">
	<div class="nht-container nht-container--wide">
		<div class="nht-heading nht-heading--page-top">
			<h3 class='nht-heading__text'>
				<?php the_title(); ?>
			</h3>
		</div>

		<?php get_template_part('loop-staffsection'); ?>
	</div>
</div>

<?php get_footer(); ?>
