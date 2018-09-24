<!-- ▼ヘッダーファイル読み込み▼ -->
<?php get_header(); ?>
<!-- ▲ヘッダーファイル読み込み▲ -->

<div class="container main-wrapper pb-4">
    <div class="row py-5 mb-4 border bg-white">
        <!-- ▼投稿記事一覧▼ -->
        <div class="col-sm-8 px-4 post-list">
            <div class="row">

                <!-- ▼投稿記事内容を出力▼ -->
                <div id="content" class="col-sm-12 pb-3 px-4">
                    <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                    <div id="content-title" class="py-0 my-0"><h1><?php the_title(); ?></h1></div>
                    <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('single-thumbnail', array('id' => 'content-thumbnail', 'alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?>
                    <?php else: ?>
                    <img id="content-thumbnail" width="100%" height="360px" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimage.png" alt="content-thumbnail">
                    <?php endif; ?>
                    <?php get_template_part('snsbtn', 'square'); ?>
                    <div id="content-main" class="py-5">
                        <?php the_content(); ?>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <?php get_template_part('snsbtn', 'square'); ?>

                    <?php if( has_tag() ): ?>
                    <div id="content-tag">
                        <?php the_tags( '<a href="#" class="badge badge-warning mr-2 text-white"><span class="fas fa-tag pr-2"></span>', '</a><a href="#" class="badge badge-warning mr-2 text-white"><span class="fas fa-tag pr-2"></span>', '</a>' ); ?>
                    </div>
                    <?php endif; ?>
                    <!-- <a href="#" class="badge badge-warning mr-2 text-white"><span class="fas fa-tag pr-2"></span>プログラミング</a>
                    <a href="#" class="badge badge-warning mr-2 text-white"><span class="fas fa-tag pr-2"></span>テクニック</a> -->

                    <!-- ▼丸いsnsボタンリスト▼ -->
                    <div id="snsbtn-circle" class="d-none d-sm-block">
                        <?php get_template_part('snsbtn', 'circle'); ?>
                    </div>
                    <!-- ▲丸いsnsボタンリスト▲ -->

                </div>
                <!-- ▲投稿記事内容を出力▲ -->

            </div>
        </div>
        <!-- ▲投稿記事一覧▲ -->

        <!-- ▼サイドバー▼ -->
        <?php get_sidebar(); ?>
        <!-- ▲サイドバー▲ -->

    </div>
</div>

<?php get_footer(); ?>
