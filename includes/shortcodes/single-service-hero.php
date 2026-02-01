<?php
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly.
}

class Single_service_hero{
    function __construct()
    {
        add_shortcode('rander_single_service_hero', [$this, 'single_service_hero']);
    }
    public function single_service_hero($att)
    {
       ob_start();
        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
        <section class="sc-studio__hero" style="background-image: url('<?php echo esc_url($featured_image); ?>')">
            <div class="sc-studio__hero-overlay"></div>
            <div class="sc-studio__hero-content">
                <?php if (function_exists("rank_math_the_breadcrumbs")): ?>
                    <div class="sc-studio__breadcrumbs">
                        <?php rank_math_the_breadcrumbs(); ?>
                    </div>
                <?php endif; ?>
                <h1 class="sc-studio__hero-title"><?php echo esc_html(get_the_title()); ?></h1>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }
}