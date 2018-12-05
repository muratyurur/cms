<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Video Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/gallery_video_save/$gallery_id"); ?>" method="post">
                    <div class="form-group">
                        <label>Video URL</label>
                        <input name="url" type="text" class="form-control" placeholder="Video linkini buraya girebilirsiniz...">
                        <?php if (isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("url"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-floppy-o"></i>
                        Kaydet
                    </button>
                    <a href="<?php echo base_url("galleries/gallery_video_list/$gallery_id"); ?>">
                        <button type="button" class="btn btn-danger btn-md btn-outline"><i class="fa fa-ban"></i>
                            Vazgeç
                        </button>
                    </a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>