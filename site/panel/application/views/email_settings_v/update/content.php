<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b><?php echo $item->host; ?></b> ePosta Ayar Seti'ne ait bilgileri düzenliyorsunuz...
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("emailsettings/update/$item->id"); ?>" method="post">
                    <div class="form-group">
                        <label>Gönderici Adı</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name; ?>"
                                name="user_name"
                                type="text"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın gönderici kısmında görünmesini istediğiniz etiketi giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>ePosta Sunucu (Host)</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("host") : $item->host; ?>"
                                name="host"
                                type="text"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın gönderileceği sunucu adresini giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("host"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Protokol</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("protocol") : $item->protocol; ?>"
                                name="protocol"
                                type="text"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın gönderileceği protokolü giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("protocol"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Port Numarası</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("port") : $item->port; ?>"
                                name="port"
                                type="text"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın gönderileceği port numarasını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("port"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Sunucu Kullanıcı Adı</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("user") : $item->user; ?>"
                                name="user"
                                type="email"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın gönderileceği sunucuya girişte kullanılacak ePosta adresi ya da kullanıcı adını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("user"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Sunucu Şifresi</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("password") : $item->password; ?>"
                                name="password"
                                type="password"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın gönderileceği hesabın parolasını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Kimden</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("from") : $item->from; ?>"
                                name="from"
                                type="email"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın hangi adresten gönderileceğini giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("from"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Kime</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("to") : $item->to; ?>"
                                name="to"
                                type="email"
                                autocomplete="new-password"
                                class="form-control"
                                placeholder="ePosta'nın hangi adrese gönderileceğini giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("to"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-refresh"></i>
                        Güncelle
                    </button>
                    <a href="<?php echo base_url("emailsettings"); ?>">
                        <button type="button" class="btn btn-danger btn-md btn-outline"><i class="fa fa-ban"></i>
                            Vazgeç
                        </button>
                    </a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>