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

                        <!-- ▼記事を検索▼ -->
                        <div class="col-sm-12">
                            <div id="404-search" class="my-5">
                                <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>記事を検索 - Search -</h5>
                                <form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <div class="form-group mb-2 w-100">
                                        <div class="w-75 pr-2">
                                            <input type="text" class="form-control w-100" placeholder="文字列を入力してください..." value="<?php echo get_search_query(); ?>" name="s" id="s">
                                        </div>
                                        <div class="w-25 pl-3">
                                            <input type="submit" id="searchsubmit" class="btn btn-primary w-100" value="検索">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- ▲記事を検索▲ -->

                        <!-- ▼人気記事一覧▼ -->
                        <div id="404-relation" class="my-5">
                            <!-- <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>人気記事一覧 - Popular Articles -</h5> -->
                            <?php get_template_part('recommend'); ?>
                        </div>
                        <!-- ▲人気記事一覧▲ -->

                        <!-- ▼カテゴリー一覧▼ -->
                        <div class="col-sm-12">
                            <div id="404-categories" class="my-5">
                                <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>カテゴリー一覧 - Category -</h5>
                                <div id="sidebar-widget" class="col-sm-12">
                                    <div class="accordion" id="accordion2" role="tablist">
                                        <div class="card-header text-center rounded-0 text-center text-white bg-primary">記事のカテゴリー</div>
                                        <?php
                                        $pc_combi_list = get_category_combi_list(false);
                                        $i = 0;
                                        ?>
                                        <?php foreach ($pc_combi_list as $parent => $children_list): ?>
                                        <?php $i++; ?>
                                        <div class="card rounded-0">
                                            <div class="card-header bg-white" role="tab" id="heading<?php echo esc_html($i); ?>">
                                                <h5 id="parent-category" class="mb-0">
                                                    <a class="text-body collapsed px-3 py-3" data-toggle="collapse" href="#collapse<?php echo esc_html($i); ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_html($i); ?>">
                                                        <?php echo esc_html($parent); ?>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse<?php echo esc_html($i); ?>" class="collapse text-whtie" role="tabpane<?php echo esc_html($i); ?>" aria-labelledby="heading<?php echo esc_html($i); ?>" data-parent="#accordion2" style="">
                                                <?php foreach ($children_list as $children): ?>
                                                <a href="<?php echo esc_url(home_url('/category/'.$children["slug"])); ?>"><div id="child-category" class="card-body px-5 py-2"><?php echo esc_html($children["name"]); ?>    (<?php echo esc_html($children["count"]) ?>)</div></a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ▲カテゴリー一覧▲ -->

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
