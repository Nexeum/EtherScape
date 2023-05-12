<header class="header">
    <div class="header__inner">
        <div class="container-fluid">
            <div class="header__row row justify-content-between">
                <div class="header__col-right col d-flex align-items-center">
                    <div class="order-tabs__container">
                        <h3 class="order-tabs__title"></h3>
                        <nav class="order-tabs__nav">
                            <div class="order-tabs__nav-prev">
                                <a class="order-tabs__arrow order-tabs__arrow--prev" href="#">
                                    <svg class="icon-icon-chevron">
                                        <use xlink:href="#icon-chevron"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="order-tabs__nav-next">
                                <a class="order-tabs__arrow order-tabs__arrow--next" href="#">
                                    <svg class="icon-icon-chevron">
                                        <use xlink:href="#icon-chevron"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="order-tabs__list-wrapper swiper-container">
                                <div class="order-tabs__list swiper-wrapper">
                                    <div class="order-tabs__item swiper-slide">
                                        <a class="order-tabs__link <?php if(isset($active1)){echo $active1;} ?>" href="file-manager.php">
                                            <svg class="icon-icon-inbox">
                                                <use xlink:href="#icon-inbox"></use>
                                            </svg>My Bit</a>
                                    </div>
                                    <div class="order-tabs__item swiper-slide">
                                        <a class="order-tabs__link" href="order-invoice.html">
                                            <svg class="icon-icon-send">
                                                <use xlink:href="#icon-send"></use>
                                            </svg>Shared with me</a>
                                    </div>
                                    <div class="order-tabs__item swiper-slide">
                                        <a class="order-tabs__link" href="order-status.html">
                                            <svg class="icon-icon-clock">
                                                <use xlink:href="#icon-clock"></use>
                                            </svg>Recent</a>
                                    </div>
                                    <div class="order-tabs__item swiper-slide">
                                        <a class="order-tabs__link" href="order-history.html">
                                            <svg class="icon-icon-star">
                                                <use xlink:href="#icon-star"></use>
                                            </svg>Starred</a>
                                    </div>
                                    <div class="order-tabs__item swiper-slide">
                                        <a class="order-tabs__link <?php if(isset($active4)){echo $active4;} ?>" href="trash.php">
                                            <svg class="icon-icon-trash">
                                                <use xlink:href="#icon-trash"></use>
                                            </svg>Trash</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <div class="header__profile dropdown">
                        <a class="header__profile-toggle dropdown__toggle" href="#" data-toggle="dropdown">
                            <div class="header__profile-image"><span class="header__profile-image-text">MA</span>
                                <img src="<?php echo $image; ?>" alt="#" />
                            </div>
                            <div class="header__profile-text"><span><?php echo ucfirst($username); ?></span>
                            </div><span class="icon-arrow-down">
                                <svg class="icon-icon-arrow-down">
                                    <use xlink:href="#icon-arrow-down"></use>
                                </svg></span>
                        </a>
                        <div class="profile-dropdown dropdown-menu dropdown-menu--right">
                            <a class="profile-dropdown__item dropdown-menu__item" href="#" tabindex="0"><span class="profile-dropdown__icon">
                                    <svg class="icon-icon-user">
                                        <use xlink:href="#icon-user"></use>
                                    </svg></span><span>My Profile</span></a>
                            <a class="profile-dropdown__item dropdown-menu__item" href="#" tabindex="0"><span class="profile-dropdown__icon">
                                    <svg class="icon-icon-settings">
                                        <use xlink:href="#icon-settings"></use>
                                    </svg></span><span>Settings</span></a>
                            <div class="dropdown-menu__divider"></div><a class="profile-dropdown__item dropdown-menu__item" href="../controller/logout.php" tabindex="0"><span class="profile-dropdown__icon">
                                    <svg class="icon-icon-logout">
                                        <use xlink:href="#icon-logout"></use>
                                    </svg></span><span>Logout</span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>