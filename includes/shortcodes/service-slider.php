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
        $default = [
            'category_name' => '',
            'post_limit' => '',
        ];
        $att = shortcode_atts($default, $att);
        
        $query_args = [
            'post_type' => 'service',
            'posts_per_page' => !empty($att['post_limit']) ? intval($att['post_limit']) : -1,
            'post_status' => 'publish'
        ];
        
        if (!empty($att['category_name'])) {
            $query_args['tax_query'] = [
                [
                    'taxonomy' => 'service-category',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($att['category_name'])
                ]
            ];
        }
        
        $query = new WP_Query($query_args);
        if ($query->have_posts()):
            ob_start();
            ?>
            <section class="services-slider" aria-label="<?php esc_attr_e('Services', 'textdomain'); ?>">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php while ($query->have_posts()):
                            $query->the_post(); ?>
                            <article class="swiper-slide">
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="service-item" aria-label="<?php echo esc_attr(sprintf(__('Learn more about %s', 'textdomain'), get_the_title())); ?>">
                                    <div class="service-icon">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('medium', ['alt' => esc_attr(get_the_title())]); ?>
                                        <?php endif; ?>
                                    </div>
                                    <h3 class="service-title"><?php echo esc_html(get_the_title()); ?></h3>
                                </a>
                            </article>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>
            <?php
            wp_reset_postdata();
            return ob_get_clean();
        endif;
        wp_reset_postdata();
        return '';
    }
}