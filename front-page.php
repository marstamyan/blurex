<?php get_header( 'main' ) ?>
<?php
$design_cat = get_category( 3 );
if ( $design_cat ) :
	$posts = get_posts( array(
		"numberposts" => 3,
		"category"    => 3,
	) );
	if ( $posts ) :
		?>
        <section class="watch-section" id="about" <?php echo blurex_acf_image( 'section_bg', $design_cat ); ?>>
            <div class="container">
                <div class="row">
                    <!-- my tab -->
                    <div class="col-lg-6">
						<?php if ( get_field( "section_header", $design_cat ) ) : ?>
                            <h3><?php echo the_field( "section_header", $design_cat ); ?></h3>
						<?php endif ?>
						<?php if ( $design_cat->description ) : ?>
                            <h2><?php echo $design_cat->description; ?></h2>
						<?php endif ?>
                        <br>
                        <ul class="nav nav-pills" id="myTab" role="tablist">
							<?php
							$data = [];
							$i = 0;
							foreach ( $posts as $post ) :
								setup_postdata( $post );
								$data[ $i ]["post_name"] = $post->post_name;
								$data[ $i ]["url"] = get_the_permalink();
								$data[ $i ]["content"] = get_the_content( '' );
								//print_r($data);
								?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ( ! $i )
										echo 'active' ?>" id="<?php echo $post->post_name ?>-tab"
                                       data-toggle="tab" href="#<?php echo $post->post_name ?>" role="tab"
                                       aria-controls="<?php echo $post->post_name ?>" aria-selected="<?php if ( ! $i ) {
										echo 'true';
									} else echo 'false' ?>"><?php the_title(); ?></a>
                                </li>

								<?php $i ++;
							endforeach; ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
							<?php foreach ( $data as $key => $value ) : ?>
                                <div class="tab-pane fade show  <?php if ( ! $key )
									echo 'active' ?>"
                                     id="<?php echo $value["post_name"] ?>" role="tabpanel"
                                     aria-labelledby="<?php echo $value["post_name"]; ?>-tab">
									<?php echo $value["content"] ?>
                                    <button class="btn pink pink-shadow"><a href="<?php echo $value["url"] ?>">
											<?php echo __( "Read More", "Bluerex" ); ?></a></button>
                                </div>
							<?php endforeach; ?>
                        </div>
                    </div>
                    <!-- my tab -->

                    <div class="col-lg-6 text-center">
						<?php if ( get_field( "section_img", $design_cat ) ) : ?>
                            <img class="watch-img" src="<?php the_field( "section_img", $design_cat ) ?>" alt="watch">
						<?php endif ?>
                    </div>
                </div>
            </div>
        </section>
		<?php wp_reset_postdata();
		unset( $data, $posts );
	endif;
endif; //end section watch
?>
<?php $posts = get_posts( array(
	"numberposts" => 3,
	"category"    => 4,
) );
if ( $posts ) : ?>
    <section class="statistics">
        <div class="container">
            <div class="row">
				<?php foreach ( $posts as $post ) : ?>
                    <div class="col-lg-4">
                        <div class="statistics-item">
                            <img src="<?php echo get_the_post_thumbnail_url( $post, 'thumbnail' ) ?>"
                                 class="statistics-item__image" alt="megafone">
							<?php echo $post->post_content; ?>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
	<?php unset( $posts );
endif // end progress
?>
<?php $lets_cat = get_category( 5 );
if ( $lets_cat ) :
	?>
    <section class="lets text-center" id="features">
        <div class="container wrapper">
            <div class="row">
                <div class="col-md-12 ">
                    <h3><?php echo $lets_cat->name; ?></h3>
					<?php if ( get_field( "section_header", $lets_cat ) ) : ?>
                        <h2><?php the_field( "section_header", $lets_cat ) ?></h2>
					<?php endif ?>
					<?php if ( $lets_cat->description ) : ?>
                        <p>
							<?php echo $lets_cat->description ?>
                        </p>
					<?php endif ?>
                    <button class="btn pink pink-shadow"><a href="<?php echo get_category_link( 5 ) ?>">Read More</a>
                    </button>
                </div>
            </div>
        </div>
    </section>
<?php endif //end let's grow
?>
<?php $creative_agency_cat = get_category( 6 );
if ( $creative_agency_cat ) :
	$posts = get_posts( array(
		"numberposts" => 2,
		"category"    => 6,
	) )
	?>
    <section class="ideas">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3><?php echo $creative_agency_cat->name ?></h3>
					<?php if ( get_field( "section_header", $creative_agency_cat ) ) : ?>
                        <h2><?php the_field( "section_header", $creative_agency_cat ) ?></h2>
					<?php endif ?>
					<?php if ( $creative_agency_cat->description ) : ?>
                        <p>
							<?php echo $creative_agency_cat->description ?>
                        </p>
					<?php endif ?>
					<?php if ( $posts ) : ?>
                        <div class="ideas-inner">
							<?php foreach ( $posts as $post ) :
								setup_postdata( $post ) ?>
                                <div class="ideas-inner__elem">
                                    <img src="<?php echo get_the_post_thumbnail_url( $post, 'thumbnail' ) ?>"
                                         class="ideas-img"
                                         alt="ask">
                                    <h4><?php echo $post->post_title ?></h4>
                                    <p>
										<?php the_content( '' ) ?>
                                    </p>
                                    <button class="btn pink pink-shadow"><a
                                                href="<?php the_permalink( $post ) ?>"><?php echo __( "Read More", "bluerex" ) ?></a>
                                    </button>
                                </div>
							<?php endforeach ?>
                        </div>
						<?php unset( $posts );
						wp_reset_postdata();
					endif ?>
                </div>
                <div class="col-lg-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video widht="557px" height="462px" controls
                               src="<?php the_field( "section_video", $creative_agency_cat ) ?>"
                               poster="<?php bloginfo( template_url ) ?>/assets/img/video-pic.png"></video>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif // let's grow end
?>
<?php
$work_cat = get_category( 7 );
if ( $work_cat ) {
	$posts = get_posts( array(
		"numberposts" => 3,
		"category"    => 7,
	) );
}
?>
    <section class="works" id="product">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
					<?php if ( $work_cat->name ) : ?>
                        <h2><?php echo $work_cat->name ?></h2>
					<?php endif ?>
					<?php if ( $work_cat->description ) : ?>
                        <p>
							<?php echo $work_cat->description ?>
                        </p>
					<?php endif ?>
                </div>
            </div>
            <div class="col-md-12">
                <ul class="nav nav-pills justify-content-center" id="myTab-gallery" role="tablist">
					<?php
					$data = [];
					$i = 0;
					foreach ( $posts as $post ) :
						setup_postdata( $post );
						$data[ $i ]["post_name"] = $post->post_name;
						$data[ $i ]["url"] = get_the_permalink();
						$data[ $i ]["content"] = get_the_content( '' );
						//print_r($data);
						?>
                        <li class="nav-item">
                            <a class="nav-link <?php if ( ! $i )
								echo 'active' ?>" id="<?php echo $post->post_name ?>-tab"
                               data-toggle="tab" href="#<?php echo $post->post_name ?>" role="tab"
                               aria-controls="<?php echo $post->post_name ?>" aria-selected="<?php if ( ! $i ) {
								echo 'true';
							} else echo 'false' ?>"><?php the_title(); ?></a>
                        </li>

						<?php $i ++;
					endforeach; ?>
                </ul>
                <div class="tab-content" id="myTabContent2">
					<?php foreach ( $data as $key => $value ) : ?>
                        <div class="tab-pane fade show  <?php if ( ! $key )
							echo 'active' ?>"
                             id="<?php echo $value["post_name"] ?>" role="tabpanel"
                             aria-labelledby="<?php echo $value["post_name"]; ?>-tab">
							<?php echo $value["content"] ?>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
        </div>
		<?php wp_reset_postdata();
		unset( $data, $posts ); ?>
    </section>
    <section class="brands">
        <div class="container">
            <div class="row align-items-center text-center first-brand">
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/cisco.png"
                         alt="cisco">
                </div>
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/adidas.png"
                         alt="adidas">
                </div>
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/lenovo.png"
                         alt="lenovo">
                </div>
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/disney.png"
                         alt="disney">
                </div>
            </div>
            <div class="row align-items-end text-center">
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/amazon.png"
                         alt="amazon">
                </div>
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/puma.png"
                         alt="puma">
                </div>
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/apple.png"
                         alt="apple">
                </div>
                <div class="col-md-3 col-sm-6">
                    <img class="brands-item" src="<?php bloginfo( template_url ) ?>/assets/img/brands/mini.png"
                         alt="mini">
                </div>
            </div>
        </div>
    </section>
<?php $posts = get_posts( array(
	"post_type" => "reviews",
) );
if ( $posts ) :
	?>
    <section class="review" id="reviews-block">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
				<?php for ( $i = 0; $i < count( $posts ); $i ++ ) : ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i ?>"
						<?php if ( ! $i )
							echo 'class="active"' ?>></li>
				<?php endfor ?>
            </ol>
            <div class="carousel-inner">
				<?php $i = 0;
				foreach ( $posts as $post ) : ?>
                    <div class="carousel-item <?php if ( ! $i )
						echo "active" ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-7">
									<?php if ( $post->post_title ) : ?>
                                        <h3><?php echo $post->post_title ?></h3>
									<?php endif ?>
									<?php if ( get_field( 'review_header' ) ) : ?>
                                        <h2><?php echo the_field( 'review_header' ) ?></h2>
									<?php endif ?>
									<?php if ( $post->post_content ) : ?>
                                        <p>
											<?php echo $post->post_content ?>
                                        </p>
									<?php endif ?>
                                    <span class="review-rating">
								<img src="<?php bloginfo( template_url ) ?>/assets/img/5star.png" alt="5 star">
							</span>
									<?php if ( get_field( 'review_author' ) ) : ?>
                                        <span class="review-autor"><?php echo the_field( 'review_author' ) ?></span>
									<?php endif ?>
                                </div>
                                <div class="col-sm-5">
									<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
										<?php echo get_the_post_thumbnail( $post->ID, "full", array( 'class' => 'd-none d-sm-block review-author_img' ) ) ?>
									<?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php $i ++;
				endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
<?php endif; ?>
<?php $contacts = get_post( 104 );
if ( $contacts ) : ?>
    <section class="form text-center" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
					<?php echo do_shortcode( $contacts->post_content ) ?>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<?php get_footer() ?>