<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Haber Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("news/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input name="title" type="text" class="form-control" placeholder="Haber başlığını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Haber Metni</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="control-demo-6">Haber Türü</label>
                        <div id="control-demo-6">
                            <select name="news_type" class="form-control news-type-select">
                                <option <?php echo (isset($news_type) && $news_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                                <option <?php echo (isset($news_type) && $news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                            </select>
                        </div>
                    </div>

                    <?php if (isset($form_error)) { ?>

                    <div class="form-group image-upload-container" style="display: <?php echo (isset($news_type) && $news_type == "image") ? "block" : "none"; ?>">
                        <label>Görsel Seçiniz</label>
                        <input class="form-control" type="file" name="img_url">
                    </div>
                    <div class="form-group video-url-container" style="display: <?php echo (isset($news_type) && $news_type == "video") ? "block" : "none"; ?>">
                        <label>Video URL</label>
                        <input name="video_url" type="text" class="form-control" placeholder="Video linkini buraya girebilirsiniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("video_url"); ?></small>
                        <?php } ?>
                    </div>

                    <?php } else { ?>

                    <div class="form-group image-upload-container">
                        <label>Görsel Seçiniz</label>
                        <input class="form-control" type="file" name="img_url">
                    </div>
                    <div class="form-group video-url-container">
                        <label>Video URL</label>
                        <input name="video_url" type="text" class="form-control" placeholder="Video linkini buraya girebilirsiniz...">
                    </div>

                    <?php } ?>

                    <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-floppy-o"></i>
                        Kaydet
                    </button>
                    <a href="<?php echo base_url("news"); ?>">
                        <button type="button" class="btn btn-danger btn-md btn-outline"><i class="fa fa-ban"></i>
                            Vazgeç
                        </button>
                    </a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>