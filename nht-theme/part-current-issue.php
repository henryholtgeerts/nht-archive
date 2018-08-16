<?php

$post_object = get_field('current_issue');

if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 

	?>
    <div class='col-10 offset-1'>
		<a href='<?php the_permalink(); ?>'><img src='<?php the_field('issue_cover'); ?>' alt='<?php the_title(); ?>' id='index-issue-image'/></a>
	</div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>