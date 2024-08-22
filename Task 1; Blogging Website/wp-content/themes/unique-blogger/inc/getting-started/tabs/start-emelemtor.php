<?php
/**
 * Start Elementor.
 *
 */
?>
<!-- Start Elementor -->
<div id="start-panel" class="panel-left visible">
    <div id="unique-blogger-importer" class="tabcontent open">
        <?php if(!class_exists('Mizan_Importer_ThemeWhizzie')){
            $plugin_ins = Unique_Blogger_Plugin_Activation_Mizan_Demo_Importor::get_instance();
            $unique_blogger_actions = $plugin_ins->recommended_actions;
            ?>
            <div class="unique-blogger-recommended-plugins ">
                <div class="unique-blogger-action-list">
                    <?php if ($unique_blogger_actions): foreach ($unique_blogger_actions as $key => $unique_blogger_actionValue): ?>
                            <div class="unique-blogger-action" id="<?php echo esc_attr($unique_blogger_actionValue['id']);?>">
                                <div class="action-inner plugin-activation-redirect">
                                    <h3 class="action-title"><?php echo esc_html($unique_blogger_actionValue['title']); ?></h3>
                                    <div class="action-desc"><?php echo esc_html($unique_blogger_actionValue['desc']); ?></div>
                                    <?php echo wp_kses_post($unique_blogger_actionValue['link']); ?>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="tab-outer-box">
                <h3><?php esc_html_e('Welcome to Mizan Themes', 'unique-blogger'); ?></h3>
                <p class="start-text"><?php esc_html_e('The demo will import after you click the Start Quickly button.', 'unique-blogger'); ?></p>
                <div class="info-link">
                    <a class="button button-primary" href="<?php echo esc_url( admin_url('admin.php?page=mizandemoimporter-wizard') ); ?>"><?php esc_html_e('Start Quickly', 'unique-blogger'); ?></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
