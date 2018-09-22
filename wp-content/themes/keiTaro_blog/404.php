<!-- ▼ヘッダーファイル読み込み▼ -->
<?php get_header(); ?>
<!-- ▲ヘッダーファイル読み込み▲ -->

<div class="container main-wrapper pb-4">
    <div class="row py-5 mb-4 border bg-white">
        <!-- ▼投稿記事一覧▼ -->
        <div class="col-sm-8 px-4 post-list">
            <div class="row">

                <!-- ▼記事内容を出力▼ -->
                <div id="content" class="col-sm-12 pb-3 px-4">
                    <div id="404-title" class="mb-5">
                        <h2>お探しのページは削除されたかURLが変更された可能性があります。</h2>
                        <p>お手数をおかけしますが、以下の方法からもう一度目的のページをお探し下さい。</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="404-search" class="mb-5">
                                <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>記事を検索 - Search -</h5>
                                <form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <div class="form-group mb-2 w-100">
                                        <!-- <label class="screen-reader-text" for="s"><?php // _x( 'Search for:', 'label' ); ?></label> -->
                                        <div class="w-75 pr-2">
                                            <input type="text" class="form-control w-100" placeholder="文字列を入力してください..." value="<?php echo get_search_query(); ?>" name="s" id="s">
                                        </div>
                                        <div class="w-25 pl-3">
                                            <input type="submit" id="searchsubmit" class="btn btn-primary w-100" value="<?php //echo esc_attr_x( 'Search', 'submit button' ); ?>検索">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="404-relation" class="mb-5">
                            <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>人気記事一覧 - Popular Articles -</h5>
                        </div>
                        <div id="404-categories" class="mb-5">
                            <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>カテゴリー一覧 - Category -</h5>
                        </div>
                    </div>
                </div>
                <!-- ▲記事内容を出力▲ -->

            </div>
        </div>
        <!-- ▲投稿記事一覧▲ -->

        <!-- ▼サイドバー▼ -->
        <?php get_sidebar(); ?>
        <!-- ▲サイドバー▲ -->

    </div>
</div>

<?php get_footer(); ?>
