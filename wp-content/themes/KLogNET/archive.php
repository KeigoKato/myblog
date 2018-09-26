<!-- ▼ヘッダーファイル読み込み▼ -->
<?php get_header(); ?>
<!-- ▲ヘッダーファイル読み込み▲ -->

<div class="container main-wrapper pb-4">
    <div class="row py-5 mb-4 border bg-white">

        <!-- ▼パンくずリスト▼ -->
        <?php get_template_part('breadcrumb'); ?>
        <!-- ▲パンくずリスト▲ -->

        <!-- ▼投稿記事一覧▼ -->
        <div class="col-sm-8 px-4 post-list">

            <!-- ▼アーカイブ名▼ -->
            <div id="archive-title" class="mb-4 text-center">
                <div style="font-size: 12px;">
                    <?php if (is_category()): ?>
                    - カテゴリー -
                    <?php elseif (is_month()): ?>
                    - 月別アーカイブ -
                    <?php elseif (is_year()): ?>
                    - 年別アーカイブ -
                    <?php endif; ?>
                </div>
                <div class="mb-3" style="font-size: 18px;"><?php echo esc_html(the_archive_title()); ?></div>
            </div>
            <!-- ▲アーカイブ名▲ -->

            <div class="row mx-0">
                <!-- ▼記事一覧▼ -->
                <div class="card-deck">
                    <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                    <?php get_template_part('main', 'loop'); ?>
                    <?php endwhile; ?>
                    <!-- ▼ページネーション▼ -->
                    <?php
                    if (function_exists("pagination")) {
                        pagination($wp_query->max_num_pages);
                    }
                    ?>
                    <!-- ▲ページネーション▲ -->
                    <?php endif; ?>
                </div>
                <!-- ▲記事一覧▲ -->

            </div>
        </div>
        <!-- ▲投稿記事一覧▲ -->

        <!-- ▼サイドバー▼ -->
        <?php get_sidebar(); ?>
        <!-- ▲サイドバー▲ -->

    </div>
</div>

<?php get_footer(); ?>