<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="index.html">
            <span><i class="zmdi zmdi-check-all"></i></span>
            <span style="font-size: xx-large">Y<small class="text-muted">önetim</small> P<small class="text-muted">aneli</small></span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-lg text-center">Devam edebilmek için kullanıcı girişi yapmalısınız</h4>
        <form action="<?php echo base_url("userop/do_login"); ?>" method="post">
            <div class="form-group">
                <input id="sign-in-email" name="user_email" type="email" class="form-control" placeholder="ePosta">
                <?php if (isset($form_error)) { ?>
                    <small class="input-form-error pull-right"> <?php echo form_error("user_email"); ?></small>
                <?php } ?>
            </div>

            <div class="form-group">
                <input id="sign-in-password" name="user_password" type="password" class="form-control" placeholder="Şifre">
                <?php if (isset($form_error)) { ?>
                    <small class="input-form-error pull-right"> <?php echo form_error("user_password"); ?></small>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">
                Giriş Yap
            </button>
        </form>
    </div><!-- #login-form -->
    <div class="simple-page-footer">
        <p><a href="password-forget.html">Şifremi Unuttum</a></p>
    </div><!-- .simple-page-footer -->
</div><!-- .simple-page-wrap -->