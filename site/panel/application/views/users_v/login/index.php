<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Yönetim Paneli</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/login/"); ?>images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/"); ?>css/main.css">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="<?php echo base_url("userop/do_login"); ?>" method="post">
					<span class="login100-form-title p-b-43">
						<span><i class="zmdi zmdi-check-all"></i></span>
                        <span style="font-size: xx-large">Y<small class="text-muted">önetim</small> P<small class="text-muted">aneli</small></span>
					</span>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="user_email" autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">ePosta</span>
                </div>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="user_password" autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Şifre</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">

                    <div>
                        <a href="#" class="txt1" style="float: right;">
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

            <div class="login100-more" style="background-image: url('<?php echo base_url("assets/login/"); ?>images/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url("assets/login/"); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url("assets/login/"); ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url("assets/login/"); ?>js/main.js"></script>

</body>
</html>