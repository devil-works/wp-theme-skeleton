<?php
/**
 * ファビコンやアイコンのリンクを head に挿入
 * 
 */
function enqueue_favicon_icons() {
    // ファビコンやアイコンのリンクを head に挿入
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
 * jQuery を読み込む
 * 
 */
function enqueue_jquery() {
    $jquery_file_path = get_template_directory() . '/assets/js/jquery.min.js'; 
    $jquery_version = filemtime($jquery_file_path); // 最終更新日時を取得
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), $jquery_version, true); // true は footer で読み込む設定
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');