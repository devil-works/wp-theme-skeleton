<?php
if (!defined('ABSPATH')) {
    exit; // 直接アクセスを防ぐ
}

/**
 * ナビゲーション編集メニューを管理画面に追加
 */
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

/**
 * ナビゲーション編集ページの内容を表示
 */
function render_navigation_edit_page() {
    // jQuery UI の sortable を適用するスクリプトを登録
    add_action('admin_footer', function () { ?>
        <style>
        #navigation-list-title {
            text-align: right;
            background-color: #fff;
            width: 100%;
            max-width: 420px;
            padding-top: 4px;
            padding-bottom: 4px;
            margin-bottom: 4px;
        }
        #navigation-list-title span {
            display: inline-block;
            margin-right: 18px;
        }
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }

        .toggle-switch .toggle-input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-switch .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 20px;
        }

        .toggle-switch .toggle-slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        .toggle-switch .toggle-input:checked + .toggle-slider {
            background-color: #4CAF50;
        }

        .toggle-switch .toggle-input:checked + .toggle-slider:before {
            transform: translateX(14px);
        }
        .navigation-list {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            max-width: 420px;
        }

        .navigation-list .handle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border: 1px solid #ddd;
            padding: 12px;
            margin-bottom: 4px;
            cursor: grab;
        }

        .navigation-list .handle:active {
            cursor: grabbing;
            background: #f0f0f0;
        }

        .navigation-list .title {
            flex: 1;
            font-weight: bold;
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
        array('id' => 60, 'title' => '外観', 'slug' => 'themes.php'),
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

    // 表示・非表示データを取得
    $visibility_data = get_option('custom_navigation_visibility', []);

    // DBに保存された順番を取得
    $saved_order = get_option('custom_navigation_order', []);
    if (!empty($saved_order)) {
        usort($default_menu_items, function ($a, $b) use ($saved_order) {
            $pos_a = array_search($a['id'], $saved_order);
            $pos_b = array_search($b['id'], $saved_order);
            return ($pos_a === false ? PHP_INT_MAX : $pos_a) - ($pos_b === false ? PHP_INT_MAX : $pos_b);
        });
    }

    ?>
    <div class="wrap">
        <h1>ナビゲーション編集</h1>
        <div id="navigation-list-title">
            <span>表示</span>
        </div>
        <ul id="navigation-list" class="navigation-list">
            <?php foreach ($default_menu_items as $index => $item): 
                $is_visible = isset($visibility_data[$item['id']]) ? (bool)$visibility_data[$item['id']] : true;
            ?>
                <li class="handle" data-id="<?php echo esc_attr($item['id']); ?>" data-visible="<?php echo esc_attr($is_visible ? 1 : 0); ?>">
                    <span class="title"><?php echo esc_html($item['title']); ?></span>
                    
                    <!-- トグルスイッチ -->
                    <label class="toggle-switch">
                        <input type="checkbox" class="toggle-input" <?php echo $is_visible ? 'checked' : ''; ?>>
                        <span class="toggle-slider"></span>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
}

/**
 * ナビゲーションの順番を保存
 */
function save_navigation_order() {
    if (!isset($_POST['navigation_edit_nonce']) || !wp_verify_nonce($_POST['navigation_edit_nonce'], 'navigation_edit_nonce')) {
        wp_send_json_error(['message' => 'Nonce verification failed.']);
    }

    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'Permission denied.']);
    }

    if (isset($_POST['order']) && is_array($_POST['order'])) {
        update_option('custom_navigation_order', $_POST['order']);
        wp_send_json_success(['message' => 'Navigation order updated.']);
    } else {
        wp_send_json_error(['message' => 'Invalid data.']);
    }
}
add_action('wp_ajax_save_navigation_order', 'save_navigation_order');

/**
 * ナビゲーションの表示・非表示状態を保存
 */
function save_navigation_visibility() {
    if (!isset($_POST['navigation_edit_nonce']) || !wp_verify_nonce($_POST['navigation_edit_nonce'], 'navigation_edit_nonce')) {
        wp_send_json_error(['message' => 'Nonce verification failed.']);
    }

    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'Permission denied.']);
    }

    if (isset($_POST['id']) && isset($_POST['visible'])) {
        $id = sanitize_text_field($_POST['id']);
        $visible = intval($_POST['visible']);

        // 表示・非表示データを保存
        $visibility_data = get_option('custom_navigation_visibility', []);
        $visibility_data[$id] = $visible;
        update_option('custom_navigation_visibility', $visibility_data);

        wp_send_json_success(['message' => 'Navigation visibility updated.']);
    } else {
        wp_send_json_error(['message' => 'Invalid data.']);
    }
}
add_action('wp_ajax_save_navigation_visibility', 'save_navigation_visibility');

