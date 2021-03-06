<?php

if (!isset($content_width)) {
    $content_width = 790;
}

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