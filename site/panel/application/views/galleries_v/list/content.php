<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Galeriler Listesi
            <a class="btn btn-outline btn-info btn-sm pull-right"
               href="<?php echo base_url("galleries/new_form"); ?>">
                <i class="fa fa-plus"></i> Yeni Ekle
            </a>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-warning text-center" style="padding: 8px; margin-bottom: 0px; s">
                    <p style="font-size: larger">Bu tabloya ait herhangi bir veri bulunamadı. Eklemek için
                        <a href="<?php echo base_url("galleries/new_form"); ?>">
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
                    <th>Galeri Adı</th>
                    <th class="w100">Galeri Türü</th>
                    <th>Klasör Adı</th>
                    <th>url</th>
                    <th class="w75">Durumu</th>
                    <th class="w300">İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("galleries/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="text-center"><?php echo $item->id; ?></td>
                            <td class="text-center"><?php echo $item->title; ?></td>
                            <td class="text-center" style="vertical-align: middle">
                                <?php if ($item->gallery_type == "image") { ?>
                                    <i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>
                                    <br>
                                    <p class="text-muted" style="margin: 0px">Resim Galerisi</p>
                                <?php } else if ($item->gallery_type == "video") { ?>
                                    <i class="fa fa-youtube fa-3x" aria-hidden="true"></i>
                                    <br>
                                    <p class="text-muted" style="margin: 0px">Video Galerisi</p>
                                <?php } else if ($item->gallery_type == "file") { ?>
                                    <i class="fa fa-folder-open-o fa-3x" aria-hidden="true"></i>
                                    <br>
                                    <p class="text-muted" style="margin: 0px">Dosya Galerisi</p>
                                <?php } ?>
                            </td>
                            <td class="text-center"><?php echo $item->folder_name; ?></td>
                            <td class="text-center"><?php echo $item->url; ?></td>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("galleries/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#188ae2"
                                    <?php echo ($item->isActive) ? "checked" : "" ?>
                                />
                            </td>
                            <td class="text-center">
                                <button
                                        data-url="<?php echo base_url("galleries/delete/$item->id"); ?>"
                                        type="button"
                                        class="btn btn-danger btn-sm btn-outline remove-btn"
                                >
                                    <i class="fa fa-trash-o"></i>
                                    Sil
                                </button>
                                <a href="<?php echo base_url("galleries/update_form/$item->id"); ?>">
                                    <button type="button" class="btn btn-primary btn-sm btn-outline">
                                        <i class="fa fa-pencil-square-o"></i>
                                        Düzenle
                                    </button>
                                </a>
                                <?php
                                if ($item->gallery_type == "image") {

                                    $button_image = "fa-picture-o";
                                    $button_url = "galleries/upload_form/$item->id";

                                } else if ($item->gallery_type == "file") {

                                    $button_image = "fa-folder-open-o";
                                    $button_url = "galleries/upload_form/$item->id";

                                } else if ($item->gallery_type == "video") {

                                    $button_image = "fa-youtube";
                                    $button_url = "galleries/gallery_video_list/$item->id";

                                }
                                ?>
                                <a href="<?php echo base_url($button_url); ?>">
                                    <button type="button" class="btn btn-inverse btn-sm btn-outline">
                                        <i class="fa <?php echo $button_image; ?>"></i>
                                        Galeri İçeriği
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