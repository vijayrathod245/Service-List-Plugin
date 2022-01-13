	<section class="slider-section">
        <div class="container">
            <div class="row">
				<?php 
                    $args = array(  
						'post_status' => 'publish',
						'post_type'=> 'service',
						'posts_per_page' => -1,  
					);
                    $loop = new WP_Query( $args ); 
                ?>
                <div class="w-100 slider">
                    <div class="owl-carousel owl-theme">
					<?php 
					
                        while ( $loop->have_posts() ) : $loop->the_post();			 
                        ?>
                        <div class="item">
                            <div class="slider-hover">
                                <div class="slider-img mb-50">
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                                    <img src="<?php echo $url ?>" class="img-info" alt="">
                                </div>
                                <div class="slider-content">
                                    <a href="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_price', true ) ); ?>" class="btn btn-1"><?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_name', true ) ); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                            <path
                                                d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
                                        </svg>
                                    </a>
                                    <h4 class="mb-20"><?php the_title();  ?></h4>
                                    <p class="w-70"><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
						<?php
                        endwhile;
                        wp_reset_postdata();
                        ?>	
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 50,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });
       
    </script>