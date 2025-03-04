jQuery(document).ready(function($) {
    const mobileNavButton = $(".c-mobileNavButton");
    const mobileNav = $(".c-mobileNav");
    const closeButton = $(".c-mobileNav__closeButton");

    function toggleMobileNav() {
        const expanded = mobileNavButton.attr("aria-expanded") === "true" || false;
        mobileNavButton.attr("aria-expanded", !expanded);

        if (!expanded) {
            mobileNav.addClass("is-open");
        } else {
            mobileNav.css("transform", "translateX(-10vw)");
            setTimeout(() => {
                mobileNav.removeClass("is-open");
                mobileNav.css("transform", "");
            }, 200); // 0.2s
        }
    }

    mobileNavButton.on("click", toggleMobileNav);
    closeButton.on("click", toggleMobileNav);
});