@@include('./utils.js')
@@include('./scripts.js')

window.addEventListener("DOMContentLoaded", () => {
    if (isMobile()) {
        document.body.classList.add('mobile');
    }

    if (iOS()) {
        document.body.classList.add('mobile-ios');
    }

    if (isSafari()) {
        document.body.classList.add('safari');
    }
    initHandlerDocumentClick();
    replaceImageToInlineSvg('.img-svg');
    initSmoothScrollByAnchors();
    initAnchorsLinkOffset();
    initTabs();

    // ==== components =====================================================
    @@include('../../components/stars/stars.js')
    // ==== // components =====================================================


    // ==== sections =====================================================
    @@include('../../sections/header/header.js')
    @@include('../../sections/fi-faq/fi-faq.js')
    // ==== // sections =====================================================

    document.body.classList.add('page-loaded');
}); 
