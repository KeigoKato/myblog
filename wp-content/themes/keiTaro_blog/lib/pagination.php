<?php

/**
 * Bootstrap4に合わせたページネーションを作成
 *
 * @param int $pages ... 全ページ数を入れる。通常はループの中で$wp_query->max_num_pagesを入れる。
 * @param int $range ... 現在のページから左右に伸ばすページ数を表示する。デフォルトの2であれば現在位置を中心に5個表示される。
 * @param boolean $show_only ... 1ページしかない場合、ボタンを表示させるかどうか。
 * @return void
 */
function pagination($pages = 1, $range = 2, $show_only = false) {
    $pages = (int)$pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;    // WordPressループで使用されるパラメータを取得できる

    //表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = "‹ 前へ";
    $text_next    = "次へ ›";
    $text_last    = "最後へ »";

    if ($show_only && $pages === 1) {    // 1ページのみで表示設定がtrueのとき
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current">1</span></div>';
        return;
    }
    if ($pages === 1) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {    // 2ページ目以降の場合
        echo '<div class="col-sm-12 pb-4"><nav aria-label="pagination"><ul class="pagination justify-content-center">';
        if ($paged > $range + 1) {
            echo '<li class="page-item"><a class="page-link rounded-0" href="'.get_pagenum_link(1).'">'.$text_first.'</a></li>';    // 「最初へ」の文字を出力
        }
        if ($paged > 1) {
            echo '<li class="page-item"><a class="page-link rounded-0" href="'.get_pagenum_link($paged-1).'">'.$text_before.'</a></li>';    // 「前へ」の文字を出力
        }
        for ($i = 1; $i <= $pages; $i++) {
            if ($i <= $paged + $range && $i >= $paged - $range) {
                if ($paged === $i) {    // $pagedの値が±$range以内であればページ番号を出力する
                    echo '<li class="page-item active"><a class="page-link" href="#">'.$i.' <span class="sr-only">(current)</span></a></li>';    // 現在のページ番号ならactiveにする
                } else {
                    echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.' </a></li>';    // 現在のページ番号でないなら非アクティブにする
                }
            }
        }
        if ($paged < $pages) {
            echo '<li class="page-item"><a class="page-link rounded-0" href="'.get_pagenum_link($paged + 1).'">'.$text_next.'</a></li>';    // 「次へ」の文字を出力
        }
        if ($paged + $range < $pages) {
            echo '<li class="page-item"><a class="page-link rounded-0" href="'.get_pagenum_link($pages).'">'.$text_last.'</a>';    // 「最後へ」の文字を出力
        }
        echo '</ul></div>', "\n";
    }
}