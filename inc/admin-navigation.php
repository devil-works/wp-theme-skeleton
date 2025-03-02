<?php

// 不要なメニューを追加する
function add_custom_menu_items() {
	// add_menu_page(
    //     'TOPページ',
    //     'TOPページ',
    //     'edit_posts',
    //     'post.php?post=2346&action=edit', // リンク先URL
    //     '',
    //     'dashicons-admin-home', // アイコン
    //     19 // メニューの位置
    // );
}
add_action('admin_menu', 'add_custom_menu_items');

// 不要なメニューを非表示にする
function remove_custom_menu_items() {
    // 非表示にしたいメニューのスラッグの配列
    $menu_pages_to_remove = [
        // 'edit-comments.php',
        // 'edit.php',
        // 'upload.php',
        // 'themes.php',
        // 'plugins.php',
        // 'edit.php?post_type=page'
    ];

    foreach ($menu_pages_to_remove as $page) {
        remove_menu_page($page);
    }
}
add_action('admin_menu', 'remove_custom_menu_items');
