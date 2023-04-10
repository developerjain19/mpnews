<body class="news">
    <div id="nav-top" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-between">
            <div class="d-flex align-items-center">
                <ul class="navbar-nav flex-row top-left">
                    <li class="nav-item"><a href="<?= base_url() ?>contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <ul class="navbar-nav flex-row flex-wrap ms-md-auto align-items-center">

                    <?php if (sessionId('id') == '') { ?>
                        <li class="nav-item display-flex align-items-center"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</a><span class="span-login-sep">&nbsp;/&nbsp;</span>
                        <a href="<?= base_url('register') ?>" class="nav-link">Register</a>
                        </li>
                    <?php
                    } else { ?>

                        <li class="nav-item display-flex align-items-center"><a href="<?= base_url('post-format') ?>" class="nav-link">Post</a>
                        </li>

                        <li class="dropdown profile-dropdown">
                            <a class="dropdown-toggle a-profile" data-toggle="dropdown" href="#" aria-expanded="false">
                                <img src="<?= base_url() ?>assets/img/user.png" alt="<?= sessionId('username') ?>">
                                <?= sessionId('email') ?>
                                <!-- <span class="icon-arrow-down"></span> -->
                            </a>
                            <ul class="dropdown-menu">

                                <li><a href="<?= base_url('dashboard') ?>" target="_blank"><i class="icon-dashboard"></i><?= trans("dashboard"); ?></a></li>

                                <li><a href="<?= base_url('profile' . '/' . encryptId(sessionId('id')) . '/' . sessionId('userslug')) ?>"><i class="icon-user"></i><?= trans("profile"); ?></a></li>

                                <!-- <li><a href="<?= base_url('dashboard') ?>"><i class="icon-star-o"></i><?= trans("reading_list"); ?></a></li> -->

                                <li><a href="<?= base_url() ?>profileSetting/<?= sessionId('userslug') ?>"><i class="icon-settings"></i><?= trans("settings"); ?></a></li>

                                <li><a href="<?= base_url('logout') ?>" class="logout"><i class="icon-logout-thin"></i><?= trans("logout"); ?></a></li>
                            </ul>
                        </li>

                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <header id="header">
        <div class="navbar navbar-expand-md nav-main">
            <nav class="container-xl">
                <a href="<?= base_url() ?>" class="navbar-brand p-0">
                    <img src="<?= $this->logo ?>" alt="logo" class="logo" width="180" height="52">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav navbar-left display-flex align-items-center">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">Home</a>
                        </li>
                        <?php
                        if (!empty($category)) {
                            foreach ($category as $row) {
                        ?>
                                <li class="nav-item nav-item-category nav-item-category-<?= $row['id'] ?>" data-category-id="<?= $row['id'] ?>">
                                    <a href="<?= base_url() ?>news/<?= $row['name_slug'] ?>" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false"> <?= $row['name'] ?><i class="icon-arrow-down"></i></a>
                                </li>
                        <?php
                            }
                        }
                        ?>


                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link" href="#">More<i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu nav-dropdown-menu">
                                <li><a href="Education" class="dropdown-item">शिक्षा</a></li>
                                <li><a href="technology" class="dropdown-item">टेक्नोलॉजी</a></li>
                                <li><a href="gallery" class="dropdown-item">Gallery</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <hr class="d-md-none text-white-50">
                    <ul class="navbar-nav navbar-right flex-row flex-wrap align-items-center ms-md-auto">
                        <li class="nav-item col-6 col-lg-auto position-relative">
                            <button type="button" class="btn-link nav-link py-2 px-0 px-lg-2 search-icon display-flex align-items-center" aria-label="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                            <div class="search-form">
                                <form action="search" method="get" id="search_validate">
                                    <input type="text" name="q" maxlength="300" pattern=".*\S+.*" class="form-control form-input" placeholder="Search..." required>
                                    <button class="btn btn-custom" aria-label="search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container-xl">
            <div class="mega-menu-container">
                <?php
                if (!empty($category)) {
                    foreach ($category as $row) {
                        $news_limit = getRowsByMoreIdWithOrderLimit('posts', array('category_id' => $row['id']), 'id', 'desc', 5, 0);


                ?>
                        <div class="mega-menu mega-menu-<?= $row['id'] ?> shadow-sm" data-category-id="<?= $row['id'] ?>">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 menu-right width100">
                                        <div class="menu-category-items filter-all active">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <?php
                                                    if (!empty($news_limit)) {
                                                        foreach ($news_limit as $news_row) {
                                                            $author = getSingleRowById('users', array('id' => $news_row['user_id']));
                                                    ?>
                                                            <div class="col-sm-2 menu-post-item width20">
                                                                <div class="image">
                                                                    <a href="<?= base_url($news_row['title_slug']); ?>">
                                                                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url() ?><?= $news_row['image_mid']; ?>" alt="<?= $news_row['title']; ?>" class="img-fluid lazyload" width="232" height="140" />
                                                                    </a>
                                                                </div>
                                                                <h3 class="title"><a href="<?= base_url($news_row['title_slug']); ?>"><?= $news_row['title']; ?></a></h3>
                                                                <p class="small-post-meta"> <a href="profile/<?= $author['slug'] ?>" class="a-username"><?= $author['username'] ?></a>
                                                                    <span><?= convertDatedmy($news_row['created_at']); ?></span>
                                                                    <span><i class="icon-comment"></i>&nbsp;0</span>
                                                                    <span class="m-r-0"><i class="icon-eye"></i>&nbsp;0</span>
                                                                </p>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
        <div class="header-mobile-container">
            <div class="fixed-top">
                <div class="header-mobile">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="menu-button mobile-menu-button" aria-label="menu">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="#222222" stroke-width="2" height="24" width="24" viewBox="0 0 24 24">
                                <line x1="2" y1="4" x2="22" y2="4"></line>
                                <line x1="2" y1="11" x2="22" y2="11"></line>
                                <line x1="2" y1="18" x2="22" y2="18"></line>
                            </svg>
                        </button>
                        <div class="mobile-logo">
                            <a href="<?= base_url() ?>">
                                <img src="uploads/logo/logo_63e664f058af75-86923718-95706663.jpeg" alt="logo" class="logo" width="150" height="50">
                            </a>
                        </div>
                        <div class="mobile-search">
                            <button type="button" class="menu-button mobile-search-button" aria-label="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mobile-search-form">
                        <form action="search" method="get" id="search_validate">
                            <div class="display-flex align-items-center">
                                <input type="text" name="q" maxlength="300" pattern=".*\S+.*" class="form-control form-input" placeholder="Search..." required>
                                <button class="btn btn-custom" aria-label="search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="navMobile" class="nav-mobile">
            <div class="nav-mobile-inner">
                <div class="row">
                    <div class="col-12 m-b-15">
                        <div class="row">
                            <div class="col">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalLogin" class="btn btn-md btn-custom close-menu-click btn_open_login_modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                        <polyline points="10 17 15 12 10 7"></polyline>
                                        <line x1="15" y1="12" x2="3" y2="12"></line>
                                    </svg>&nbsp;
                                    Login</a>
                            </div>
                            <div class="col">
                                <a href="register" class="btn btn-md btn-custom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                    </svg>&nbsp;
                                    Register</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="India" class="nav-link">देश</a></li>
                            <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
                            <li class="nav-item"><a href="international" class="nav-link">विदेश</a></li>
                            <li class="nav-item"><a href="Madhya-Pradesh" class="nav-link">मध्य प्रदेश</a></li>
                            <li class="nav-item"><a href="State" class="nav-link">राज्य</a></li>
                            <li class="nav-item"><a href="sport" class="nav-link">खेल</a></li>
                            <li class="nav-item"><a href="Entertainment" class="nav-link">मनोरंजन</a></li>
                            <li class="nav-item"><a href="Politics" class="nav-link">राजनीति</a></li>
                            <li class="nav-item"><a href="Business" class="nav-link">बिजनेस</a></li>
                            <li class="nav-item"><a href="Education" class="nav-link">शिक्षा</a></li>
                            <li class="nav-item"><a href="technology" class="nav-link">टेक्नोलॉजी</a></li>
                            <li class="nav-item"><a href="gallery" class="nav-link">Gallery</a></li>
                        </ul>
                    </div>

                    <div class="col-4">
                        <form action="switch-dark-mode" method="post">
                            <input type="hidden" name="app_csrf_token" value="52a883505c6b269b11f6375e43507042" /><input type="hidden" name="back_url" value="">
                            <button type="submit" name="theme_mode" value="dark" class="btn btn-md btn-default btn-switch-mode-mobile" aria-label="dark-mode">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="dark-mode-icon" viewBox="0 0 16 16">
                                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="overlay_bg" class="overlay-bg"></div>
    </header>
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="result-login"></div>
                    <form method="POST" id="push-login">
                        <div class="mb-2">
                            <input type="email" name="email" class="form-control form-input input-account" placeholder="Email" required>
                        </div>
                        <div class="mb-2">
                            <input type="password" name="password" class="form-control form-input input-account" placeholder="Password" required>
                        </div>
                        <div class="mb-4 text-end">
                            <a href="forgot-password" class="link-forget">Forgot Password?</a>
                        </div>
                        <div class="form-group m-t-15 m-b-0">
                            <button type="button" class="btn btn-account btn-custom" onclick="pushlogin()">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalNewsletter" class="modal fade modal-newsletter" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title">Join Our Newsletter</h5>
                    <p class="modal-desc">Join our subscribers list to get the latest news, updates and special offers
                        directly in your inbox</p>
                    <form id="form_newsletter_modal" class="form-newsletter needs-validation" data-form-type="modal">
                        <div class="mb-3">
                            <div class="modal-newsletter-inputs">
                                <input type="email" name="email" class="form-control form-input newsletter-input" placeholder="Email" required>
                                <button type="submit" id="btn_modal_newsletter" class="btn">Subscribe</button>
                            </div>
                        </div>
                        <input type="text" name="url">
                        <div id="modal_newsletter_response" class="text-center modal-newsletter-response">
                            <div class="form-group text-center m-b-0 text-close">
                                <button type="submit" class="text-close" data-dismiss="modal">No, thanks</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>