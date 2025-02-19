jQuery(document).ready(function($) {
    $("#navigation-list").sortable({
        update: function(event, ui) {
            let order = [];
            $("#navigation-list .handle").each(function() {
                order.push($(this).data("id"));
            });

            $.post(navigationEdit.ajaxurl, {
                action: "save_navigation_order",
                navigation_edit_nonce: navigationEdit.nonce, // 修正
                order: order
            }, function(response) {
                if (response.success) {
                    console.log("Navigation order saved.");
                } else {
                    console.log("Error saving navigation order:", response.data.message);
                }
            });
        }
    });

    // トグルスイッチのクリックイベント
    $(".toggle-input").on("change", function() {
        let listItem = $(this).closest(".handle");
        let itemId = listItem.data("id");
        let isVisible = $(this).is(":checked") ? 1 : 0;

        listItem.attr("data-visible", isVisible);

        $.post(navigationEdit.ajaxurl, {
            action: "save_navigation_visibility", // 修正: 正しいアクション名に変更
            navigation_edit_nonce: navigationEdit.nonce, // 修正
            id: itemId,
            visible: isVisible
        }, function(response) {
            if (response.success) {
                console.log("Visibility updated.");
            } else {
                console.log("Error updating visibility:", response.data.message);
            }
        });
    });
});
