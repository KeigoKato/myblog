<?php

/**
 * 記事の閲覧数を取得する
 *
 * @param [type] $postID
 * @return void
 */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/**
 * 記事の閲覧数を保存する
 *
 * @param [type] $postID
 * @return void
 */
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//headに出力されるタグを削除(閲覧数を重複してカウントするのを防止するため)
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
