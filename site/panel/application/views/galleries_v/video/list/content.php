<div class="row">
    <div class="col-md-12">
        <div class="col-md-9">
            <h4 class="m-b-lg">
                <b><?php echo $gallery->title; ?></b> Galerisine ait videolar
            </h4>
        </div>
        <div class="col-md-3" style="text-align: right">
            <a href="<?php echo base_url("galleries") ?>">
                <button class="btn btn-sm btn-outline btn-inverse ml-3">
                    <i class="fa fa-chevron-left"></i> Geri Dön
                </button>
            </a>
            <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>">
                <button class="btn btn-outline btn-info btn-sm">
                    <i class="fa fa-plus"></i> Yeni Ekle
                </button>
            </a>
            <a href="<?php echo base_url("galleries/galleryVideoDeleteAll/$gallery->id"); ?>">
                <button class="btn btn-sm btn-deepOrange btn-outline">
                    <i class="fa fa-trash"></i> Tümünü Sil
                </button>
            </a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-warning text-center" style="padding: 8px; margin-bottom: 0px; s">
                    <p style="font-size: larger">Henüz bu galeri için bir video yüklenmemiş... Eklemek için
                        <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>">
                            tıklayın
                        </a>...
                    </p>
                </div>
            <?php } else { ?>
                <table id="datatable-responsive"
                       class="table table-striped table-hover table-bordered content-container">
                    <thead>
                    <th class="w20"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>url</th>
                    <th class="w150">Görsel</th>
                    <th class="w75">Durumu</th>
                    <th class="w150">İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankGalleryVideoSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="text-center"><?php echo $item->id; ?></td>
                            <td class="text-center"><?php echo $item->url ?></td>
                            <td>
                                <img src="https://img.youtube.com/vi/<?php echo $item->url; ?>/maxresdefault.jpg"
                                     alt="<?php echo $item->url; ?>"
                                     class="img-responsive img-rounded"
                                     style="margin: 0px auto; max-width: 200px"
                                     width="100%">
                            </td>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("galleries/galleryVideoIsActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#188ae2"
                                    <?php echo ($item->isActive) ? "checked" : "" ?>
                                />
                            </td>
                            <td class="text-center">
                                <button
                                        data-url="<?php echo base_url("galleries/galleryVideoDelete/$item->id/$item->gallery_id"); ?>"
                                        type="button"
                                        class="btn btn-danger btn-sm btn-outline remove-btn"
                                >
                                    <i class="fa fa-trash-o"></i>
                                    Sil
                                </button>
                                <a href="<?php echo base_url("galleries/update_gallery_video_form/$item->id"); ?>">
                                    <button type="button" class="btn btn-primary btn-sm btn-outline">
                                        <i class="fa fa-pencil-square-o"></i>
                                        Düzenle
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>