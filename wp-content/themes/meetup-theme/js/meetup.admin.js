jQuery(document).ready(function($){

    var mediaUploader;
    var target_input;

    $('.image-upload-btn').on('click',function(e) {

        target_input = $(this).prev().attr('id');

        e.preventDefault();

        if(mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame =  wp.media({
            title: 'Select an Image',
            button: { text: 'Select Image' },
            multiple: false
        })

        mediaUploader.on('select', function () {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#' + target_input).val(attachment.url);
        });

        mediaUploader.open();
    });
})