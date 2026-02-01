<?php
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly.
}

class Single_service
{
    function __construct()
    {
        add_shortcode('rander_single_service', [$this, 'single_service']);
    }
    public function single_service($att)
    {
        ob_start();
        ?>
        <section class="sc-studio__single-service-content">
            <div class="sc-studio__container">
                <div class="sc-studio__single-service-wrapper">
                    <div class="service_description">
                        <?php echo esc_html(the_content()); ?>
                    </div>
                    <div class="section service_benefits">
                        <h2 class="service_benefits_title">
                            Fördelar
                        </h2>
                        <ul class="service_benefits_list">
                            <?php
                            $benefits = get_field('service_benefits');
                            if ($benefits):
                                foreach ($benefits as $benefit): ?>
                                    <li class="list_item">
                                        <i aria-hidden="true" class="icon icon-check"></i>
                                        <?php echo esc_html($benefit['benefit_item']); ?>
                                    </li>
                                <?php endforeach;
                            endif; ?>
                        </ul>
                    </div>

                    <div class="section services_faq">
                        <h2 class="service_faq_title">
                            Vanliga frågor
                        </h2>
                        <div class="service_faqs_list">
                            <?php
                            $faqs = get_field('service_faq');
                            if ($faqs):
                                foreach ($faqs as $index => $faq): ?>
                                    <div class="faq_item">
                                        <div class="faq_question" data-faq="<?php echo esc_attr($index); ?>">
                                            <?php echo esc_html($faq['question']); ?>
                                            <span class="faq_icon">+</span>
                                        </div>
                                        <div class="faq_answer" id="faq-<?php echo esc_attr($index); ?>">
                                            <?php echo wp_kses_post($faq['answer']); ?>
                                        </div>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>
                    </div>

                    <!-- call to action section -->
                    <div class="section service_cta">
                        <h2 class="service_cta_title">
                            Redo att boka din <span> <?php echo esc_html(get_the_title()); ?> </span>
                        </h2>
                        <p class="service_cta_des">
                            Boka din behandling med ett enkelt klick. Boka din behandling eller en kostnadsfri konsultation.
                        </p>
                        <div class="service_cta_btn_wrapper">

                            <a target="_balnk" href="<?php echo esc_url('https://www.bokadirekt.se/places/sc-studio-57260'); ?>" class="service_cta_button btn-primary">
                               Boka behandling
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact-us')); ?>"
                             class="service_cta_button_outline btn-primary">
                                Kontakta oss
                            </a>

                        </div>
                    </div>
                    <!-- /call to action section -->

                </div>
            </div>

            <?php
            return ob_get_clean();
    }
}