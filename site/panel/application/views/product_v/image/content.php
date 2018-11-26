    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-body">
                    <form data-url="<?php echo base_url("product/refresh_image_list/$item->id"); ?>"
                          action="<?php echo base_url("product/image_upload/$item->id"); ?>"
                          id="dropzone"
                          class="dropzone"
                          data-plugin="dropzone"
                          data-options="{ url: '<?php echo base_url("product/image_upload/$item->id"); ?>'}">
                        <div class="dz-message">
                            <h3 class="m-h-lg">Yüklemek istediğiniz görselleri buraya sürükleyip bırakabilirsiniz</h3>
                            <p class="m-b-lg text-muted">(Yüklemek için dosyalarınızı sürükleyip bırakabilir yada buraya
                                tıklayabilirsiniz)</p>
                        </div>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-10">
            <h4 class="m-b-lg">
                <b><?php echo $item->title; ?></b> kaydına ait görseller
            </h4>
        </div>
        <div class="col-md-2" style="text-align: right">
            <a href="<?php echo base_url("product") ?>">
                <button class="btn btn-sm btn-outline btn-inverse ml-3">
                    <i class="fa fa-chevron-circle-left"></i> Geri Dön
                </button>
            </a>
            <a href="<?php echo base_url("product/imageDeleteAll/$item->id"); ?>">
                <button class="btn btn-sm btn-deepOrange btn-outline">
                    <i class="fa fa-trash"></i> Tümünü Sil
                </button>
            </a>
        </div><!-- END column -->
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-body image_list_container">
                    <table id="datatable-responsive" class="table table-bordered table-hover table-striped">
                        <thead>
                            <th class="w20"><i class="fa fa-reorder"></i></th>
                            <th class="w100">Görsel</th>
                            <th class="w50">#id</th>
                            <th>Resim Adı</th>
                            <th class="w50">Durumu</th>
                            <th class="w100">İşlem</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><i class="fa fa-reorder"></i></td>
                                <td><img class="img-responsive img-rounded" src="<?php echo base_url("assets/assets/images/101.jpg"); ?>" alt=""></td>
                                <td class="text-center">1</td>
                                <td>deneme-urunu-1.jpg</td>
                                <td class="text-center">
                                    <input
                                            data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                            class="isActive"
                                            type="checkbox"
                                            data-switchery
                                            data-color="#188ae2"
                                        <?php echo (true) ? "checked" : "" ?>
                                    />
                                </td>
                                <td class="text-center">
                                    <button
                                            data-url="<?php echo base_url("product/delete/$item->id"); ?>"
                                            type="button"
                                            class="btn btn-danger btn-sm btn-outline remove-btn"
                                    >
                                        <i class="fa fa-trash-o"></i>
                                        Sil
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fa fa-reorder"></i></td>
                                <td><img class="img-responsive img-rounded" src="<?php echo base_url("assets/assets/images/102.jpg"); ?>" alt=""></td>
                                <td class="text-center">2</td>
                                <td>deneme-urunu-2.jpg</td>
                                <td class="text-center">
                                    <input
                                            data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                            class="isActive"
                                            type="checkbox"
                                            data-switchery
                                            data-color="#188ae2"
                                        <?php echo (true) ? "checked" : "" ?>
                                    />
                                </td>
                                <td class="text-center">
                                    <button
                                            data-url="<?php echo base_url("product/delete/$item->id"); ?>"
                                            type="button"
                                            class="btn btn-danger btn-sm btn-outline remove-btn"
                                    >
                                        <i class="fa fa-trash-o"></i>
                                        Sil
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fa fa-reorder"></i></td>
                                <td><img class="img-responsive img-rounded" src="<?php echo base_url("assets/assets/images/103.jpg"); ?>" alt=""></td>
                                <td class="text-center">3</td>
                                <td>deneme-urunu-3.jpg</td>
                                <td class="text-center">
                                    <input
                                            data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                            class="isActive"
                                            type="checkbox"
                                            data-switchery
                                            data-color="#188ae2"
                                        <?php echo (true) ? "checked" : "" ?>
                                    />
                                </td>
                                <td class="text-center">
                                    <button
                                            data-url="<?php echo base_url("product/delete/$item->id"); ?>"
                                            type="button"
                                            class="btn btn-danger btn-sm btn-outline remove-btn"
                                    >
                                        <i class="fa fa-trash-o"></i>
                                        Sil
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fa fa-reorder"></i></td>
                                <td><img class="img-responsive img-rounded" src="<?php echo base_url("assets/assets/images/104.jpg"); ?>" alt=""></td>
                                <td class="text-center">4</td>
                                <td>deneme-urunu-4.jpg</td>
                                <td class="text-center">
                                    <input
                                            data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                            class="isActive"
                                            type="checkbox"
                                            data-switchery
                                            data-color="#188ae2"
                                        <?php echo (true) ? "checked" : "" ?>
                                    />
                                </td>
                                <td class="text-center">
                                    <button
                                            data-url="<?php echo base_url("product/delete/$item->id"); ?>"
                                            type="button"
                                            class="btn btn-danger btn-sm btn-outline remove-btn"
                                    >
                                        <i class="fa fa-trash-o"></i>
                                        Sil
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>

