<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="WordPressの技術ネタを中心に記事を掲載しています。">
    <meta property="og:description" content="WordPressの技術ネタを中心に記事を掲載しています。" />
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body <?php body_class(); ?>>

<header>
    <?php if (is_home() || is_front_page()): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="top-navbar-list d-flex py-2">
                <a class="top-navbar-list-item pr-4 change-color" href="<?php echo esc_url(home_url()); ?>"><i class="fas fa-home"></i>  トップ</a>
                <a class="top-navbar-list-item change-color" href="<?php echo esc_url(home_url('/myprofile/')); ?>"><i class="fas fa-user"></i>  プロフィール</a>
            </div>
        </div>
    </nav>

    <!-- ▼ヘッダーの大画像▼ -->
    <div class="text-center header-thumbnail">
        <div class="pt-4 d-none d-sm-block"><?php bloginfo('description'); ?></div>
        <img class="my-5 h-auto" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/site-title-logo.png" alt="site_title_logo">
    </div>
    <!-- ▲ヘッダーの大画像▲ -->
    <?php endif; ?>

    <!-- ▼ヘッダー大画像下のナビゲーションバー▼ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-0 under-navmenu">
        <div class="container">
            <button class="navbar-toggler my-1 rounded-circle mx-auto border-dark bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="<?php echo esc_url(home_url()); ?>"><i class="fas fa-home"></i>  トップ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="<?php echo esc_url(home_url('/myprofile/')); ?>"><i class="fas fa-user"></i>  プロフィール</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-5 py-3 change-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-newspaper"></i>  記事カテゴリー</a>
                        <?php
                        $pc_combi_list = get_category_combi_list(false);
                        ?>
                        <div class="dropdown-menu text-left rounded-0" aria-labelledby="navbarDropdown">
                            <?php foreach ($pc_combi_list as $parent => $children_list): ?>
                                <?php foreach ($children_list as $children): ?>
                                <a class="dropdown-item text-dark text-sm-left px-4" href="<?php echo esc_url(home_url('/category/'.$children["slug"])); ?>"><?php echo esc_html($children["name"]); ?>    (<?php echo esc_html($children["count"]) ?>)</a>
                                <?php endforeach; ?>
                                <?php if ($children_list !== end($pc_combi_list)): ?>
                                <div class="dropdown-divider"></div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-5 py-3 change-color" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-search"></i>  記事検索</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 change-color" href="<?php echo esc_url(home_url('/contact/')); ?>"><i class="far fa-envelope"></i>  お問い合わせ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ▼ヘッダー大画像下のナビゲーションバー▼ -->

</header>
<div class="container">
    <div class="row">
        <!-- ▼パンくずリスト▼ -->
        <div id="breadcrumbs" class="w-100">
            <?php breadcrumbs(); ?>
        </div>
        <!-- ▲パンくずリスト▲ -->
    </div>
</div>


<!-- ▼検索テキスト欄をモーダルウィンドウで表示▼ -->
<?php get_template_part('modal-search'); ?>
<!-- ▲検索テキスト欄をモーダルウィンドウで表示▲ -->