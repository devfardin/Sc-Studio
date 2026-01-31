<?php

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
                                        <button class="faq_question" data-faq="<?php echo esc_attr($index); ?>">
                                            <?php echo esc_html($faq['question']); ?>
                                            <span class="faq_icon">+</span>
                                        </button>
                                        <div class="faq_answer" id="faq-<?php echo esc_attr($index); ?>">
                                            <?php echo wp_kses_post($faq['answer']); ?>
                                        </div>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <?php
            return ob_get_clean();
    }
}