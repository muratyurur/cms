<aside id="menubar" class="menubar light" style="padding-top: 0px;">
    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <li>
                    <a href="<?php echo base_url(); ?>">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Kontrol Paneli</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("settings"); ?>">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Ayarlar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("emailsettings"); ?>">
                        <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                        <span class="menu-text">ePosta Ayarları</span>
                    </a>
                </li>

                <li class="has-submenu">
                    <a href="<?php echo base_url("galleries"); ?>">
                        <i class="menu-icon zmdi zmdi-collection-image zmdi-hc-lg"></i>
                        <span class="menu-text">Galeriler</span>
                    </a>
                </li>

                <li class="has-submenu">
                    <a class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Portfolyo İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu" id="portfolio-submenu">
                        <li><a href="<?php echo base_url("portfolio-category"); ?>"><span class="menu-text">Portfolyo Kategorileri</span></a></li>
                        <li><a href="<?php echo base_url("portfolio"); ?>"><span class="menu-text">Portfolyo</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url("sliders"); ?>">
                        <i class="menu-icon zmdi zmdi-code-setting zmdi-hc-lg"></i>
                        <span class="menu-text">Slider</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("product"); ?>">
                        <i class="menu-icon zmdi zmdi-shopping-basket zmdi-hc-lg"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("news"); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">Haberler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("courses"); ?>">
                        <i class="menu-icon zmdi zmdi-graduation-cap zmdi-hc-lg"></i>
                        <span class="menu-text">Eğitimler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("references"); ?>">
                        <i class="menu-icon fa fa-handshake-o"></i>
                        <span class="menu-text">Referanslar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("brands"); ?>">
                        <i class="menu-icon zmdi zmdi-labels zmdi-hc-lg"></i>
                        <span class="menu-text">Markalar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("users"); ?>">
                        <i class="menu-icon zmdi zmdi-accounts zmdi-hc-lg"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("user_roles"); ?>">
                        <i class="menu-icon zmdi zmdi-accounts-add zmdi-hc-lg"></i>
                        <span class="menu-text">Kullanıcı Rolleri</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("members"); ?>">
                        <i class="menu-icon zmdi zmdi-accounts-list-alt zmdi-hc-lg"></i>
                        <span class="menu-text">Aboneler</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url("popup"); ?>">
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
