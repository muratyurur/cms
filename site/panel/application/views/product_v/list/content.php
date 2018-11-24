<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürünler Listesi
            <a class="btn btn-outline btn-info btn-sm pull-right" href="<?php echo base_url("product/new_form"); ?>"><i class="fa fa-plus"></i> Yeni Ekle</a>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)) { ?>
                <div class="alert alert-warning text-center" style="padding: 8px; margin-bottom: 0px; s">
                    <p style="font-size: larger">Bu tabloya ait herhangi bir veri bulunamadı. Eklemek için
                        <a href="<?php echo base_url("product/new_form"); ?>">
                            tıklayın
                        </a>...
                    </p>
                </div>
            <?php } else { ?>
                <table id="datatable-responsive" class="table table-striped table-hover table-bordered">
                    <thead>
                        <th class="w50">#id</th>
                        <th>url</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th class="w75">Durumu</th>
                        <th class="w200">İşlem</th>
                    </thead>
                    <tbody>
                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <td class="text-center"><?php echo $item->id; ?></td>
                            <td class="text-center"><?php echo $item->url ?></td>
                            <td class="text-center"><?php echo $item->title; ?></td>
                            <td><?php echo $item->description; ?></td>
                            <td class="text-center">
                                <input
                                        type="checkbox"
                                        data-switchery
                                        data-color="#188ae2"
                                        <?php echo ($item->isActive) ? "checked" : "" ?>
                                />
                            </td>
                            <td class="text-center">
                                <a href="#">
                                    <button type="button" class="btn btn-danger btn-sm btn-outline">
                                        <i class="fa fa-trash-o"></i>
                                        Sil
                                    </button>
                                </a>
                                <a href="#">
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