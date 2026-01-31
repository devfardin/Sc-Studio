<?php

if (!defined('ABSPATH')) {
    exit;
}

class Service_slider
{
    function __construct()
    {
        add_shortcode('rander_services_slider', [$this, 'services_slider']);
    }
    public function services_slider($att)
    {
        ob_start();
        $default = [
            'category_name' => '',
        ];
        $att = shortcode_atts($default, $att);
        
        $query_args = [
            'post_type' => 'service',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ];
        
        if (!empty($att['category_name'])) {
            $query_args['tax_query'] = [
                [
                    'taxonomy' => 'service-category',
                    'field' => 'slug',
                    'terms' => $att['category_name']
                ]
            ];
        }
        
        $query = new WP_Query($query_args);
        if ($query->have_posts()):
            ?>
            <div class="services-slider">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php while ($query->have_posts()):
                            $query->the_post(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo esc_url(the_permalink()) ?>" class="service-item">
                                    <div class="service-icon">
                                        <?php the_post_thumbnail('full'); ?>
                                    </div>
                                    <h3 class="service-title"><?php the_title(); ?></h3>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <?php
        endif;
        wp_reset_postdata();
        return ob_get_clean();
    }
}