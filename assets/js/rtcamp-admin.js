jQuery(function ($) {

    $("#rtcamp-sortable").sortable();
    $("#rtcamp-sortable").disableSelection();

    // Add new slide button click append inside shortable list.
    $('#add-new-rtcamp-slide').click(function () {
        var slideHtml = $('#hidden-predefined-item').html();
        console.log(slideHtml);
        $('#rtcamp-sortable').append(slideHtml);
    });

    // remove item from shortlist.
    $('body').on('click', '.rtcamp-slidesshow-items .remove-icon', function () {
        if (confirm('Are you sure you want to delete this item?')) {
            $(this).parent('.item').remove();
        }
    })

    // Wp media gallery option.
    $('body').on('click', '.rtcamp-slidesshow-items .upload-button', function (e) {
        e.preventDefault();

        var $thisButton = $(this);
        var image = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
            .on('select', function () {
                // Get selected image
                var uploaded_image = image.state().get('selection').first();
                var image_url = uploaded_image.toJSON().url;

                // Set image URL to the corresponding input and display image
                $thisButton.siblings('.image-url').val(image_url);
                $thisButton.siblings('.preview-image').attr('src', image_url).show();
            });
    });


    // Submit slideshow form.

    $('#rtcamp-slide-form').submit(function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        formData += '&action=update_rtcamp_slideshow';

        jQuery.ajax({
            type: "POST",
            url: rtcamp_ajax_obj.ajax_url,
            data: formData,
            success: function (res) {
                alert(res.data)
            }
        });

    });

});