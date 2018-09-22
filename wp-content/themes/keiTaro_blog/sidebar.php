<div class="col-sm-4 px-4 sidebar">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center rounded-0 mb-4">
                <div class="card-header rounded-0 text-center text-white bg-primary">書いてる人</div>
                <img class="card-img-top rounded-circle w-50 py-3 mx-auto" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img-home-menu-2.png" alt="Card image cap">
                <h5 class="card-title">けいたろう</h5>
                <small class="text-muted">WordPressエンジニア</small>
                <div class="card-body px-4 py-3 text-left">
                    <p class="card-text txts">主に東京で活動しているWEBエンジニアです。WordPressサイトのカスタマイズ案件を中心に受注しております。私の詳しいプロフィールは<a href="<?php home_url(); ?>/profile">こちら</a>をごらんください。
                        <!-- このサイトは<a target="_blank" href="https://www.amazon.co.jp/%E3%83%93%E3%82%B8%E3%83%8D%E3%82%B9%E3%82%B5%E3%82%A4%E3%83%88%E3%82%92%E3%81%93%E3%82%8C%E3%81%8B%E3%82%89%E3%81%A4%E3%81%8F%E3%82%8B-WordPress%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3%E5%85%A5%E9%96%80-%E3%82%B5%E3%82%A4%E3%83%88%E5%88%B6%E4%BD%9C%E3%81%8B%E3%82%89%E7%B4%8D%E5%93%81%E3%81%BE%E3%81%A7%E3%81%AE%E3%81%AF%E3%81%98%E3%82%81%E3%81%AE%E4%B8%80%E6%AD%A9-%E7%A7%8B%E5%85%83-%E8%8B%B1%E8%BC%94-ebook/dp/B01CJ92UAW">「ビジネスサイトをこれからつくる WordPressデザイン入門　サイト制作から納品までのはじめの一歩」</a>を参考に作成しました。 -->
                    </p>
                </div>

                <!-- ▼丸いSNSのボタン▼ -->
                <div id="snsbtn-circle">
                    <?php get_template_part('snsbtn', 'circle'); ?>
                </div>
                <!-- ▲丸いSNSのボタン▲ -->

            </div>
        </div>

        <div id="sidebar-widget" class="col-sm-12">
            <div class="accordion" id="accordion2" role="tablist">
                <div class="card-header text-center rounded-0 text-center text-white bg-primary">記事のカテゴリー</div>
                <?php
                $pc_combi_list = get_category_combi_list(false);
                $i = 0;
                ?>
                <?php foreach ($pc_combi_list as $parent => $children): ?>
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
                        <?php foreach ($children as $child): ?>
                        <div id="child-category" class="card-body px-5 py-2"><?php echo esc_html($child); ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>