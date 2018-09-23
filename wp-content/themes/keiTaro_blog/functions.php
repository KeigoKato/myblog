<?php

require_once locate_template('lib/init.php');        // 初期設定の関数
// require_once locate_template('lib/cleanup.php');     // 不要なモノを削除する関数
// require_once locate_template('lib/titles.php');      // タイトル出力の関数
// require_once locate_template('lib/scripts.php');     // CSSやJavascript関連の関数
// require_once locate_template('lib/ads.php');         // 広告関連の関数
require_once locate_template('lib/widgets.php');     // サイドバー、ウィジェットの関数
require_once locate_template('lib/breadclumbs.php');     // パンくずリストを表示する関数
require_once locate_template('lib/recommend.php');     // 人気記事一覧を取得する関数
require_once locate_template('lib/pagination.php');     // ページネーションを実装する関数
require_once locate_template('lib/custom.php');      // その他カスタマイズの関数