$(document).ready(function () {

    $(".news-type-select").change(function () {

        if ($(this).val() === "image") {

            $(".video-url-container").hide();
            $(".image-upload-container").fadeIn();

        } else if ($(this).val() === "video") {

            $(".image-upload-container").hide();
            $(".video-url-container").fadeIn();
        }
    })
})