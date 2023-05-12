<header class="header">
    <div class="header__inner">
        <div class="container-fluid">
            <div class="header__row row justify-content-between">
                <div class="header__col-left col d-flex align-items-center">
                    <div class="header__left-toggle">
                        <button class="header__toggle-search toggle-search">
                            <svg class="icon-icon-search">
                                <use xlink:href="#icon-search"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="header__search">
                        <form class="form-search" action="#" method="GET">
                            <div class="form-search__container"><span class="form-search__icon-left">
                                    <svg class="icon-icon-search">
                                        <use xlink:href="#icon-search"></use>
                                    </svg></span>
                                <input class="form-search__input" type="text" placeholder="Search..." />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="header__col-right col d-flex align-items-center">

                    <div class="header__language dropdown">
                        <button class="header__toggle-language" type="button" data-toggle="dropdown" data-tippy-content="Language" data-tippy-placement="bottom">
                            <svg class="icon-icon-language">
                                <use xlink:href="#icon-language"></use>
                            </svg> <span class="icon-arrow-down">
                                <svg class="icon-icon-arrow-down">
                                    <use xlink:href="#icon-arrow-down"></use>
                                </svg></span>
                        </button>
                        <div class="lang-menu dropdown-menu">
                            <button class="lang-menu__button dropdown-menu__item" tabindex="0">
                                <img class="lang-menu__icon" src="../assets/img/content/flags/us.svg" alt="#" /><span class="lang-menu__text">En</span>
                            </button>
                            <button class="lang-menu__button dropdown-menu__item" tabindex="0">
                                <img class="lang-menu__icon" src="../assets/img/content/flags/gb.svg" alt="#" /><span class="lang-menu__text">Gb</span>
                            </button>
                        </div>
                    </div>


                    <div class="header__tools">
                        <div class="header__messages header__tools-item">
                            <a class="header__tools-toggle header__tools-toggle--bell" href="#" data-tippy-content="Apps" data-tippy-placement="bottom" data-toggle="dropdown">
                                <svg class="icon-icon-grid">
                                    <use xlink:href="#icon-grid"></use>
                                </svg>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu__top dropdown-menu__item"><span class="dropdown-menu__item-title">Bit Apps</span>
                                </div>
                                <div class="dropdown-menu__items scrollbar-thin scrollbar-visible" data-simplebar="data-simplebar">
                                    <div class="dropdown-menu__item">
                                        <a class="dropdown-menu__item-block dropdown-menu__note" href="file-manager.php">
                                            <div class="dropdown-menu__item-left">
                                                <div class="dropdown-menu__item-icon color-blue">
                                                    <svg class="icon-icon-folder">
                                                        <use xlink:href="#icon-folder"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu__item-right">
                                                <h4 class="dropdown-menu__item-title">File Manager</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header__tools">
                        <div class="header__notes header__tools-item">
                            <a class="header__tools-toggle header__tools-toggle--message" href="#" data-tippy-content="Notifications" data-tippy-placement="bottom" data-toggle="dropdown">
                                <svg class="icon-icon-message">
                                    <use xlink:href="#icon-message"></use>
                                </svg> <span class="badge-signal"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu__top dropdown-menu__item"><span class="dropdown-menu__title">Notifications</span><span class="badge badge--red">3</span><a class="dropdown-menu__clear-all" href="#" role="button">Clear All</a>
                                </div>
                                <div class="dropdown-menu__items scrollbar-thin scrollbar-visible" data-simplebar="data-simplebar">
                                    <div class="dropdown-menu__item">
                                        <a class="dropdown-menu__item-remove" href="#">
                                            <svg class="icon-icon-cross">
                                                <use xlink:href="#icon-cross"></use>
                                            </svg>
                                        </a>
                                        <a class="dropdown-menu__item-block dropdown-menu__note" href="#">
                                            <div class="dropdown-menu__item-left">
                                                <div class="dropdown-menu__item-icon color-green">
                                                    <svg class="icon-icon-cart">
                                                        <use xlink:href="#icon-cart"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu__item-right">
                                                <h4 class="dropdown-menu__item-title">New Order Received</h4><span class="dropdown-menu__item-time">25 min ago</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu__item">
                                        <a class="dropdown-menu__item-remove" href="#">
                                            <svg class="icon-icon-cross">
                                                <use xlink:href="#icon-cross"></use>
                                            </svg>
                                        </a>
                                        <a class="dropdown-menu__item-block dropdown-menu__note" href="#">
                                            <div class="dropdown-menu__item-left">
                                                <div class="dropdown-menu__item-icon color-teal">
                                                    <svg class="icon-icon-truck">
                                                        <use xlink:href="#icon-truck"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu__item-right">
                                                <h4 class="dropdown-menu__item-title">new batch is shipped</h4><span class="dropdown-menu__item-time">10 hours ago</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu__item">
                                        <a class="dropdown-menu__item-remove" href="#">
                                            <svg class="icon-icon-cross">
                                                <use xlink:href="#icon-cross"></use>
                                            </svg>
                                        </a>
                                        <a class="dropdown-menu__item-block dropdown-menu__note" href="#">
                                            <div class="dropdown-menu__item-left">
                                                <div class="dropdown-menu__item-icon color-orange">
                                                    <svg class="icon-icon-bill">
                                                        <use xlink:href="#icon-bill"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu__item-right">
                                                <h4 class="dropdown-menu__item-title">New invoice received</h4><span class="dropdown-menu__item-time">5 hours ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-menu__divider"></div><a class="dropdown-menu__item dropdown-menu__link-all" href="#">View all Notifications
                                    <svg class="icon-icon-keyboard-right">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="header__messages header__tools-item">
                            <a class="header__tools-toggle header__tools-toggle--bell" href="#" data-tippy-content="Messages" data-tippy-placement="bottom" data-toggle="dropdown">
                                <svg class="icon-icon-bell">
                                    <use xlink:href="#icon-bell"></use>
                                </svg> <span class="badge-signal"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu__top dropdown-menu__item"><span class="dropdown-menu__title">Messages</span><span class="badge badge--red">2</span><a class="dropdown-menu__clear-all" href="#" role="button">Clear All</a>
                                </div>
                                <div class="dropdown-menu__items scrollbar-thin scrollbar-visible" data-simplebar="data-simplebar">
                                    <div class="dropdown-menu__item">
                                        <a class="dropdown-menu__item-remove" href="#">
                                            <svg class="icon-icon-cross">
                                                <use xlink:href="#icon-cross"></use>
                                            </svg>
                                        </a>
                                        <a class="dropdown-menu__item-block dropdown-menu__message" href="#">
                                            <div class="dropdown-menu__item-left">
                                                <div class="dropdown-menu__item-icon color-orange-dark">
                                                    <div class="dropdown-menu__item-icon-text">JT</div>
                                                    <img src="../assets/img/content/humans/item-1.jpg" alt="#" />
                                                </div>
                                                <div class="badge-signal badge-signal--green"></div>
                                            </div>
                                            <div class="dropdown-menu__item-right">
                                                <div class="dropdown-menu__item-column">
                                                    <h4 class="dropdown-menu__item-title">Jennifer Tang</h4>
                                                    <p class="dropdown-menu__text">Nemo enim ipsam voluptatem Nemo enim ipsam voluptatem</p>
                                                </div><span class="dropdown-menu__item-time">3 hours ago</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu__item">
                                        <a class="dropdown-menu__item-remove" href="#">
                                            <svg class="icon-icon-cross">
                                                <use xlink:href="#icon-cross"></use>
                                            </svg>
                                        </a>
                                        <a class="dropdown-menu__item-block dropdown-menu__message" href="#">
                                            <div class="dropdown-menu__item-left">
                                                <div class="dropdown-menu__item-icon color-orange">
                                                    <div class="dropdown-menu__item-icon-text">SA</div>
                                                    <img src="../assets/img/content/humans/item-5.jpg" alt="#" />
                                                </div>
                                                <div class="badge-signal"></div>
                                            </div>
                                            <div class="dropdown-menu__item-right">
                                                <div class="dropdown-menu__item-column">
                                                    <h4 class="dropdown-menu__item-title">Stephen Allen</h4>
                                                    <p class="dropdown-menu__text">Nemo enim ipsam voluptatem Nemo enim ipsam voluptatem</p>
                                                </div><span class="dropdown-menu__item-time">10 hours ago</span>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="dropdown-menu__divider"></div><a class="dropdown-menu__item dropdown-menu__link-all" href="#">View all Messages
                                    <svg class="icon-icon-keyboard-right">
                                        <use xlink:href="#icon-keyboard-right"></use>
                                    </svg></a>
                            </div>
                        </div>
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