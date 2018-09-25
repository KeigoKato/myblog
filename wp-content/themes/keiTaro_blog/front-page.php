<!-- ▼ヘッダーファイル読み込み▼ -->
<?php get_header(); ?>
<!-- ▲ヘッダーファイル読み込み▲ -->

<div class="container main-wrapper py-4">
    <div class="row py-5 mb-4 border bg-white">
        <!-- ▼投稿記事一覧▼ -->
        <div class="col-sm-8 px-4 post-list">
            <div class="row mx-0">

                <div class="col-sm-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active rounded-0" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">最新記事</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ITエンジニア</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-0" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">WordPress</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <!-- ▼最新記事一覧▼ -->
                            <div class="card-deck">
                                <?php if (have_posts()): ?>
                                <?php while (have_posts()): the_post(); ?>
                                <?php get_template_part('main', 'loop'); ?>
                                <!-- ▼ページネーション▼ -->
                                <?php
                                if (function_exists("pagination")) {
                                    pagination($wp_query->max_num_pages);
                                }
                                ?>
                                <!-- ▲ページネーション▲ -->
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <!-- ▲最新一覧▲ -->
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-deck">
                                <?php
                                $args = array(
                                    'category_name' => 'it-engineer',
                                    'posts_per_page' => 6,
                                    'ignore_sticky_posts' => 1
                                );
                                $iteng_posts = new WP_Query($args);
                                $first_post = true;
                                ?>
                                <?php if ($iteng_posts->have_posts()): ?>
                                <?php while ($iteng_posts->have_posts()): $iteng_posts->the_post(); ?>
                                <?php get_template_part('main', 'loop'); ?>
                                <?php endwhile; ?>
                                <?php else: ?>
                                投稿がありません
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <!-- ▼一覧ページ▼ -->
                            <div class="row text-center">
                                <div class="col-sm-12 text-center">
                                    <a href="<?php echo esc_url(home_url('/category/it-engineer/')); ?>"><button type="button" class="btn btn-outline-primary" href="<?php echo esc_url(home_url('/wordpress/')); ?>">もっと見る</button></a>
                                </div>
                            </div>
                            <!-- ▲一覧ページ▲ -->
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card-deck">
                                <?php
                                $args = array(
                                    'category_name' => 'wordpress',
                                    'posts_per_page' => 6,
                                    'ignore_sticky_posts' => 1
                                );
                                $wpress_posts = new WP_Query($args);
                                $first_post = true;
                                ?>
                                <?php if ($wpress_posts->have_posts()): ?>
                                <?php while ($wpress_posts->have_posts()): $wpress_posts->the_post(); ?>
                                <?php get_template_part('main', 'loop'); ?>
                                <?php endwhile; ?>
                                <?php else: ?>
                                投稿がありません
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <!-- ▼一覧ページ▼ -->
                            <div class="row text-center">
                                <div class="col-sm-12 text-center">
                                    <a href="<?php echo esc_url(home_url('/category/it-engineer/wordpress/')); ?>"><button type="button" class="btn btn-outline-primary" href="<?php echo esc_url(home_url('/wordpress/')); ?>">もっと見る</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- ▼ページネーション▼ -->
                <?php get_template_part('pagination'); ?>
                <!-- ▲ページネーション▲ -->
            </div>
        </div>
        <!-- ▲投稿記事一覧▲ -->
        <!-- ▼サイドバー▼ -->
        <?php get_sidebar(); ?>
        <!-- ▲サイドバー▲ -->
    </div>
</div>

<?php get_footer(); ?>