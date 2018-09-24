
<div class="col-sm-6 px-0">
    <div class="card mb-5 rounded-0">
        <div class="imgWrapper">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('single-thumbnail', array('class' => 'card-img-right flex-auto w-100 h-100', 'alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?>
                <?php else: ?>
                <img class="card-img-right flex-auto w-100 h-100" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimage.png" alt="noimage">
                <?php endif; ?>
            </a>
        </div>
        <span class="position-absolute px-3 text-white bg-primary category-on-img" style="cursor: default;">
            <?php if (is_home() || is_front_page()): ?>
            <?php echo esc_html(get_the_parent_category($cat)); ?>
            <?php elseif (is_archive()): ?>
            <?php echo esc_html(get_a_child_category()); ?>
            <?php endif; ?>
        </span>
        <div class="card-body">
            <h5 class="mb-1">
                <a class="text-dark" style="font-size: 18px;" href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 30); ?></a>
            </h5>
            <div class="mb-1 text-muted text-right"><small><time datetime="<?php the_time('Y-m-d') ?>"><span class="far fa-calendar-alt pr-2"></span><?php the_time('Y/n/d (D)'); ?></time></small></div>
            <!-- <p class="card-text mb-0 mt-auto txts"><?php //echo wp_trim_words(get_the_excerpt(), 90); ?></p> -->
        </div>
    </div>
</div>