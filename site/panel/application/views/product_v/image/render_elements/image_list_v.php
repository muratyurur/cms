<?php if (empty($item_images)) { ?>
    <div class="alert alert-warning text-center" style="padding: 8px; margin-bottom: 0px; s">
        <p style="font-size: larger">Henüz bu ürün için bir görsel yüklenmemiş...</p>
    </div>
<?php } else { ?>
    <table id="datatable-responsive" class="table table-bordered table-hover table-striped">
        <thead>
        <th class="w20"><i class="fa fa-reorder"></i></th>
        <th class="w100">Görsel</th>
        <th class="w50">#id</th>
        <th>Resim Adı</th>
        <th class="w50">Durumu</th>
        <th class="w50">Kapak Resmi</th>
        <th class="w100">İşlem</th>
        </thead>
        <tbody>
        <?php foreach ($item_images as $image) { ?>
            <tr>
                <td class="text-center"><i class="fa fa-reorder"></i></td>
                <td>
                    <img
                        class="img-responsive img-rounded"
                        src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>"
                        alt="">
                </td>
                <td class="text-center"><?php echo $image->id; ?></td>
                <td><?php echo $image->img_url; ?></td>
                <td class="text-center">
                    <input
                        data-url="<?php echo base_url("product/imageIsActiveSetter/$image->id"); ?>"
                        class="isActive"
                        type="checkbox"
                        data-switchery
                        data-color="#188ae2"
                        <?php echo ($image->isActive) ? "checked" : "" ?>
                    />
                </td>
                <td class="text-center">
                    <input
                            data-url="<?php echo base_url("product/isCoverSetter/$image->id/$image->product_id"); ?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            data-color="#f9c851"
                        <?php echo ($image->isCover) ? "checked" : "" ?>
                    />
                </td>
                <td class="text-center">
                    <button
                        data-url="<?php echo base_url("product/delete/$image->id"); ?>"
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