<?php

if (!isset($content_width)) {
    $content_width = 790;
}

/**
 * OGPとTwitterカードを設定する
 *
 * @return void
 */
function my_meta_ogp() {
    if(is_front_page() || is_home() || is_singular()){
        global $post;
        $ogp_title = '';
        $ogp_descr = '';
        $ogp_url = '';
        $ogp_img = '';
        $insert = '';
        if (is_singular()) {
            setup_postdata($post);
            $ogp_title = $post->post_title;
            $ogp_descr = mb_substr(get_the_excerpt(), 0, 100);
            $ogp_url = get_permalink();
            wp_reset_postdata();
        } elseif (is_front_page() || is_home()) {
            $ogp_title = get_bloginfo('name');
            $ogp_descr = get_bloginfo('description');
            $ogp_url = home_url();
        }
        $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';
        $ogp_img = '<meta property="og:image" content="'.esc_attr(get_template_directory_uri()).'/img/opg_img.png">'."\n";
        $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
        $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
        $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
        $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
        $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
        $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
        // $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
        $insert .= '<meta name="twitter:site" content="@kei_taro1129" />' . "\n";
        $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";
        echo $insert;
    }
}
// add_action('wp_head', 'my_meta_ogp');                                    //headにOGPを出力

/**
 * WordPressのバージョン情報が書かれたmetaタグを非表示にする
 */
remove_action('wp_head','wp_generator');

/**
 * プラグインのバージョン情報を非表示にする
 *
 * @param [type] $src
 * @return void
 */
function remove_cssjs_ver2($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver2', 9999);
add_filter('script_loader_src', 'remove_cssjs_ver2', 9999);

/**
 * テーマの基本セットアップを組む
 *
 * @return void
 */
function custom_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-link');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(790, 300, true);
    add_image_size('single-thumbnail', 955, 500, true);
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_editor_style('css/editor-style.css');
}
add_action('after_setup_theme', 'custom_theme_setup');


/**
 * cssとjsを読み込む
 *
 * @return void
 */
function  css_js_reader() {
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1');
    wp_enqueue_style('bootstrap-reboot-css', get_template_directory_uri().'/css/bootstrap-reboot.min.css', array(), '4.1.3');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css', array(), '4.1.3');
    wp_enqueue_style('app-css', get_template_directory_uri().'/css/app.css', array(), '1');
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-3.3.1.js', array(), '3.3.1', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.bundle.min.js', array(), '4.1.3', true);
    wp_enqueue_script('app-js', get_template_directory_uri().'/js/app.js', array(), '1', true);
}
add_action('wp_enqueue_scripts', 'css_js_reader');


/**
 * ファビコンを設定する
 *
 * @return void
 */
function favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
}
add_action('wp_head', 'favicon');

/**
 * 管理画面にファビコンを設定する
 *
 * @return void
 */
function admin_favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon');
