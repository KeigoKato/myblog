<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body <?php body_class(); ?>>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="top-navbar-list d-flex py-2">
                <a class="top-navbar-list-item pr-4 change-color" href="<?php echo esc_url(home_url()); ?>">トップ</a>
                <a class="top-navbar-list-item change-color" href="#">プロフィール</a>
            </div>
        </div>
    </nav>

    <!-- ▼ヘッダーの大画像▼ -->
    <div class="header-thumbnail">
    </div>
    <!-- ▲ヘッダーの大画像▲ -->

    <!-- ▼ヘッダー大画像下のナビゲーションバー▼ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-0 under-navmenu">
        <div class="container">
            <button class="navbar-toggler my-1 rounded-circle mx-auto border-dark bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="<?php echo esc_url(home_url()); ?>">トップ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="#">ポートフォリオ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="#">WordPress</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-5 py-3 change-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">記事</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark text-sm-left px-4" href="#">Wordpressカスタマイズ</a>
                            <a class="dropdown-item text-dark text-sm-left px-4" href="#">プログラミング</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-dark text-sm-left px-4" href="#">その他</a>
                            <a class="dropdown-item text-dark text-sm-left px-4" href="#">その他</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="#">記事検索</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="#">お問い合わせ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ▼ヘッダー大画像下のナビゲーションバー▼ -->

</header>
<div class="container px-0">
    <div class="row">
        <!-- ▼パンくずリスト▼ -->
        <div id="breadcrumb" class="w-100">
            <?php breadcrumb(); ?>
        </div>
        <!-- ▲パンくずリスト▲ -->
    </div>
</div>