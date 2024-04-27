<div class="rtcamp-slider-wrap">
    <?php if (!empty($rtcamp_slideshow_images)) : ?>
        <div class="owl-carousel">
            <?php foreach ($rtcamp_slideshow_images as $slider_image) : ?>
                <div class="item"><img src="<?php echo esc_url($slider_image); ?>" alt="Slider image"></div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <?php echo _e('No image found.', 'rtcamp-slideshow'); ?>
    <?php endif; ?>
</div>