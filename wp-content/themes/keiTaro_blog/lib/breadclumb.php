<?php
/**
 * パンくずリストを表示
 *
 * @return void
 */
function breadcrumb(){
    if (!is_home() || !is_front_page()) {
        global $post;
        $str = '';
        $pNum = 2;
        $str .= '<div class="col-sm-12">';
        $str .= '<nav aria-label="breadcrumb">';
        $str .= '<ol class="breadcrumb py-2 my-3 bg-white border rounded-0" style="font-size: 12px;">';
        $str .= '<li class="breadcrumb-item"><a href="'.home_url('/').'" class="home"><span>HOME</span></a></li>';

        /* 通常の投稿ページ  */
        if(is_singular('post')) {
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach($ancestors as $ancestor) {
                    $str.= '<li class="breadcrumb-item"><a href="'. get_category_link($ancestor).'"><span>'.get_cat_name($ancestor).'</span></a></li>';
                }
            }
            $str.= '<li class="breadcrumb-item"><a href="'. get_category_link($cat-> term_id). '"><span>'.$cat->cat_name.'</span></a></li>';
            $str.= '<li class="breadcrumb-item"><span>'.$post->post_title.'</span></li>';
        }

        /* カスタムポスト */
        elseif(is_single() && !is_singular('post')){
            $cp_name = get_post_type_object(get_post_type())->label;
            $cp_url = home_url('/').get_post_type_object(get_post_type())->name;
            $str.= '<li class="breadcrumb-item"><a href="'.$cp_url.'"><span>'.$cp_name.'</span></a></li>';
            $str.= '<li class="breadcrumb-item"><span>'.$post->post_title.'</span></li>';
        }

        /* 固定ページ */
        elseif(is_page()){
            $pNum = 2;
            if($post->post_parent != 0 ){
                $ancestors = array_reverse(get_post_ancestors($post->ID));
                foreach($ancestors as $ancestor){
                    $str.= '<li class="breadcrumb-item"><a href="'. get_permalink($ancestor).'"><span>'.get_the_title($ancestor).'</span></a></li>';
                }
            }
            $str.= '<li class="breadcrumb-item"><span>'. $post->post_title.'</span></li>';
        }

        /* カテゴリページ */
        elseif(is_category()) {
            $cat = get_queried_object();
            $pNum = 2;
            if($cat->parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach($ancestors as $ancestor){
                    $str.= '<li class="breadcrumb-item"><a href="'. get_category_link($ancestor) .'"><span>'.get_cat_name($ancestor).'</span></a></li>';
                }
            }
            $str.= '<li class="breadcrumb-item"><span>'.$cat->name.'</span></li>';
        }

        /* タグページ */
        elseif(is_tag()) {
            $str.= '<li class="breadcrumb-item"><span>'. single_tag_title('', false). '</span></li>';
        }

        /* 時系列アーカイブページ */
        elseif(is_date()){
            if(get_query_var('day') != 0){
                $str.= '<li class="breadcrumb-item"><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
                $str.= '<li class="breadcrumb-item"><a  href="'.get_month_link(get_query_var('year'), get_query_var('monthnum')).'"><span>'.get_query_var('monthnum').'月</span></a></li>';
                $str.= '<li class="breadcrumb-item"><span>'.get_query_var('day'). '</span>日</li>';
            } elseif(get_query_var('monthnum') != 0) {
                $str.= '<li class="breadcrumb-item"><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
                $str.= '<li class="breadcrumb-item"><span>'.get_query_var('monthnum'). '</span>月</li>';
            } else {
                $str.= '<li class="breadcrumb-item"><span>'.get_query_var('year').'年</span></li>';
            }
        }

        /* 投稿者ページ */
        elseif(is_author()){
            $str.= '<li class="breadcrumb-item"><span>投稿者 : '.get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
        }

        /* 添付ファイルページ */
        elseif(is_attachment()){
            $pNum = 2;
            if($post -> post_parent != 0 ){
                $str.= '<li class="breadcrumb-item"><a href="'.get_permalink($post-> post_parent).'"><span>'.get_the_title($post->post_parent).'</span></a></li>';
            }
            $str.= '<li class="breadcrumb-item"><span>'.$post->post_title.'</span></li>';
        }

        /* 検索結果ページ */
        elseif(is_search()){
            $str.= '<li class="breadcrumb-item"><span>「'.get_search_query().'」で検索した結果</span></li>';
        }

        /* 404 Not Found ページ */
        elseif(is_404()){
            $str.= '<li class="breadcrumb-item"><span>お探しの記事は見つかりませんでした。</span></li>';
        }

        /* その他のページ */
        else {
            $str.= '<li class="breadcrumb-item"><span>'.wp_title('', false).'</span></li>';
        }
        $str.= '</ol>';
        $str.= '</nav>';
        $str.= '</div>';

        echo $str;
    }
}
