<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Yönetim Paneli</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/assets/"); ?>images/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/assets/"); ?>css/custom.css"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/assets/css/iziToast.min.css">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form" action="<?php echo base_url("sifremi-sifirla"); ?>" method="post">
                <a href="<?php echo base_url("login") ?>">
                    <span class="login100-form-title p-b-43">
						<span><i class="zmdi zmdi-check-all"></i></span>
                        <span style="font-size: xx-large; color: #0089DD">Y<small class="text-muted">önetim</small> P<small
                                    class="text-muted">aneli</small></span>
					</span>
                </a>
                <div class="wrap-input100">
                    <input class="input100" type="email" name="email" autocomplete="new-password" value="<?php echo (isset($form_error)) ? set_value("email") : "" ; ?>">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Kayıtlı ePosta</span>
                </div>
                <?php if (isset($form_error)) { ?>
                    <span class="input-form-error" style="color: #ff5b5b!important; text-align: right"> <?php echo form_error("email"); ?></span>
                <?php } ?>
                <br>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Geçici Şifremi Gönder
                    </button>
                </div>
            </form>

            <div class="login100-more"
                 style="background-image: url('<?php echo base_url("assets/login/"); ?>images/bg-03.jpg');">
            </div>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url("assets/login/"); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>js/main.js"></script>

<?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_script"); ?>

</body>
</html>