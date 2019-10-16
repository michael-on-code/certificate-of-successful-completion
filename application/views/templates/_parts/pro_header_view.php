<!DOCTYPE html>
<html lang="fr">
<!-- begin::Head -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8"/>

    <title><?= maybe_null_or_empty($options, 'siteName') ?> | <?= $pageTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $options['siteDescription'] ?>">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?= $uploadPath.$options['siteFavicon'] ?>"/>

    <!--begin::Fonts -->
    <script src="//ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Asap+Condensed:500"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <?php if(isset($headerCss) && !empty($headerCss)){
        foreach ($headerCss as $css){
            ?>
            <link href="<?= $css ?>?v=1.10" rel="stylesheet" type="text/css" />
            <?php
        }
    } ?>
    <link href="<?= $assetsUrl ?>lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/dashforge.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/dashforge.dashboard.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/dashforge.demo.css">
    <link rel="stylesheet" href="<?= $assetsUrl ?>css/stylesheet.css?v=1.12">
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body>
<?php get_flashdata() ?>
<header class="navbar navbar-header navbar-header-fixed">
    <a href="#" id="sidebarMenuOpen" class="burger-menu"><i data-feather="arrow-left"></i></a>
    <div class="navbar-brand">
        <a href="<?= site_url('dashboard') ?>" class="df-logo">AKASI- <span> ABE</span></a>
    </div><!-- navbar-brand -->
    <div class="navbar-right">
        <div class="dropdown dropdown-profile">
            <a href="#" class="dropdown-link" data-toggle="dropdown" data-display="static">
                <div class="avatar avatar-sm"><img src="<?= getUserPhotoUrl(maybe_null_or_empty($user, 'user_photo')) ?>" class="rounded-circle" alt=""></div>
            </a><!-- dropdown-link -->
            <div class="dropdown-menu dropdown-menu-right tx-13">
                <div class="avatar avatar-lg mg-b-15"><img src="<?= getUserPhotoUrl(maybe_null_or_empty($user, 'user_photo')) ?>" class="rounded-circle" alt=""></div>
                <h6 class="tx-semibold mg-b-5"><?= maybe_null_or_empty($user, 'first_name').' '.maybe_null_or_empty($user, 'last_name')?></h6>
                <p class="mg-b-25 tx-12 tx-color-03"><?= $userRole ?></p>
                <div class="dropdown-divider"></div>
                <?php
                if(isset($menus) && !empty($menus)){
                    foreach ($menus as $menu){
                        ?>
                        <a href="<?= $menu['url'] ?>" class="dropdown-item"><i data-feather="<?= $menu['icon'] ?>"></i> <?= $menu['title'] ?></a>
                        <?php
                    }

                }
                ?>
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <a href="<?= site_url('logout') ?>" class="btn btn-buy"><i data-feather="external-link"></i> <span>Déconnexion</span></a>
    </div>
</header><!-- navbar -->

<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
    <div class="sidebar-header">
        <a href="#" id="mainMenuOpen"><i data-feather="menu"></i></a>
        <h5>Menu</h5>
        <a href="#" id="sidebarMenuClose"><i data-feather="x"></i></a>
    </div><!-- sidebar-header -->
    <?php
    if(isset($menus) && !empty($menus)){
        ?>
        <div class="sidebar-body">
            <ul class="sidebar-nav">
                <li class="nav-label mg-b-15">Navigation</li>
                <?php
                foreach ($menus as $key=>$menu){
                    $hasSubmenu = isset($menu['submenus']);
                    ?>
                    <li class="nav-item <?= $hasSubmenu ? 'show' : '' ?>">
                        <a href="<?= $hasSubmenu ? '#' :  $menu['url'] ?>" class="nav-link <?= $hasSubmenu ? 'with-sub' : '' ?>"><i data-feather="<?= $menu['icon'] ?>"></i> <?= $menu['title'] ?></a>
                        <?php
                        if($hasSubmenu){
                            ?>
                            <nav class="nav">
                                <?php
                                foreach ($menu['submenus'] as $submenu){
                                    ?>
                                    <a href="<?= $submenu['url'] ?>"><?= $submenu['title'] ?></a>
                                    <?php
                                }
                                ?>
                            </nav>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- sidebar-body -->
        <?php
    }
    ?>

</div><!-- sidebar -->
<div class="content content-components mg-r-0-f">
    <div class="container-fluid">
        <ol class="breadcrumb df-breadcrumbs mg-b-10">
            <li class="breadcrumb-item"><a href="#"><?= maybe_null_or_empty($options, 'siteName') ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $pageTitle ?></li>
        </ol>
        <h1 class="df-title"><?= $pageTitle ?></h1>