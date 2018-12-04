<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b><?php echo $item->title; ?></b> kaydını düzenliyorsunuz...
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("courses/update/$item->id"); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input
                                name="title"
                                type="text"
                                class="form-control"
                                value="<?php echo $item->title; ?>"
                                placeholder="Haber başlığını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo $item->description; ?>
                        </textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="datetimepicker1">Eğitim Tarihi</label>
                            <input type="hidden"
                                   name="event_date"
                                   id="datetimepicker1"
                                   data-plugin="datetimepicker"
                                   value="<?php echo $item->event_date; ?>"
                                   data-options="{ inline: true, viewMode: 'days', format: 'YYYY-MM-DD HH:mm:ss' }">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group image-upload-container col-md-12 text-center">
                                <img src="<?php echo base_url("uploads/{$viewFolder}/$item->img_url"); ?>"
                                     width="350px"
                                     style="margin: 0px auto"
                                     alt="<?php echo $item->url; ?>">
                            </div>
                            <div class="form-group image-upload-container col-md-12">
                                <label>Görsel Seçiniz</label>
                                <input class="form-control" type="file" name="img_url">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-floppy-o"></i>
                            Kaydet
                        </button>
                        <a href="<?php echo base_url("courses"); ?>">
                            <button type="button" class="btn btn-danger btn-md btn-outline"><i class="fa fa-ban"></i>
                                Vazgeç
                            </button>
                        </a>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>