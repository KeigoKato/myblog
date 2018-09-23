<?php

/**
 * 現在の記事のカテゴリーを取得する
 *
 * @return void
 */
function get_current_category() {
    $current_cat = get_queried_object();
    $cat_name = $current_cat->name;
    return $cat_name;
}

/**
 * 投稿の親カテゴリーを取得する
 *
 * @return void
 */
function get_the_parent_category() {
    $cats = get_the_category();
    $cat = $cats[0];
    if ($cat->parent) {
        $parent = get_category($cat->parent);
        return $parent->cat_name;
    } else {
        return $cat->cat_name;
    }
}

/**
 * 投稿の子カテゴリーを取得する
 *
 * @return void
 */
function get_the_child_category($cat) {
    $args = array('parent' => $cat);
    $cat_children = get_categories($args);
    if ($cat_children) {
        foreach($cat_children as $cat_child){
            echo $cat_child->name;
        }
    }
}

/**
 * 子カテゴリーをひとつ取り出す
 *
 * @return void
 */
function get_a_child_category() {
    $cats = get_the_category();
    foreach($cats as $cat) {
        if($cat->parent) {
            $child_cat = $cat->cat_name;
        }
    }
    return $child_cat;
}



/**
 * the_excerpt()メソッドで抜粋した文の末尾の文字を変更する
 *
 * @return string
 */
function wp_excerpt_more() {
    return ' ...';
}
add_filter('excerpt_more', 'wp_excerpt_more');

/**
 * 登録されているカテゴリーの親と子を連想配列で取得する。
 * キーが親カテゴリー名で、バリューが子カテゴリー名の配列になっている。
 *
 * @param boolean $ishide_empty
 * @return void
 */
function get_category_combi_list($ishide_empty) {
    $terms = get_terms('category', array(
        'hide_empty' => $ishide_empty                      // 記事がないカテゴリーも取得する
    ));
    $pc_combi_list = array();
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {                        // カテゴリーをひとつずつ見ていく
            $child_ids = array();
            $child_slug = array();
            $child_count = array();
            if ($term->parent === 0) {                     // もし親カテゴリーだったら
                $parent_id = $term->term_id;               // その親カテゴリーのIDを取得する
                $parent_name = $term->name;                // その親カテゴリーの名前はあとで使う
                foreach ($terms as $term) {
                    if ($term->parent === $parent_id) {    // 上で取得した親カテゴリーIDを持つカテゴリーならば
                        $child_ids[] = array('name' => $term->name, 'slug' => $term->slug, 'count' => $term->count);        // その子カテゴリーの名前のリストを作る
                    }
                }
                $pc_combi_list[$parent_name] = $child_ids;      // ある親カテゴリーをキーにして、それに対応する子カテゴリーの配列を値に代入する
            }
        }
    }
    return $pc_combi_list;
}


//カテゴリーの選択を1つに制限
/**
 * カテゴリーの選択を1つに制限する
 * https://dainashiyesterday.com/post-2644/
 *
 * @return void
 */
function limit_category_select() {
?>
    <script type="text/javascript">
    jQuery(function($) {
        // 投稿画面のカテゴリー選択を制限
        var categorydiv = $( '#categorydiv input[type=checkbox]' );
        categorydiv.click( function() {
            $(this).parents( '#categorydiv' ).find( 'input[type=checkbox]' ).attr('checked', false);
            $(this).attr( 'checked', true );
        });
        // クイック編集のカテゴリー選択を制限
        var inline_edit_col_center = $( '.inline-edit-col-center input[type=checkbox]' );
        inline_edit_col_center.click( function() {
            $(this).parents( '.inline-edit-col-center' ).find( 'input[type=checkbox]' ).attr( 'checked', false );
            $(this).attr( 'checked', true );
        });
        $( '#categorydiv #category-pop ul > li:first-child, #categorydiv #category-all ul > li:first-child, .inline-edit-col-center ul.category-checklist > li:first-child' ).before( '<p style="padding-top:5px;">カテゴリーは1つしか選択できません</p>' );
    });
    </script>
<?php
}
add_action( 'admin_print_footer_scripts', 'limit_category_select' );
