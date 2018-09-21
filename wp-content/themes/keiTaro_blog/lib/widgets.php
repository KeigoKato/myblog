<?php

/**
 * SNSボタンのウィジェットを追加する
 */
class SNS extends WP_Widget {
    /*コンストラクタ*/
    function __construct() {
        parent::__construct(
        'sns_widget',
        'SNSボタン',
        array( 'description' => 'SNSボタンを追加' )
        );
    }
    /*ウィジェット追加画面でのカスタマイズ欄の追加*/
    function form($instance) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル:'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
            name="<?php echo $this->get_field_name('title'); ?>"
            value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <?php
    }
    /*カスタマイズ欄の入力内容が変更された場合の処理*/
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    /*ウィジェットのに出力される要素の設定*/
    function widget($args, $instance) {
        extract($args);
        echo $before_widget;
        if(!empty($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title'] );
        }
        if ($title) {
            echo $before_title . $title . $after_title;
        } else {
            echo '';
        }
        ?>
        <div class="sns-widget">
            <?php get_template_part( 'sns' ); ?>
        </div>
        <?php echo $after_widget;
    }
}
register_widget('SNS');
