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
<<<<<<< HEAD
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
=======
 * JavaScriptをエンキューする関数
 * 
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
>>>>>>> 7c49ae2 (Add enquing Common.js)
