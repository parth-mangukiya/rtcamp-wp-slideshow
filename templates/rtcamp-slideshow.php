<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo esc_html(get_admin_page_title()); ?></h1>
    <a id="add-new-rtcamp-slide" href="#" class="page-title-action">Add New slide</a>
    <p><?php echo _e('When you add shortcode [myslideshow] to any page, it will be replaced by a slideshow of images uploaded here.', 'rtcamp-slideshow') ?></p>
    <div class="rtcamp-slidesshow-items">
        <div id="hidden-predefined-item">
            <div class="item ui-state-default">
                <div class="icon"><img src="<?php echo esc_url(rtcamp_get_icon('grip-dots'));; ?>" /></div>
                <div class="content">
                    <input class="image-url" type="hidden" name="image-url[]" value="">
                    <img class="preview-image" src="" style="max-width: 300px; max-height: 150px; display: none;">
                    <input type="button" class="upload-button button" value="Upload Image">
                </div>
                <div class="icon remove-icon"><img src="<?php echo esc_url(rtcamp_get_icon('trash'));; ?>" /></div>
            </div>
        </div>
        <form id="rtcamp-slide-form" method="POST" action="#">
            <?php wp_nonce_field('rtcamp_slideshow_form_action', 'rtcamp_slideshow_form'); ?>
            <div id="rtcamp-sortable">
                <?php if (!empty($rtcamp_slideshow_images)) : ?>
                    <?php foreach ($rtcamp_slideshow_images as $image) : ?>
                        <div class="item ui-state-default">
                            <div class="icon"><img src="<?php echo esc_url(rtcamp_get_icon('grip-dots'));; ?>" /></div>
                            <div class="content">
                                <input class="image-url" type="hidden" name="image-url[]" value="<?php echo esc_url($image); ?>">
                                <img class="preview-image" src="<?php echo esc_url($image); ?>" style="max-width: 300px; max-height: 150px;">
                                <input type="button" class="upload-button button" value="<?php _e('Upload Image', 'rtcamp-slideshow') ?>">
                            </div>
                            <div class="icon remove-icon"><img src="<?php echo esc_url(rtcamp_get_icon('trash'));; ?>" /></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button type="submit" class="button button-primary button-large media-button-select"><?php _e('Save', 'rtcamp-slideshow') ?></button>
        </form>
    </div>
</div>