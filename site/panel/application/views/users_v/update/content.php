<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b><?php echo $item->full_name; ?></b> kullanıcına ait bilgileri düzenliyorsunuz...
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/update/$item->id"); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="<?php echo base_url("uploads/users_v/$item->img_url"); ?>"
                                 style="margin: 0px auto"
                                 class="img-responsive img-rounded"
                                 alt="<?php echo $item->user_name; ?>">
                        </div>
                        <div class="col-md-11">
                            <div class="form-group">
                                <div class="form-group image-upload-container">
                                    <label>Kullanıcı Resmi Seçiniz</label>
                                    <input class="form-control" type="file" name="img_url">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name; ?>"
                                name="user_name"
                                type="text"
                                class="form-control"
                                placeholder="Tercih ettiğiniz kullanıcı adını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("full_name") : $item->full_name; ?>"
                                name="full_name"
                                type="text"
                                class="form-control"
                                placeholder="Kullanıcının ad ve soyadını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("full_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Unvan</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("title") : $item->title; ?>"
                                name="title"
                                type="text"
                                class="form-control"
                                placeholder="Kullanıcının unvanını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>ePosta</label>
                        <input
                                value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>"
                                name="email"
                                type="email"
                                class="form-control"
                                placeholder="Kullanıcının ePosta giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-refresh"></i>
                        Güncelle
                    </button>
                    <a href="<?php echo base_url("users"); ?>">
                        <button type="button" class="btn btn-danger btn-md btn-outline"><i class="fa fa-ban"></i>
                            Vazgeç
                        </button>
                    </a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>