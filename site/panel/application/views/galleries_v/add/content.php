<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Galeri Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Galeri Adı</label>
                        <input name="title" type="text" class="form-control" placeholder="Galeri adını giriniz...">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="control-demo-6">Galeri Türü</label>
                        <div id="control-demo-6">
                            <select style="font-family: FontAwesome, Raleway" name="gallery_type" class="form-control news-type-select">
                                <option <?php echo (isset($gallery_type) && $gallery_type == "image") ? "selected" : ""; ?> value="image">
                                    &#xf1c5; &nbsp;Resim Galerisi
                                </option>
                                <option <?php echo (isset($gallery_type) && $gallery_type == "video") ? "selected" : ""; ?> value="video">
                                    &#xf167; &nbsp;Video Galerisi
                                </option>
                                <option <?php echo (isset($gallery_type) && $gallery_type == "file") ? "selected" : ""; ?> value="file">
                                    &#xf115; &nbsp;Dosya Galerisi
                                </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-floppy-o"></i>
                        Kaydet
                    </button>
                    <a href="<?php echo base_url("galleries"); ?>">
                        <button type="button" class="btn btn-danger btn-md btn-outline"><i class="fa fa-ban"></i>
                            Vazgeç
                        </button>
                    </a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>