<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Haber Listesi
            <a class="btn btn-outline btn-info btn-sm pull-right"
               href="<?php echo base_url("news/new_form"); ?>">
                <i class="fa fa-plus"></i> Yeni Ekle
            </a>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-warning text-center" style="padding: 8px; margin-bottom: 0px; s">
                    <p style="font-size: larger">Bu tabloya ait herhangi bir veri bulunamadı. Eklemek için
                        <a href="<?php echo base_url("news/new_form"); ?>">
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
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th class="w100">Haber Türü</th>
                        <th class="w150">Görsel</th>
                        <th class="w75">Durumu</th>
                        <th class="w150">İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("news/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="text-center"><?php echo $item->id; ?></td>
                            <td class="text-center"><?php echo $item->url ?></td>
                            <td class="text-center"><?php echo $item->title; ?></td>
                            <td><?php echo $item->description; ?></td>
                            <td class="text-center" style="vertical-align: middle">
                                <?php if ($item->news_type == "image") { ?>
                                    <i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>
                                    <br>
                                    <p class="text-muted" style="margin: 0px">Resim Haberi</p>
                                <?php } else if ($item->news_type == "video") { ?>
                                    <i class="fa fa-youtube fa-3x" aria-hidden="true"></i>
                                    <br>
                                    <p class="text-muted" style="margin: 0px">Video Haber</p>
                                <?php } ?>
                            </td>
                            <?php if ($item->news_type == "image") { ?>
                                <td>
                                    <img src="<?php echo "uploads/{$viewFolder}/$item->img_url"; ?>"
                                         alt="<?php echo $item->url; ?>"
                                         class="img-responsive img-rounded"
                                         style="margin: 0px auto; max-width: 200px"
                                         width="100%">
                                </td>
                            <?php } else { ?>
                                <td>
                                    <img src="https://img.youtube.com/vi/<?php echo $item->video_url; ?>/maxresdefault.jpg"
                                         alt="<?php echo $item->url; ?>"
                                         class="img-responsive img-rounded"
                                         style="margin: 0px auto; max-width: 200px"
                                         width="100%">
                                </td>
                                </td>
                            <?php } ?>
                            <td class="text-center">
                                <input
                                        data-url="<?php echo base_url("news/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#188ae2"
                                        <?php echo ($item->isActive) ? "checked" : "" ?>
                                />
                            </td>
                            <td class="text-center">
                                    <button
                                        data-url="<?php echo base_url("news/delete/$item->id"); ?>"
                                        type="button"
                                        class="btn btn-danger btn-sm btn-outline remove-btn"
                                    >
                                        <i class="fa fa-trash-o"></i>
                                        Sil
                                    </button>
                                <a href="<?php echo base_url("news/update_form/$item->id"); ?>">
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