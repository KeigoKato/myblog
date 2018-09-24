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
                    <?php setPostViews(get_the_ID()); ?>
                    <div id="content-datetime"><time class="text-warning" datetime="<?php the_time('Y-n-d') ?>"><span class="far fa-calendar-alt pr-2"></span><?php the_time('Y/n/d (D)') ?></time></div>
                    <div id="content-category">
                        <a href="#" class="badge badge-warning text-white"><span class="fas fa-folder-open pr-2"></span><?php echo esc_html(get_the_parent_category()); ?></a>
                    </div>
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

                    <!-- ▼この記事を書いた人▼ -->
                    <div id="content-author" class="d-none d-sm-block">
                        <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>この記事を書いた人 - About -</h5>
                        <div class="card flex-md-row shadow-sm h-md-200 rounded-0">
                            <div class="thumbnail position-relative">
                                <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [250x200]" style="width: 180px; height: 180px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img-home-menu-2.png" data-holder-rendered="true">
                            </div>
                            <div class="card-body d-flex flex-column align-items-start p-sm-4 py-5 mw-200px">
                                <h5 class="mb-3">けいたろう。</h5>
                                <p class="card-text mb-0 txts">このサイトを運営しています。主に東京で活動しているWEBエンジニアです。WordPressサイトのカスタマイズ案件を中心に受注しております。私の詳しいプロフィールはこちらをごらんください。</p>
                            </div>
                        </div>
                    </div>
                    <!-- ▲この記事を書いた人▲ -->

                    <!-- ▼丸いsnsボタンリスト▼ -->
                    <div id="snsbtn-circle" class="d-none d-sm-block">
                        <?php get_template_part('snsbtn', 'circle'); ?>
                    </div>
                    <!-- ▲丸いsnsボタンリスト▲ -->

                </div>
                <!-- ▲投稿記事内容を出力▲ -->

            </div>

            <!-- ▼関連投稿一覧▼ -->
            <div class="row mb-5">
                <?php get_template_part('relation'); ?>
            </div>
            <!-- ▲関連投稿一覧▲ -->

            <!-- ▼人気投稿一覧▼ -->
            <div class="row mb-5">
                <?php get_template_part('recommend'); ?>
            </div>
            <!-- ▲人気投稿一覧▲ -->

        </div>
        <!-- ▲投稿記事一覧▲ -->

        <!-- ▼サイドバー▼ -->
        <?php get_sidebar(); ?>
        <!-- ▲サイドバー▲ -->

    </div>
</div>

<?php get_footer(); ?>
