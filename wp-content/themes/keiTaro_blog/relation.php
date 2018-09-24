<?php if (!is_404()): ?>
<div id="relations">
    <div class="col-sm-12">
        <h5 class="text-center mb-3"><span class="fas fa-arrow-circle-down pr-3"></span>関連投稿<span class="d-none d-sm-inline"> - Related Posts -</span></h5>
        <div class="card-deck">
            <div class="row mx-sm-2">
            <?php
            $post_id = get_the_ID();
            $categories = get_the_category($post_id);
            foreach ($categories as $cat) {
                $catid = $cat->cat_ID;
                break;
            }
            $relation = new WP_Query(array(
                'posts_per_page' => 4,
                'cat' => $catid,
                'post__not_in' => array($post_id)
            ));
            ?>
            <?php if ($relation->have_posts()): ?>
            <?php while ($relation->have_posts()): $relation->the_post(); ?>
            <div class="col-sm-3 col-6">
                <div class="card mx-0 rounded-0">
                    <a href="<?php the_permalink(); ?>">
                        <div class="imgWrapper">
                            <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('single-thumbnail', array('class' => 'card-img-right flex-auto w-100 h-100', 'alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?>
                            <?php else: ?>
                            <img class="card-img-top" width="100%" height="100px" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimage.png" alt="Card image cap">
                            <?php endif; ?>
                        </div>
                    </a>
                    <span class="position-absolute px-3 text-white bg-primary category-on-img" style="font-size: 10px; cursor: default;"><?php echo esc_html(get_a_child_category()); ?></span>
                    <div class="card-body p-2">
                        <p class="card-text mb-2" style="font-size: 9px;"><time datetime="<?php the_time('Y/m/d') ?>"><span class="far fa-calendar-alt pr-2"></span><?php the_time('Y/n/d (D)'); ?></time></p>
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
<?php endif; ?>