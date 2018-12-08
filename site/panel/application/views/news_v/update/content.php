<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <b><?php echo $item->title; ?></b> kaydını düzenliyorsunuz...
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("news/update/$item->id"); ?>" method="post"
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
                        <label>Haber Metni</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                            <?php echo $item->description; ?>
                        </textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <?php if ($item->news_type == "image") { ?>
                                <img src="<?php echo base_url("uploads/news_v/$item->img_url"); ?>"
                                     class="img-responsive img-rounded"
                                     alt="<?php echo $item->url; ?>">
                            <?php } else { ?>
                                <iframe
                                        width="100%"
                                        height="auto"
                                        src="https://www.youtube.com/embed/<?php echo $item->video_url; ?>"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                </iframe>
                            <?php } ?>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="control-demo-6">Haber Türü</label>
                                <div id="control-demo-6">
                                    <?php if (isset($form_error)) { ?>
                                        <select style="font-family: FontAwesome, Raleway" name="news_type" class="form-control news-type-select">
                                            <option <?php echo ($news_type == "image") ? "selected" : ""; ?>
                                                    value="image">
                                                &#xf1c5; &nbsp;Resim
                                            </option>
                                            <option <?php echo ($news_type == "video") ? "selected" : ""; ?>
                                                    value="video">
                                                &#xf167; &nbsp;Video
                                            </option>
                                        </select>
                                    <?php } else { ?>
                                        <select style="font-family: FontAwesome, Raleway" name="news_type" class="form-control news-type-select">
                                            <option <?php echo ($item->news_type == "image") ? "selected" : ""; ?>
                                                    value="image">
                                                &#xf1c5; &nbsp;Resim
                                            </option>
                                            <option <?php echo ($item->news_type == "video") ? "selected" : ""; ?>
                                                    value="video">
                                                &#xf167; &nbsp;Video
                                            </option>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>

                            <?php if (isset($form_error)) { ?>

                                <div class="form-group image-upload-container"
                                     style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; ?>">
                                    <label>Görsel Seçiniz</label>
                                    <input class="form-control" type="file" name="img_url">
                                </div>
                                <div class="form-group video-url-container"
                                     style="display: <?php echo ($item->news_type == "video") ? "block" : "none"; ?>">
                                    <label>Video URL</label>
                                    <input name="video_url" type="text" class="form-control"
                                           placeholder="Video linkini buraya girebilirsiniz...">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error pull-right"> <?php echo form_error("video_url"); ?></small>
                                    <?php } ?>
                                </div>

                            <?php } else { ?>

                                <div class="form-group image-upload-container"
                                     style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; ?>">
                                    <label>Görsel Seçiniz</label>
                                    <input class="form-control" type="file" name="img_url">
                                </div>
                                <div class="form-group video-url-container"
                                     style="display: <?php echo ($item->news_type == "video") ? "block" : "none"; ?>">
                                    <label>Video URL</label>
                                    <input
                                            name="video_url"
                                            type="text"
                                            class="form-control"
                                            value="<?php echo $item->video_url; ?>"
                                            placeholder="Video linkini buraya girebilirsiniz...">
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <br>
                        <button type="submit" class="btn btn-primary btn-md btn-outline"><i class="fa fa-refresh"></i>
                            Güncelle
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