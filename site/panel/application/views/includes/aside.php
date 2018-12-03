<aside id="menubar" class="menubar light" style="padding-top: 0px;">
    <?php

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    $grandparent    = $this->session->userdata("grandparent");
    $parent         = $this->session->userdata("parent");
    $activeItem     = $this->session->userdata("activeItem");

    $this->session->unset_userdata("grandparent");
    $this->session->unset_userdata("parent");
    $this->session->unset_userdata("activeItem");

    ?>

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <li onclick="firstLevel()" id="dashboard" class="<?php echo ($activeItem == "dashboard") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Kontrol Paneli</span>
                    </a>
                </li>

                <li id="settings" class="<?php echo ($activeItem == "settings") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Ayarlar</span>
                    </a>
                </li>

                <li id="email-settings" class="<?php echo ($activeItem == "email-settings") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                        <span class="menu-text">ePosta Ayarları</span>
                    </a>
                </li>

                <li class="has-submenu <?php echo ($grandparent == "gallery-folder") ? "open" : ""; ?>" id="gallery-folder">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-group zmdi-hc-lg"></i>
                        <span class="menu-text">Galeriler</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu" style="display: <?php echo ($parent == "gallery-subfolder") ? "block" : "none" ; ?>" id="gallery-subfolder">
                        <li class="<?php echo ($activeItem == "image-gallery") ? "active" : "" ; ?>"  id="image-gallery"><a href="<?php echo base_url(); ?>"><span class="menu-text">Resim Galerileri</span></a></li>
                        <li class="<?php echo ($activeItem == "video-gallery") ? "active" : "" ; ?>"  id="video-gallery"><a href="<?php echo base_url(); ?>"><span class="menu-text">Video Galerileri</span></a></li>
                        <li class="<?php echo ($activeItem == "file-gallery") ? "active" : "" ; ?>"  id="file-gallery"><a href="<?php echo base_url(); ?>"><span class="menu-text">Dosya Galerileri</span></a></li>
                    </ul>
                </li>

                <li class="has-submenu <?php echo ($grandparent == "portfolio-folder") ? "open" : ""; ?>"  id="portfolio-folder">
                    <a class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Portfolyo İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu" style="display: <?php echo ($parent == "portfolio-subfolder") ? "block" : "none" ; ?>" id="portfolio-subfolder">
                        <li class="<?php echo ($activeItem == "portfolio-category") ? "active" : "" ; ?>" id="portfolio-category"><a href="<?php echo base_url(); ?>"><span class="menu-text">Portfolyo Kategorileri</span></a></li>
                        <li class="<?php echo ($activeItem == "portfolio") ? "active" : "" ; ?>" id="portfolio"><a href="<?php echo base_url(); ?>"><span class="menu-text">Portfolyo</span></a></li>
                    </ul>
                </li>

                <li id="sliders" class="<?php echo ($activeItem == "sliders") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-code-setting zmdi-hc-lg"></i>
                        <span class="menu-text">Slider</span>
                    </a>
                </li>

                <li id="products" class="<?php echo ($activeItem == "products") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url("product"); ?>">
                        <i class="menu-icon zmdi zmdi-shopping-basket zmdi-hc-lg"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>

                <li id="news" class="<?php echo ($activeItem == "news") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url("news"); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">Haberler</span>
                    </a>
                </li>

                <li id="courses" class="<?php echo ($activeItem == "courses") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-calendar-note zmdi-hc-lg"></i>
                        <span class="menu-text">Eğitimler</span>
                    </a>
                </li>

                <li id="references" class="<?php echo ($activeItem == "references") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-case-check zmdi-hc-lg"></i>
                        <span class="menu-text">Referanslar</span>
                    </a>
                </li>

                <li id="brands" class="<?php echo ($activeItem == "brands") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text">Markalar</span>
                    </a>
                </li>

                <li id="users" class="<?php echo ($activeItem == "users") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-accounts zmdi-hc-lg"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>

                <li id="user-roles" class="<?php echo ($activeItem == "user-roles") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-accounts-add zmdi-hc-lg"></i>
                        <span class="menu-text">Kullanıcı Rolleri</span>
                    </a>
                </li>

                <li id="members" class="<?php echo ($activeItem == "members") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-accounts-list-alt zmdi-hc-lg"></i>
                        <span class="menu-text">Aboneler</span>
                    </a>
                </li>

                <li id="popup" class="<?php echo ($activeItem == "popup") ? "active" : "" ; ?>">
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text">Popup Hizmeti</span>
                    </a>
                </li>

                <li class="menu-separator"><hr class="text-muted"></li>

                <li>
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-home zmdi-hc-lg"></i>
                        <span class="menu-text">Site Ana Sayfası</span>
                    </a>
                </li>

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>
