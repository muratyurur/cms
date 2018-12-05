<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b>Video</b> galerisine ait videoyu düzenliyorsunuz...
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/gallery_video_update/$item->id/$item->gallery_id"); ?>" method="post">
                    <div class="row">
                        <div class="col-md-2">
                            <iframe
                                    width="100%"
                                    height="auto"
                                    src="https://www.youtube.com/embed/<?php echo $item->url; ?>"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Video URL</label>
                                <input name="url"
                                       type="text"
                                       class="form-control"
                                       value="<?php echo $item->url; ?>"
                                       placeholder="Video linkini buraya girebilirsiniz...">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"> <?php echo form_error("url"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-md btn-outline"><i
                                        class="fa fa-refresh"></i>
                                Güncelle
                            </button>
                            <a href="<?php echo base_url("galleries/gallery_video_list/$item->gallery_id"); ?>">
                                <button type="button" class="btn btn-danger btn-md btn-outline"><i
                                            class="fa fa-ban"></i>
                                    Vazgeç
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>