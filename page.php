<?php get_header() ?>

    <section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <article class="article-preview">
                            <h1><?php the_title() ?></h1>
                            <p><span class="article-date"><?php the_time( 'd.m.Y' ) ?></span></p>
                            <div class="article-excerpt">
								<?php if ( has_post_thumbnail() ) : ?>
                                    <div class="bluerex-thumb">
										<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'thumb' ) ) ?>
                                    </div>
								<?php endif; ?>
								<?php the_content( '' ) ?>
                            </div>
                        </article>
					<?php endwhile; ?>
					<?php else : ?>
                        <!-- no posts found -->
					<?php endif; ?>

                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
					<?php get_sidebar() ?>
                    <!-- /.sidebar-widget widget-categories -->
                </div>
                <!-- /.col-md-4 -->
            </div>
        </div>
    </section>
<?php get_footer() ?>