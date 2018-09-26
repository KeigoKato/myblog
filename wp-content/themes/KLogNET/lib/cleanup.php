<?php

/**
 * the_archive_title()の出力における：以下の文字列を削除する
 *
 * @param [type] $title
 * @return void
 */
function modify_archive_title($title) {
    if ( is_category() ) {
        $title = sprintf(__('%s'), single_cat_title('', false));
    } elseif (is_tag()) {
        $title = sprintf(__('%s'), single_tag_title('', false));
    } elseif (is_year()) {
        $title = sprintf(__('%s'), get_the_date(_x('Y', 'yearly archives date format')));
    } elseif (is_month()) {
        $title = sprintf(__('%s'), get_the_date(_x('F Y', 'monthly archives date format')));
    } elseif ( is_day() ) {
        $title = sprintf(__('%s'), get_the_date(_x('F j, Y', 'daily archives date format')));
    } elseif (is_post_type_archive()) {
        $title = sprintf(__('%s'), post_type_archive_title('', false));
    } elseif (is_tax()) {
        $tax = get_taxonomy(get_queried_object()->taxonomy);
        $title = sprintf(__('%2$s'), $tax->labels->singular_name, single_term_title('', false));
    } else {
        $title = __('Archives');
    }
    return $title;
}
add_filter('get_the_archive_title', 'modify_archive_title');
