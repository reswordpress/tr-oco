<?php get_header(); ?>
    
<div class="container pt-2 cs-style-6">
    <div class="row row-flex grid">
        <?php while (have_posts()) : the_post() ?>
            
            <?php // d((int)tr_posts_field('profile_picture')); ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-xl-6 p-0">
                <figure class="content p-0 effect-apollo">
                    <img src="http://lorempixel.com/1000/1000/nightlife/" class="mx-auto d-block img-fluid" alt="...">
                    <?php // wp_get_attachment_image((int)tr_posts_field('profile_picture')); ?>
                    <figcaption>
                        <h2><?= the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                        <a class="btn btn-xs btn-primary" href="<?= the_permalink(); ?>">View more</a>
                    </figcaption>			
                </figure>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
