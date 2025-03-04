<?php

/**
 * functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// スクリプトをエンキューする関数を一度だけ読み込む
require_once get_template_directory() . '/inc/enqueue-scripts.php';

// 管理画面のダッシュボードを編集
if (is_admin()) {
    require_once get_template_directory() . '/inc/admin-page.php';
    require_once get_template_directory() . '/inc/admin-navigation.php';
}
