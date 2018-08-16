<?php $custom_query = new WP_Query(array( 'post_type' => 'post' )); // exclude category 9 ?>
<?php if ($custom_query->have_posts()): while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

	<div class='row'>
        <div class='col-8 offset-2'>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <p class="announcements"><?php the_title(); ?></p>
            </a>
        </div>
    </div>

<?php endwhile; ?>

<?php else: ?>

<div class='row'>
     <div class='col-8 offset-2'>
         <p class="announcements">No news.</p>
     </div>
 </div>

<?php endif; ?>
<?php wp_reset_postdata(); // reset the query ?>