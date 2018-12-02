<?php
$alert = $this->session->userdata("alert");

if ($alert) {
    if ($alert["type"] === "success")
    { ?>

        <script>
            iziToast.success({
                title           : '<?php echo $alert["title"]; ?>',
                message         : '<?php echo $alert["text"]; ?>',
                messageSize     : '18px',
                messageColor    : '#ffffff',
                theme           : 'dark',
                position        : 'topRight',
                closeOnEscape   : true,
                closeOnClick    : true,
                backgroundColor : 'green',
                icon            : 'fa fa-thumbs-o-up',
                layout          : 2
            })
        </script>
    <?php } elseif ($alert["type"] === "error")
    { ?>
        <script>
            iziToast.error({
                title           : '<?php echo $alert["title"] ?>',
                message         : '<?php echo $alert["text"]; ?>',
                messageSize     : '18px',
                messageColor    : '#ffffff',
                theme           : 'dark',
                position        : 'topRight',
                closeOnEscape   : true,
                closeOnClick    : true,
                backgroundColor : 'red',
                icon            : 'fa fa-thumbs-o-down',
                layout          : 2
            })
        </script>
    <?php }
} ?>