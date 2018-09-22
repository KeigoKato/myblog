<div id="relations">
    <div class="col-sm-12">
        <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>関連投稿 - Related Posts -</h5>
        <div class="card-deck">
            <?php
            $post_id = get_the_ID();
            $categories = get_the_category($post_id);
            foreach ($categories as $cat) {
                $catid = $cat->cat_ID;
                break;
            }
            $recommend = new WP_Query(array(
                'posts_per_page' => 4,
                'cat' => $catid,
                'post__not_in' => array($post_id)
            ));
            ?>
            <div class="row mx-sm-2">
            <?php if ($recommend->have_posts()): ?>
            <?php while ($recommend->have_posts()): $recommend->the_post(); ?>
            <div class="col-sm-3 col-6">
                <div class="card mx-0">
                    <a href="<?php the_permalink(); ?>">
                        <div class="imgWrapper">
                            <?php if (has_post_thumbnail()): ?>
                            <img class="card-img-top" width="100%" height="100px" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimage.png" alt="Card image cap">
                            <?php else: ?>
                            <img class="card-img-top" width="100%" height="100px" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimage.png" alt="Card image cap">
                            <?php endif; ?>
                        </div>
                    </a>
                    <div class="card-body p-2">
                        <p class="card-text mb-2" style="font-size: 9px;"><time datetime="2018-09-12"><span class="far fa-calendar-alt pr-2"></span>2018/09/12</time></p>
                        <a href="<?php the_permalink(); ?>"><h5 class="card-title" style="font-size: 12px"><?php echo wp_trim_words(get_the_title(), 20); ?></h5></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <div class="col-12 mb-3">関連項目はまだありません ...</div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>