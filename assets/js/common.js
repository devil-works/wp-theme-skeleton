jQuery(document).ready(function($) {
    const mobileNavButton = $(".c-mobileNavButton");
    const mobileNav = $(".c-mobileNav");
    const mobileNavContainer = $(".c-mobileNav__container");
    const closeButton = $(".c-mobileNav__closeButton");

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function toggleMobileNav() {
        const expanded = mobileNavButton.attr("aria-expanded") === "true" || false;
        mobileNavButton.attr("aria-expanded", !expanded);

        if (!expanded) {
            mobileNav.addClass("is-open");
            await sleep(100); // 0.5s
            mobileNavContainer.addClass("is-open");
        } else {
            mobileNav.css("transform", "translateX(-15vw)");
            await sleep(300); // 0.2s
            mobileNav.css("transform", "");
            mobileNav.removeClass("is-open");
            await sleep(100); // 0.1s
            mobileNavContainer.removeClass("is-open");
        }
    }

    mobileNavButton.on("click", toggleMobileNav);
    closeButton.on("click", toggleMobileNav);
});