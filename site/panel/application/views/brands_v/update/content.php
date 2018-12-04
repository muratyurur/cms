<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b><?php echo $item->title; ?></b> kaydını düzenliyorsunuz...
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("brands/update/$item->id"); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input
                                name="title"
                                type="text"
                                class="form-control"
                                value="<?php echo $item->title; ?>"
                                placeholder="Marka adını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-md-1">
                            <img src="<?php echo base_url("uploads/brands_v/$item->img_url"); ?>"
                                 style="margin: 0px auto"
                                 class="img-responsive img-rounded"
                                 alt="<?php echo $item->title; ?>">
                        </div>
                        <div class="col-md-11">
                            <div class="form-group">
                                <div class="form-group image-upload-container">
                                    <label>Görsel Seçiniz</label>
                                    <input class="form-control" type="file" name="img_url">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                        <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-refresh"></i>
                            Güncelle
                        </button>
                        <a href="<?php echo base_url("brands"); ?>">
                            <button type="button" class="btn btn-danger btn-md btn-outline"><i class="fa fa-ban"></i>
                                Vazgeç
                            </button>
                        </a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>