<?php
/**
 * ファビコンやアイコンのリンクを head に挿入
 */
function enqueue_favicon_icons() {
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/icons/favicon.ico" type="image/x-icon">';
    echo '<link rel="icon" sizes="16x16" href="' . get_template_directory_uri() . '/assets/icons/favicon-16x16.png">';
    echo '<link rel="icon" sizes="32x32" href="' . get_template_directory_uri() . '/assets/icons/favicon-32x32.png">';
    echo '<link rel="icon" sizes="192x192" href="' . get_template_directory_uri() . '/assets/icons/android-chrome-192x192.png">';
    echo '<link rel="icon" sizes="512x512" href="' . get_template_directory_uri() . '/assets/icons/android-chrome-512x512.png">';
    echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/assets/icons/apple-touch-icon.png">';
    echo '<link rel="manifest" href="' . get_template_directory_uri() . '/assets/icons/site.webmanifest">';
}
add_action('wp_head', 'enqueue_favicon_icons');

/**
 * JavaScript を読み込む
 */
function enqueue_js() {
    // jQuery の読み込み
    $jquery_file_path = get_template_directory() . '/assets/js/jquery.min.js';
    $jquery_version = filemtime($jquery_file_path);
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), $jquery_version, true);

    // common.js の読み込み
    $common_file_path = get_template_directory() . '/assets/js/common.js';
    $common_version = filemtime($common_file_path);
    wp_enqueue_script('common-js', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), $common_version, true);
}
add_action('wp_enqueue_scripts', 'enqueue_js');

/* 
 * JavaScriptをエンキュー
 */
function enqueue_javascript() {
    // jQuery のファイルパス
    $jquery_file_path = get_template_directory() . '/assets/js/jquery.min.js'; 
    $jquery_version = filemtime($jquery_file_path); // 最終更新日時を取得
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), $jquery_version, true); // true は footer で読み込む設定
    
    // lazysizes のファイルパス
    $lazysizes_file_path = get_template_directory() . '/assets/js/lazysizes.min.js'; 
    $lazysizes_version = filemtime($lazysizes_file_path);
    wp_enqueue_script('lazysizes', get_template_directory_uri() . '/assets/js/lazysizes.min.js', array(), $lazysizes_version, true);
    
    // common.js のファイルパス
    $common_file_path = get_template_directory() . '/assets/js/common.js'; 
    $common_version = filemtime($common_file_path);
    wp_enqueue_script('common', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), $common_version, true);
}
add_action('wp_enqueue_scripts', 'enqueue_javascript');

/**
 * 管理画面用のスタイルシートをエンキュー
 */
function enqueue_admin_styleseets() {
    echo '<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">';
}
add_action('admin_head', 'enqueue_admin_styleseets');

/**
 * 管理画面にJavaScriptをエンキュー
 */
function enqueue_admin_javascript() {
    // jQuery のファイルパス
    $jquery_file_path = get_template_directory() . '/assets/js/jquery.min.js'; 
    $jquery_version = filemtime($jquery_file_path); 
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), $jquery_version, true);

    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.14.1/jquery-ui.js', array('jquery'), null, false);

    $admin_file_path = get_template_directory() . '/assets/js/admin.js'; 
    $admin_version = filemtime($admin_file_path);
    wp_enqueue_script('admin', get_template_directory_uri() . '/assets/js/admin.js', array('jquery', 'jquery-ui'), $admin_version, false);

    // ✅ `wp_localize_script()` で nonce と ajaxurl を JS に渡す
    wp_localize_script('admin', 'navigationEdit', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('navigation_edit_nonce'),
    ));
}
add_action('admin_enqueue_scripts', 'enqueue_admin_javascript');
