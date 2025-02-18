<?php
if (!defined('ABSPATH')) {
    exit; // 直接アクセスを防ぐ
}
function add_navigation_edit_menu() {
    add_options_page(
        'ナビゲーション編集', // ページタイトル
        'ナビゲーション編集', // メニュータイトル
        'manage_options', // 権限
        'navigation-edit', // スラッグ
        'render_navigation_edit_page' // コールバック関数
    );
}
add_action('admin_menu', 'add_navigation_edit_menu');

function render_navigation_edit_page() {
    // jQuery UI の sortable を適用するスクリプトを登録
    add_action('admin_footer', function () { ?>
        <style>
            .handle {
                cursor: grab;
            }
            .handle td {
                padding-top: 12px;
                padding-bottom: 12px;
            }
            .handle:not(:last-child) td {
                border-bottom: 1px solid #ddd !important;
            }
            .handle:active {
                cursor: grabbing;
            }
        </style>
    <?php });

    // 固定ページを取得
    $pages = get_pages();

    // デフォルトのナビゲーションメニュー
    $default_menu_items = array(
        array('id' => 2, 'title' => 'ダッシュボード', 'slug' => 'index.php'),
        array('id' => 4, 'title' => '区切り線１', 'slug' => 'separator1'),
        array('id' => 5, 'title' => '投稿', 'slug' => 'edit.php'),
        array('id' => 10, 'title' => 'メディア', 'slug' => 'upload.php'),
        array('id' => 15, 'title' => 'リンク', 'slug' => 'link-manager.php'),
        array('id' => 20, 'title' => '固定ページ', 'slug' => 'edit.php?post_type=page'),
        array('id' => 25, 'title' => 'コメント', 'slug' => 'edit-comments.php'),
        array('id' => 59, 'title' => '区切り線２', 'slug' => 'separator2'),
        array('id' => 60, 'title' => 'テーマ', 'slug' => 'themes.php'),
        array('id' => 65, 'title' => 'プラグイン', 'slug' => 'plugins.php'),
        array('id' => 70, 'title' => 'プロフィール', 'slug' => 'users.php'),
        array('id' => 75, 'title' => 'ツール', 'slug' => 'tools.php'),
        array('id' => 80, 'title' => '設定', 'slug' => 'options-general.php'),
        array('id' => 59, 'title' => '区切り線３', 'slug' => 'separator-last'),
    );

    // 固定ページを追加
    foreach ($pages as $page) {
        $default_menu_items[] = array(
            'id' => $page->ID,
            'title' => $page->post_title,
            'slug' => get_permalink($page->ID)
        );
    }

    ?>
    <div class="wrap">
        <h1>ナビゲーション編集</h1>
        <form method="post" action="">
            <?php wp_nonce_field('navigation_edit_nonce', 'navigation_edit_nonce_field'); ?>
            <table class="widefat fixed">
                <thead>
                    <tr>
                        <th>表示項目名</th>
                        <th>リンク</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody id="navigation-list">
                    <?php foreach ($default_menu_items as $index => $item): ?>
                        <tr class="handle">
                            <td><?php echo esc_html($item['title']); ?></td>
                            <td>
                                <a href="<?php echo esc_url($item['slug']); ?>" target="_blank">
                                    <?php echo esc_html($item['slug']); ?>
                                </a>
                                <input type="hidden" name="slug[<?php echo esc_attr($item['id']); ?>]" value="<?php echo esc_attr($item['slug']); ?>">
                            </td>
                            <td>
                                <input type="checkbox" name="delete[<?php echo esc_attr($item['id']); ?>]" value="1">
                            </td>
                            <input type="hidden" class="order-input" name="order[<?php echo esc_attr($item['id']); ?>]" value="<?php echo esc_attr($index + 1); ?>">
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>
                <input type="submit" name="save_navigation" class="button button-primary" value="保存">
            </p>
        </form>
    </div>
    <?php
}
