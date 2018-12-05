<?php if (empty($items)) { ?>
    <div class="alert alert-warning text-center" style="padding: 8px; margin-bottom: 0px; s">
        <p style="font-size: larger">Henüz bu galeri için bir dosya yüklenmemiş...</p>
    </div>
<?php } else { ?>
    <table id="datatable-responsive" class="table table-bordered table-hover table-striped content-container">
        <thead>
        <th class="w20"><i class="fa fa-reorder"></i></th>
        <th class="w50">#id</th>
        <th class="w100">Görsel</th>
        <th>Dosya Yolu / Adı</th>
        <th class="w50">Durumu</th>
        <th class="w100">İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("galleries/fileRankSetter/$item->gallery_type"); ?>">
        <?php foreach ($items as $item) { ?>
            <tr id="ord-<?php echo $item->id; ?>">
                <td class="text-center"><i class="fa fa-reorder"></i></td>
                <td class="text-center"><?php echo $item->id; ?></td>
                <td class="text-center">
                    <?php if ($gallery_type == "image") { ?>
                        <img
                            class="img-responsive img-rounded"
                            src="<?php echo base_url("$item->url"); ?>"
                            alt="<?php echo $item->url; ?>">
                    <?php } else if ($gallery_type == "file") { ?>
                        <i class="fa fa-folder-open-o fa-2x"></i>
                    <?php } ?>
                </td>
                <td><?php echo $item->url; ?></td>
                <td class="text-center">
                    <input
                        data-url="<?php echo base_url("galleries/fileIsActiveSetter/$item->id/$gallery_type"); ?>"
                        class="isActive"
                        type="checkbox"
                        data-switchery
                        data-color="#188ae2"
                        <?php echo ($item->isActive) ? "checked" : "" ?>
                    />
                </td>
                <td class="text-center">
                    <button
                        data-url="<?php echo base_url("galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>"
                        type="button"
                        class="btn btn-danger btn-sm btn-outline remove-btn"
                    >
                        <i class="fa fa-trash-o"></i>
                        Sil
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>