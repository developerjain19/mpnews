<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | <?= $this->site_title ?></title>
    <meta name="description" content="<?=$this->description ?>" />
    <meta name="keywords" content="<?= $this->keywords ?>" />
    <meta name="author" content="<?= $this->author  ?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="<?= $this->site_title ?>" />
    <meta property="og:image" content="<?= $this->logo ?>" />
    <meta property="og:image:width" content="240" />
    <meta property="og:image:height" content="90" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $this->site_title ?>" />
    <meta property="og:description" content="<?= $this->og_description ?>" />
    <meta property="og:url" content="<?= PROJECT_LINK ?>" />
    <meta property="fb:app_id" content="" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@<?= $this->site_title ?>" />
    <meta name="twitter:title" content="<?= $this->site_title ?> - <?= $this->site_title ?>" />
    <meta name="twitter:description" content="<?= $this->site_title ?>" />
    <link rel="shortcut icon" type="image/png" href="<?= $this->shortcut_logo ?>" />
    <link rel="canonical" href="<?= PROJECT_LINK ?>" />
    <link rel="alternate" href="" hreflang="en-US" />
    <style>
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local(''), url('<?= base_url() ?>assets/fonts/inter/inter-400.woff2') format('woff2'), url('<?= base_url() ?>assets/fonts/inter/inter-400.woff') format('woff')
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: local(''), url('<?= base_url() ?>assets/fonts/inter/inter-600.woff2') format('woff2'), url('<?= base_url() ?>assets/fonts/inter/inter-600.woff') format('woff')
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''), url('<?= base_url() ?>assets/fonts/inter/inter-700.woff2') format('woff2'), url('<?= base_url() ?>assets/fonts/inter/inter-700.woff') format('woff')
        }
    </style>
    <style>
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local(''), url('<?= base_url() ?>assets/fonts/open-sans/open-sans-400.woff2') format('woff2'), url('<?= base_url() ?>assets/fonts/open-sans/open-sans-400.woff') format('woff')
        }

        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: local(''), url('<?= base_url() ?>assets/fonts/open-sans/open-sans-600.woff2') format('woff2'), url('<?= base_url() ?>assets/fonts/open-sans/open-sans-600.woff') format('woff')
        }

        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''), url('<?= base_url() ?>assets/fonts/open-sans/open-sans-700.woff2') format('woff2'), url('<?= base_url() ?>assets/fonts/open-sans/open-sans-700.woff') format('woff')
        }
    </style>
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/themes/magazine/css/icons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/themes/magazine/css/plugins.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/themes/magazine/css/style-2.1.1.min.css" rel="stylesheet">
    <style>
        :root {
            --vr-font-primary: "Open Sans", Helvetica, sans-serif;
            --vr-font-secondary: "Inter", sans-serif;
            ;
            --vr-font-tertiary: Verdana, Helvetica, sans-serif;
            --vr-theme-color: #dc0000;
            --vr-block-color: #ec0000;
            --vr-mega-menu-color: #ec0000;
        }

        .bn-ds-1 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-1 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-2 {
            width: 336px;
            height: 280px;
        }

        .bn-mb-2 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-3 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-3 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-4 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-4 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-5 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-5 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-6 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-6 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-7 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-7 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-8 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-8 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-9 {
            width: 336px;
            height: 280px;
        }

        .bn-mb-9 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-10 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-10 {
            width: 300px;
            height: 250px;
        }

        .bn-ds-11 {
            width: 728px;
            height: 90px;
        }

        .bn-mb-11 {
            width: 300px;
            height: 250px;
        }
    </style>
    <style>
        .nav-link {
            transition: none !important
        }

        #nav-top {
            background-color: #fff !important
        }

        #header {
            background-color: var(--vr-block-color) !important
        }

        .mega-menu .menu-left {
            background-color: var(--vr-mega-menu-color)
        }

        .nav-mobile {
            background-color: var(--vr-mega-menu-color)
        }

        .nav-mobile .nav-item .nav-link {
            color: #fff
        }

        .nav-mobile .profile-dropdown-mobile .menu-sub-items .dropdown-item {
            color: #fff
        }

        .nav-mobile .profile-dropdown-mobile {
            border-bottom: 1px solid var(--vr-block-color)
        }

        .nav-mobile .btn-default {
            background-color: var(--vr-theme-color) !important;
            border-color: var(--vr-theme-color) !important;
            color: #fff !important
        }

        #nav-top .navbar-nav .nav-item .nav-link {
            color: #222 !important;
            font-weight: 600;
            font-size: 13px;
            padding: 6px 0
        }

        #nav-top .navbar-nav .nav-item svg {
            color: #222
        }

        #nav-top .navbar-nav .nav-item .nav-link:hover,
        #nav-top .navbar-nav .nav-item .nav-link:active,
        #nav-top .navbar-nav .nav-item .nav-link:focus {
            color: #444 !important
        }

        .profile-dropdown>a img {
            border: 1px solid #d5d5d5
        }

        .profile-dropdown .dropdown-menu {
            top: 0 !important
        }

        .nav-main .navbar-nav .nav-link {
            padding: 10px 14px;
            font-size: 12px;
            color: #fff
        }

        .nav-main .navbar-right .nav-link {
            color: #fff !important
        }

        .nav-main .navbar-brand .logo {
            height: 44px
        }

        .nav-main .search-icon svg {
            width: 20px;
            height: 20px
        }

        .nav-main {
            border-bottom: 0
        }

        .news .mega-menu {
            border-top: 0;
            top: 0
        }

        .mega-menu .menu-left {
            background-image: linear-gradient(rgba(0, 0, 0, 0.09) 0 0)
        }

        .mega-menu .menu-left a {
            color: #fff;
            transition: none !important
        }

        .badge-category {
            text-transform: uppercase;
            font-size: 11px
        }

        .section-featured .col-featured-left {
            width: 50% !important;
            padding-right: 20px !important
        }

        .section-featured .col-featured-right {
            width: 25% !important;
            padding-left: 0 !important;
            padding-right: 20px !important
        }

        .section-featured .col-featured-right .col-first .item {
            margin-bottom: 20px
        }

        .top-headlines {
            display: block;
            position: relative;
            width: 25% !important;
            padding-left: 0 !important
        }

        .top-headlines .top-headlines-title {
            margin-bottom: 15px;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -1px;
            line-height: 1
        }

        .top-headlines .items {
            width: 100%;
            height: 482px;
            display: flex;
            flex-flow: column wrap;
            overflow: hidden
        }

        .top-headlines .item {
            display: block;
            width: 100%;
            position: relative;
            padding-top: 12px;
            margin-top: 12px;
            border-top: 1px solid #ececec
        }

        .top-headlines .item-first {
            border: 0 !important;
            padding-top: 0;
            margin-top: 0
        }

        .top-headlines .item .title {
            margin-top: 0;
            margin-bottom: 3px;
            font-size: 14px;
            line-height: 19px;
            font-weight: 600 !important
        }

        .top-headlines .item .category {
            margin-right: 5px;
            font-size: 11px;
            line-height: 1;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: -.4px
        }

        .top-headlines .item .date {
            font-size: 11px;
            font-weight: 600;
            line-height: 1;
            color: #555;
            letter-spacing: -.4px
        }

        .header-mobile svg {
            color: #fff !important;
            stroke: #fff !important
        }

        .header-mobile-container {
            border-bottom: 0
        }

        .top-headlines .item .category {
            color: var(--vr-theme-color) !important
        }

        .header-mobile,
        .mobile-search-form {
            background-color: var(--vr-block-color) !important
        }

        @media (min-width: 767.98px) {
            .section-featured .col-featured-right .item {
                height: 253px
            }
        }

        @media (max-width: 1399.98px) {
            .section-featured .col-featured-right .item {
                height: 217px
            }
        }

        @media (max-width: 1199.98px) {
            .nav-main .navbar-nav .nav-link {
                padding: 10px 8px
            }

            .top-headlines .items {
                height: 410px
            }
        }

        @media (max-width: 991.98px) {
            .news #header {
                background-color: transparent !important
            }

            .section-featured .col-featured-left {
                width: 100% !important;
                padding-right: 0 !important
            }

            .section-featured .col-featured-right {
                width: 100% !important;
                padding: 0 !important
            }

            .section-featured .col-featured-right .row {
                --bs-gutter-x: .25rem
            }

            .section-featured .col-featured-right .col-12 {
                width: 50% !important
            }

            .top-headlines {
                width: 100% !important;
                padding: 0 15px !important;
                margin-top: 10px;
                margin-bottom: 10px
            }

            .top-headlines .items {
                height: auto
            }
        }

        @media (max-width: 575.98px) {
            .section-featured .col-featured-right .item .post-meta {
                display: none
            }

            .col-featured-right .item .caption .title {
                font-size: 14px;
                line-height: 18px
            }

            .section-featured .col-featured-right .item {
                height: 210px
            }
        }

        @media (max-width: 427.98px) {
            .section-featured .col-featured-right .item {
                height: 185px
            }
        }
    </style>
    <script>
        var VrConfig = {
            baseURL: '<?= base_url() ?>',
            csrfTokenName: 'app_csrf_token',
            csrfCookieName: 'vrapp_csrf_cookie',
            sysLangId: '1',
            rtl: false,
            isRecaptchaEnabled: '0',
            categorySliderIds: [],
            textOk: "OK",
            textCancel: "Cancel",
            textCorrectAnswer: "Correct Answer",
            textWrongAnswer: "Wrong Answer"
        };
    </script>
</head>