$(document).ready(function () {

    var base_url = $(".base_url").text();

    $(".app-menu > .has-submenu > ul > li").click(function (event) {

        var grandparent = ($(this).parent()).parent().attr("id");
        var parent      = $(this).parent().attr("id");
        var activeItem  = $(this).attr("id");
        var url         = $(this).find("a").attr("href");

        // alert(grandparent + " - " + parent + " - " + activeItem + " - " + url);

        $.post(base_url + "dashboard/setActiveMenu", {grandparent:grandparent, parent:parent, activeItem:activeItem}, function (response) {})

        event.preventDefault();

        setTimeout(function () {
            window.location.href = url;
        },100)
    })

    $(".app-menu > li").click(function () {
        var parent      = $(this).parent().attr("id");
        var activeItem  = $(this).attr("id");

        $.post(base_url + "dashboard/setActiveMenu", {parent:parent, activeItem:activeItem}, function (response) {})
    })

    $(".sortable").sortable();

    $(".content-container, .image_list_container").on('click', '.remove-btn', function () {

        var $data_url = $(this).data("url");

        swal({
            title: 'Emin misiniz?',
            text: "Silme işlemi kesinlikle geri alınamaz!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil gitsin!',
            cancelButtonText: 'Vazgeç'
        }).then(function (result) {
            if (result.value) {
                window.location.href = $data_url;
            }
        });
    })

    $(".content-container, .image_list_container").on('change', '.isActive', function () {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, {data: $data}, function (response) {
            });
        }
    })

    $(".image_list_container").on('change', '.isCover', function () {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {

            $.post($data_url, {data: $data}, function (response) {

                $(".image_list_container").html(response);

                $('[data-switchery]').each(function () {
                    var $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'

                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });

                $(".sortable").sortable();

                $('#datatable-responsive').DataTable({
                    "language": {
                        "url": "http://localhost/cms/site/panel/assets/assets/js/dtTurkish.json",
                    },
                    "responsive": true,
                    "ordering": false,
                    "bsort": false
                });
            });
        }
    })

    $(".content-container, .image_list_container").on('sortupdate', '.sortable', function () {
        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");

        $.post($data_url, {data: $data}, function (response) {
        })
    })

    var uploadSection = Dropzone.forElement("#dropzone");

    uploadSection.on("complete", function (file) {

        var $data_url = $("#dropzone").data("url");

        $.post($data_url, {}, function (response) {

            $(".image_list_container").html(response);

            $('[data-switchery]').each(function () {
                var $this = $(this),
                    color = $this.attr('data-color') || '#188ae2',
                    jackColor = $this.attr('data-jackColor') || '#ffffff',
                    size = $this.attr('data-size') || 'default'

                new Switchery(this, {
                    color: color,
                    size: size,
                    jackColor: jackColor
                });
            });

            $(".sortable").sortable();

        });
    })
})