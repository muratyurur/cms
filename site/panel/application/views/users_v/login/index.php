<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Yönetim Paneli | Murat Yürür" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url("uploads/settings_v/favicon"); ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url("uploads/settings_v/favicon"); ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url("uploads/settings_v/favicon"); ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Yönetim Paneli</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
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
            <form class="login100-form" action="<?php echo base_url("userop/do_login"); ?>" method="post">
					<span class="login100-form-title p-b-43">
						<span><i class="zmdi zmdi-check-all"></i></span>
                        <span style="font-size: xx-large; color: #0089DD">Y<small class="text-muted">önetim</small> P<small
                                    class="text-muted">aneli</small></span>
					</span>
                <div class="wrap-input100">
                    <input class="input100" type="email" name="user_email" autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">ePosta</span>
                </div>
                <?php if (isset($form_error)) { ?>
                    <span class="input-form-error" style="color: #ff5b5b!important; text-align: right"> <?php echo form_error("user_email"); ?></span>
                <?php } ?>
                <br>
                <div class="wrap-input100">
                    <input class="input100" type="password" name="user_password" autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Şifre</span>
                </div>
                <?php if (isset($form_error)) { ?>
                    <span class="input-form-error" style="color: #ff5b5b!important; text-align: right"> <?php echo form_error("user_password"); ?></span>
                <?php } ?>
                <br>
                <div class=" w-full p-t-3 p-b-32">

                    <div>
                        <a href="<?php echo base_url("sifremi-unuttum"); ?>" class="txt1" style="float: right;">
                            Şifremi Unuttum
                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Giriş Yap
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