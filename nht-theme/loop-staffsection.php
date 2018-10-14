<?php

// check if the repeater field has rows of data
if( have_rows('staff_sections') ):

 	// loop through the rows of data
    while ( have_rows('staff_sections') ) : the_row(); ?>

        <?php if( have_rows('staff_section') ): 

            while( have_rows('staff_section') ): the_row(); 
    
            // vars
            $section_title = get_sub_field('section_title');
            $post_objects = get_sub_field('section_staff');
            
            ?>

            <div class="nht-row">
                <h3 class='nht-heading__text'>
                    <?php echo $section_title; ?>
                </h3>
            </div>

            <?php

            $post_objects = $section['section_staff'];

            if( $post_objects ): ?>
                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                    <div class="nht-card nht-card--story">
                        <div class="nht-card__inner">

                            <div class="nht-card__top">

                                <!-- post thumbnail -->
                                <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_post_thumbnail(array(180,180), ['class' => 'nht-card__img', 'title' => 'Feature image']); // Declare pixel size you need inside the array ?>
                                    </a>
                                <?php endif; ?>
                                <!-- /post thumbnail -->

                            </div>

                            <div class="nht-card__bottom">

                                <h6>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h6>

                                <p class="nht-card__excerpt"><?php the_excerpt(); ?></p>

                                <?php get_template_part('loop-producers'); ?>

                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>

            <?php endwhile; ?>

        <?php endif; ?>

    <?php endwhile;

else :

    // no rows found

endif;

?>