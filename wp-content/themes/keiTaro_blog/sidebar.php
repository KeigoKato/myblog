<div class="col-sm-4 px-4 sidebar">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center rounded-0 mb-4">
                <div class="card-header rounded-0 text-center text-white bg-primary">書いてる人</div>
                <img class="card-img-top rounded-circle w-50 py-3 mx-auto" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img-home-menu-2.png" alt="Card image cap">
                <h5 class="card-title">けいたろう</h5>
                <small class="text-muted">WordPressエンジニア</small>
                <div class="card-body px-4 py-3 text-left">
                    <p class="card-text txts"><?php echo wpautop(get_the_author_meta('user_description')); ?></p>
                </div>

                <!-- ▼丸いSNSのボタン▼ -->
                <div id="snsbtn-circle">
                    <?php get_template_part('snsbtn', 'circle'); ?>
                </div>
                <!-- ▲丸いSNSのボタン▲ -->

            </div>
        </div>

        <!-- ▼サイドバーの記事カテゴリー一覧▼ -->
        <div id="sidebar-widget" class="col-sm-12 mb-4">
            <div class="accordion" id="accordion2" role="tablist">
                <div class="card-header text-center rounded-0 text-center text-white bg-primary">記事のカテゴリー</div>
                <?php
                $pc_combi_list = get_category_combi_list(false);
                $i = 0;
                ?>
                <?php foreach ($pc_combi_list as $parent => $children_list): ?>
                <?php $i++; ?>
                <div class="card rounded-0">
                    <div class="card-header bg-white" role="tab" id="heading-category-<?php echo esc_html($i); ?>">
                        <h5 id="parent-category" class="mb-0">
                            <a class="text-body collapsed px-3 py-3" data-toggle="collapse" href="#collapse-category-<?php echo esc_html($i); ?>" aria-expanded="false" aria-controls="collapse-category-<?php echo esc_html($i); ?>">
                                <?php echo esc_html($parent); ?>
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-category-<?php echo esc_html($i); ?>" class="collapse text-whtie" role="tabpane-category-<?php echo esc_html($i); ?>" aria-labelledby="heading-category-<?php echo esc_html($i); ?>" data-parent="#accordion2" style="">
                        <?php foreach ($children_list as $children): ?>
                        <a href="<?php echo esc_url(home_url('/category/'.$children["slug"])); ?>"><div id="child-category" class="card-body px-5 py-2"><?php echo esc_html($children["name"]); ?>    (<?php echo esc_html($children["count"]) ?>)</div></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- ▲サイドバーの記事カテゴリー一覧▲ -->

        <!-- ▼サイドバーの月別アーカイブ一覧▼ -->
        <div id="sidebar-widget" class="col-sm-12 mb-4">
            <div class="accordion" id="accordion2" role="tablist">
                <div class="card-header text-center rounded-0 text-center text-white bg-primary">月別アーカイブ</div>
                <?php
                $archives_year_array = extract_monthly_archive()['yearly'];
                $archives_month_array = extract_monthly_archive()['monthly'];
                $i = 0;
                ?>
                <?php foreach ($archives_year_array as $year_value): ?>
                <?php $i++; ?>
                <div class="card rounded-0">
                    <div class="card-header bg-white" role="tab" id="heading<?php echo esc_html($i); ?>">
                        <h5 id="parent-category" class="mb-0">
                            <a class="text-body collapsed px-3 py-3" data-toggle="collapse" href="#collapse-month-<?php echo esc_html($i); ?>" aria-expanded="false" aria-controls="collapse-month<?php echo esc_html($i); ?>">
                                <?php echo esc_html($year_value); ?>年
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-month-<?php echo esc_html($i); ?>" class="collapse text-whtie" role="tabpane-month-<?php echo esc_html($i); ?>" aria-labelledby="heading-month-<?php echo esc_html($i); ?>" data-parent="#accordion2" style="">
                        <?php foreach ($archives_month_array as $archives_value): ?>
                        <?php if ( intval(strip_tags($archives_value)) == intval($year_value) ): ?>
                        <?php $year = intval($year_value); ?>
                        <?php $month = strstr(str_replace(intval($year_value).'年', '', ltrim($archives_value)), '月', true); ?>
                        <a href="<?php echo esc_url(home_url('/'.$year.'/'.$month.'/')); ?>"><div id="child-category" class="card-body px-5 py-2"><?php echo esc_html(str_replace(intval($year_value).'年', '', ltrim($archives_value))); ?></div></a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- ▲サイドバーの月別アーカイブ一覧▲ -->

    </div>
</div>