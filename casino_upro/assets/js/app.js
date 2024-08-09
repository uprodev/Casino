function slideUp(target, duration = 500) {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout(() => {
        target.style.display = 'none';
        target.style.removeProperty('height');
        target.style.removeProperty('padding-top');
        target.style.removeProperty('padding-bottom');
        target.style.removeProperty('margin-top');
        target.style.removeProperty('margin-bottom');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
        target?.classList.remove('_slide');
    }, duration);
}
function slideDown(target, duration = 500) {
    target.style.removeProperty('display');
    let display = window.getComputedStyle(target).display;
    if (display === 'none')
        display = 'block';

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    window.setTimeout(() => {
        target.style.removeProperty('height');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
        target?.classList.remove('_slide');
    }, duration);
}
function slideToggle(target, duration = 500) {
    if (!target?.classList.contains('_slide')) {
        target?.classList.add('_slide');
        if (window.getComputedStyle(target).display === 'none') {
            return this.slideDown(target, duration);
        } else {
            return this.slideUp(target, duration);
        }
    }
}
function isSafari() {
    let isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    return isSafari;
}
function Android() {
    return navigator.userAgent.match(/Android/i);
}
function BlackBerry() {
    return navigator.userAgent.match(/BlackBerry/i);
}
function iOS() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
}
function Opera() {
    return navigator.userAgent.match(/Opera Mini/i);
}
function Windows() {
    return navigator.userAgent.match(/IEMobile/i);
}
function isMobile() {
    return (Android() || BlackBerry() || iOS() || Opera() || Windows());
}

function toggleDisablePageScroll(state) {
    if (state) {
        const offsetValue = getScrollbarWidth();
        document.documentElement?.classList.add('overflow-hidden');
        document.body?.classList.add('overflow-hidden');
        document.documentElement.style.paddingRight = offsetValue + 'px';
    } else {
        document.documentElement?.classList.remove('overflow-hidden');
        document.body?.classList.remove('overflow-hidden');
        document.documentElement.style.removeProperty('padding-right');
    }
}
function getScrollbarWidth() {
    const lockPaddingValue = window.innerWidth - document.querySelector('body').offsetWidth;

    return lockPaddingValue;
}
function debounce(func, wait) {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}
function throttle(func, limit) {
    let inThrottle;
    return function (...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

function createAnimator({ timing, draw, duration, onEnd }) {
    let start = null;
    let pausedAt = null;
    let rafId = null;

    const animate = time => {
        if (!start) start = time;
        if (pausedAt) {
            start += (time - pausedAt);
            pausedAt = null;
        }
        let timeFraction = (time - start) / duration;
        if (timeFraction > 1) timeFraction = 1;

        let progress = timing(timeFraction);
        draw(progress);

        if (timeFraction < 1) {
            rafId = requestAnimationFrame(animate);
        } else {
            onEnd()
            start = null;
        }
    };

    return {
        start: () => {
            if (!rafId) {
                rafId = requestAnimationFrame(animate);
            }
        },
        pause: () => {
            if (rafId) {
                pausedAt = performance.now();
                cancelAnimationFrame(rafId);
                rafId = null;
            }
        },
        reset: () => {
            if (rafId) {
                cancelAnimationFrame(rafId);
                rafId = null;
            }
            start = null;
            pausedAt = null;
        }
    };
};

function truncateString(el, stringLength = 0) {
    let str = el.innerText;
    if (str.length <= stringLength) return;
    el.innerText = str.slice(0, stringLength) + '...';
}

// === create Animator usage ===

// const animation = createAnimator({
//     duration: 1000,
//     timing(timeFraction) {
//         return timeFraction; // linear
//     },
//     draw: (progress) => {

//     },
//     onEnd: () => {

//     }
// });

// =/== create Animator usage ===

// HTML data-da="where(uniq class name),when(breakpoint),position(digi)"
// e.x. data-da=".content__column-garden,992,2"
// https://github.com/FreelancerLifeStyle/dynamic_adapt

class DynamicAdapt {
    constructor(type) {
        this.type = type;
    }

    init() {
        this.оbjects = [];
        this.daClassname = '_dynamic_adapt_';
        this.nodes = [...document.querySelectorAll('[data-da]')];

        this.nodes.forEach((node) => {
            const data = node.dataset.da.trim();
            const dataArray = data.split(',');
            const оbject = {};
            оbject.element = node;
            оbject.parent = node.parentNode;
            оbject.destination = document.querySelector(`${dataArray[0].trim()}`);
            оbject.breakpoint = dataArray[1] ? dataArray[1].trim() : '767';
            оbject.place = dataArray[2] ? dataArray[2].trim() : 'last';
            оbject.index = this.indexInParent(оbject.parent, оbject.element);
            this.оbjects.push(оbject);
        });

        this.arraySort(this.оbjects);

        this.mediaQueries = this.оbjects
            .map(({
                breakpoint
            }) => `(${this.type}-width: ${breakpoint}px),${breakpoint}`)
            .filter((item, index, self) => self.indexOf(item) === index);

        this.mediaQueries.forEach((media) => {
            const mediaSplit = media.split(',');
            const matchMedia = window.matchMedia(mediaSplit[0]);
            const mediaBreakpoint = mediaSplit[1];

            const оbjectsFilter = this.оbjects.filter(
                ({
                    breakpoint
                }) => breakpoint === mediaBreakpoint
            );
            matchMedia.addEventListener('change', () => {
                this.mediaHandler(matchMedia, оbjectsFilter);
            });
            this.mediaHandler(matchMedia, оbjectsFilter);
        });
    }

    mediaHandler(matchMedia, оbjects) {
        if (matchMedia.matches) {
            оbjects.forEach((оbject) => {
                оbject.index = this.indexInParent(оbject.parent, оbject.element);
                this.moveTo(оbject.place, оbject.element, оbject.destination);
            });
        } else {
            оbjects.forEach(
                ({ parent, element, index }) => {
                    if (element.classList.contains(this.daClassname)) {
                        this.moveBack(parent, element, index);
                    }
                }
            );
        }
    }

    moveTo(place, element, destination) {
        element.classList.add(this.daClassname);
        if (place === 'last' || place >= destination.children.length) {
            destination.append(element);
            return;
        }
        if (place === 'first') {
            destination.prepend(element);
            return;
        }
        destination.children[place].before(element);
    }

    moveBack(parent, element, index) {
        element.classList.remove(this.daClassname);
        if (parent.children[index] !== undefined) {
            parent.children[index].before(element);
        } else {
            parent.append(element);
        }
    }

    indexInParent(parent, element) {
        return [...parent.children].indexOf(element);
    }

    arraySort(arr) {
        if (this.type === 'min') {
            arr.sort((a, b) => {
                if (a.breakpoint === b.breakpoint) {
                    if (a.place === b.place) {
                        return 0;
                    }
                    if (a.place === 'first' || b.place === 'last') {
                        return -1;
                    }
                    if (a.place === 'last' || b.place === 'first') {
                        return 1;
                    }
                    return a.place - b.place;
                }
                return a.breakpoint - b.breakpoint;
            });
        } else {
            arr.sort((a, b) => {
                if (a.breakpoint === b.breakpoint) {
                    if (a.place === b.place) {
                        return 0;
                    }
                    if (a.place === 'first' || b.place === 'last') {
                        return 1;
                    }
                    if (a.place === 'last' || b.place === 'first') {
                        return -1;
                    }
                    return b.place - a.place;
                }
                return b.breakpoint - a.breakpoint;
            });
            return;
        }
    }
}

function replaceImageToInlineSvg(query) {
    const images = document.querySelectorAll(query);

    if (images.length) {
        images.forEach(img => {
            img?.classList.remove('img-svg');
            let xhr = new XMLHttpRequest();
            const src = img.getAttribute('data-src') || img.src;
            xhr.open('GET', src);
            xhr.onload = () => {
                if (xhr.readyState === xhr.DONE) {
                    if (xhr.status === 200) {
                        let svg = xhr.responseXML.documentElement;
                        svg?.classList.add('_svg', ...Array.from(img.classList));
                        img.parentNode.replaceChild(svg, img);
                    }
                }
            }
            xhr.send(null);
        })
    }
}

function initToggleClassesByClick() {
    document.addEventListener('click', (e) => {
        if (e.target.closest('[data-action="remove-classes-by-click"]')) {
            const actionEl = e.target.closest('[data-action="remove-classes-by-click"]');

            let targetSelectors = actionEl.getAttribute('data-target').split(',').map(c => c.trim());
            const classes = actionEl.getAttribute('data-classes').split(',').map(c => c.trim());

            if (/_self/.test(targetSelectors)) {
                targetSelectors = targetSelectors.filter(c => c !== '_self');
                actionEl?.classList.remove(...classes);
            };

            if (!targetSelectors.length) return;
            const targetElements = document.querySelectorAll(targetSelectors);
            targetElements.forEach(targetEl => {
                targetEl?.classList.remove(...classes);
            })
        }

        if (e.target.closest('[data-action="add-classes-by-click"]')) {
            const actionEl = e.target.closest('[data-action="add-classes-by-click"]');

            let targetSelectors = actionEl.getAttribute('data-target').split(',').map(c => c.trim());
            const classes = actionEl.getAttribute('data-classes').split(',').map(c => c.trim());

            if (/_self/.test(targetSelectors)) {
                targetSelectors = targetSelectors.filter(c => c !== '_self');
                actionEl?.classList.add(...classes);
            };

            if (!targetSelectors.length) return;
            const targetElements = document.querySelectorAll(targetSelectors);
            targetElements.forEach(targetEl => {
                targetEl?.classList.add(...classes);
            })
        }
    })
}

function initToggleClassByMatchReqExp() {
    const elements = document.querySelectorAll('[data-action="toggle-class-by-match-req-exp"]');
    elements.forEach(el => {
        const input = el.querySelector('input[type="text"], input[type="email"]');
        if (!input) return;

        const classes = el.getAttribute('data-classes').split(',').map(c => c.trim());

        let regExp;
        if (el.getAttribute('data-reg-exp') === 'email') {
            regExp = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i
        } else {
            regExp = new RegExp(el.getAttribute('data-reg-exp'), 'i');
        }

        let targetSelectors = el.getAttribute('data-target').split(',').map(c => c.trim());
        let targetElements = [];

        if (!targetSelectors.length) return;

        if (/_self/.test(targetSelectors)) {
            targetSelectors = targetSelectors.filter(c => c !== '_self');
            targetElements.push(el);
        };

        targetElements.push(...document.querySelectorAll(targetSelectors));

        input.addEventListener('input', (e) => {
            if (regExp.test(e.target.value)) {
                targetElements.forEach(targetEl => {
                    targetEl?.classList.remove(...classes);
                })
            } else {
                targetElements.forEach(targetEl => {
                    targetEl?.classList.add(...classes);
                })
            }
        })
    })
}

function initAddClassByChangeEvent() {
    const elements = document.querySelectorAll('[data-action="add-classes-by-change-event"]');
    elements.forEach(el => {
        const input = el.querySelector('input[type="radio"]', 'input[type="checkbox"]');
        if (!input) return;

        const classes = el.getAttribute('data-classes').split(',').map(c => c.trim());
        let targetSelectors = el.getAttribute('data-target').split(',').map(c => c.trim());

        let targetElements = [];

        if (!targetSelectors.length) return;

        if (/_self/.test(targetSelectors)) {
            targetSelectors = targetSelectors.filter(c => c !== '_self');
            targetElements.push(el);
        };

        targetElements.push(...document.querySelectorAll(targetSelectors));

        input.addEventListener('change', (e) => {
            if (e.target.checked) {
                targetElements.forEach(targetEl => {
                    targetEl?.classList.add(...classes);
                })
            }
        })
    })
}

function initRemoveClassByChangeEvent() {
    const elements = document.querySelectorAll('[data-action="remove-classes-by-change-event"]');
    elements.forEach(el => {
        const input = el.querySelector('input[type="radio"]', 'input[type="checkbox"]');
        if (!input) return;

        const classes = el.getAttribute('data-classes').split(',').map(c => c.trim());
        let targetSelectors = el.getAttribute('data-target').split(',').map(c => c.trim());

        let targetElements = [];

        if (!targetSelectors.length) return;

        if (/_self/.test(targetSelectors)) {
            targetSelectors = targetSelectors.filter(c => c !== '_self');
            targetElements.push(el);
        };

        targetElements.push(...document.querySelectorAll(targetSelectors));

        input.addEventListener('change', (e) => {
            if (e.target.checked) {
                targetElements.forEach(targetEl => {
                    targetEl?.classList.remove(...classes);
                })
            }
        })
    })
}

function initToggleCollapse() {
    document.addEventListener('click', (e) => {
        if (e.target.closest('[data-toggle-collapse]')) {
            e.preventDefault();
            const el = e.target.closest('[data-toggle-collapse]');

            const selector = el.getAttribute('data-toggle-collapse').trim();
            let targetEl;
            if (/next-element-sibling/.test(selector)) {
                targetEl = el.nextElementSibling;
            } else {
                targetEl = document.querySelector(selector);
            }
            if (!targetEl) return;

            if (el?.classList.contains('active')) {
                el?.classList.remove('active');
                slideUp(targetEl, 300);
            } else {
                el?.classList.add('active');
                slideDown(targetEl, 300);
            }
        }
    })
}

function initToggleCollapseByCheckbox() {
    const elements = document.querySelectorAll('[data-action="toggle-collapse-by-checkbox-change-event"]');
    elements.forEach(el => {
        const input = el.querySelector('input[type="checkbox"]');
        if (!input) return;

        let targetSelectors = el.getAttribute('data-target').split(',').map(c => c.trim());

        let targetElements = [];

        if (!targetSelectors.length) return;

        if (/_self/.test(targetSelectors)) {
            targetSelectors = targetSelectors.filter(c => c !== '_self');
            targetElements.push(el);
        };

        targetElements.push(...document.querySelectorAll(targetSelectors));

        input.addEventListener('change', (e) => {
            if (e.target.checked) {
                targetElements.forEach(targetEl => {
                    slideDown(targetEl, 300);
                })
            } else {
                targetElements.forEach(targetEl => {
                    slideUp(targetEl, 300);
                })
            }
        })
    })
}

function initSmoothScrollByAnchors() {
    let anchors = document.querySelectorAll('a[href^="#"]:not([data-action="open-popup"]):not([data-action="page-reload"])');
    if (anchors.length) {
        let header = document.querySelector('[data-header]');
        anchors.forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                const href = anchor.getAttribute('href')
                const id = href.length > 1 ? href : null;
                if (!id) return;
                let el = document.querySelector(href);

                if (el) {
                    e.preventDefault();
                    let top = Math.abs(document.body.getBoundingClientRect().top) + el.getBoundingClientRect().top;

                    if (header) {
                        top = top - header.clientHeight;
                    }

                    window.scrollTo({
                        top: top - 20,
                        behavior: 'smooth',
                    })
                }
            })

        })
    }
}

function initAnchorsLinkOffset() {
    let header = document.querySelector('[data-header]');
    const hash = window.location.hash;
    if (hash) {
        const element = document.querySelector(hash);
        if (element) {
            let top = Math.abs(document.body.getBoundingClientRect().top) + element.getBoundingClientRect().top;

            if (header) {
                top = top - header.clientHeight;
            }

            setTimeout(() => {
                window.scrollTo({
                    top: top - 20,
                    behavior: 'smooth',
                })
            }, 0);
        }
    }
}

function initTruncateText() {
    const truncateString = (el, stringLength = 0) => {
        let str = el.innerText.trim();
        if (str.length <= stringLength) return;
        el.innerText = str.slice(0, stringLength) + '...';
    }

    const truncateTextBoxes = document.querySelectorAll('[data-truncate-text]');
    truncateTextBoxes.forEach(truncateTextBox => {
        truncateString(truncateTextBox, +truncateTextBox.getAttribute('data-truncate-text'))
    })
}

function initScrollTopByClick() {
    const elements = document.querySelectorAll('[data-action="scroll-top-by-click"]');
    elements.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                // behavior: 'smooth',
            })
        })
    })
}

function initPageReload() {
    const buttons = document.querySelectorAll('[data-action="page-reload"]');
    buttons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            if(btn.href) {
                history.pushState({}, '', btn.href)
            } 
            location.reload();
        })
    })
}

function initHandlerDocumentClick() {
    const cbList = [];

    window.handleDocumentClick = (cb) => {
        cbList.push(cb);
    }

    document.addEventListener('click', (e) => cbList.forEach(cb => cb(e)));
}

function initTabs() {
    const tabsContainers = document.querySelectorAll('[data-tabs]');
    if (tabsContainers.length) {
        tabsContainers.forEach(tabsContainer => {
            let triggerItems = Array.from(tabsContainer.querySelectorAll('[data-tab-trigger]'));
            let contentItems = Array.from(tabsContainer.querySelectorAll('[data-tab-content]'));

            if (!(tabsContainer.getAttribute('data-tabs') === 'nested')) {
                triggerItems = triggerItems.filter(item => !item.closest('[data-tabs="nested"]'));
                contentItems = contentItems.filter(item => !item.closest('[data-tabs="nested"]'));
            }

            const getContentItem = (id) => {
                if (!id.trim()) return;
                return contentItems.filter(item => item.dataset.tabContent === id)[0];
            }

            if (triggerItems.length && contentItems.length) {
                // init
                let activeItem = tabsContainer.querySelector('.su-tabs-current[data-tab-trigger]');
                if (activeItem) {
                    activeItem?.classList.add('su-tabs-current');
                    getContentItem(activeItem.dataset.tabTrigger)?.classList.add('su-tabs-pane-open');
                } else {
                    if (!(tabsContainer.getAttribute('data-tabs') === 'no-start-active')) {
                        triggerItems[0]?.classList.add('su-tabs-current');
                        getContentItem(triggerItems[0].dataset.tabTrigger)?.classList.add('su-tabs-pane-open');
                    }
                }

                triggerItems.forEach(item => {
                    item.addEventListener('click', (e) => {
                        e.preventDefault();
                        item?.classList.add('su-tabs-current');
                        getContentItem(item.dataset.tabTrigger)?.classList.add('su-tabs-pane-open');

                        triggerItems.forEach(i => {
                            if (i === item) return;

                            i?.classList.remove('su-tabs-current');
                            getContentItem(i.dataset.tabTrigger)?.classList.remove('su-tabs-pane-open');
                        })
                    })
                })
            }

        })
    }
}

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
    const starsElements = document.querySelectorAll('[data-stars]');
starsElements.forEach(starsEl => {
    const input = starsEl.querySelector('input');
    let starsValue = starsEl.getAttribute('data-stars-value');
    const items = starsEl.querySelectorAll('.stars__item');
    let state = numberToArray(starsValue / 2);

    const setState = () => {
        items.forEach((item, index) => {
            const value = state[index];
            const icon = item.querySelector('.stars__item-solid-icon');

            if (value) {
                icon.style.setProperty('width', (100 * value) + '%');
            } else {
                icon.style.setProperty('width', '0%');
            }
        })
    }

    setState();

    items.forEach((item, index) => {
        const value = index + 1;

        item.addEventListener('click', () => {
            input.setAttribute('value', value);
            input.value = value;
            state = numberToArray(value);
            setState();
        });

        item.addEventListener('mouseenter', () => {
            state = numberToArray(value);
            setState();
        })
    });


    starsEl.addEventListener('mouseleave', (e) => {
        state = numberToArray(input.value);
        setState();
    })
})

function numberToArray(num) {
    const parts = String(num).split('.');
    const integerPart = parseInt(parts[0]);
    const result = Array(integerPart).fill(1);

    if (parts[1]) {
        const fractionalPart = parseFloat('0.' + parts[1]);
        result.push(fractionalPart);
    }

    return result;
}
    // ==== // components =====================================================


    // ==== sections =====================================================
    {
    const mainSearch = document.querySelector('[data-main-search]');
    if (mainSearch) {
        const showButtons = document.querySelectorAll('[data-action="show-main-search"]');
        const hideButtons = document.querySelectorAll('[data-action="hide-main-search"]');

        const show = () => {
            mainSearch.classList.remove('hidden');
            mainSearch.classList.add('show');
        }
        const hide = () => {
            mainSearch.classList.remove('show');
            mainSearch.classList.add('hidden');
        }

        showButtons.forEach(btn => {
            btn.addEventListener('click', show);
        })
        hideButtons.forEach(btn => {
            btn.addEventListener('click', hide);
        })
    }

    const megaMenu = document.querySelector('[data-mega-menu]');
    if (megaMenu) {
        const toggleButton = document.querySelector('[data-action="toggle-show-hide-mega-menu"]');
        const show = () => {
            megaMenu.classList.remove('hidden');
            megaMenu.classList.add('show');
        }
        const hide = () => {
            megaMenu.classList.remove('show');
            megaMenu.classList.add('hidden');
        }
        toggleButton.addEventListener('click', () => {
            if (toggleButton.classList.contains('active')) {
                toggleButton.classList.remove('active');
                hide();
                toggleDisablePageScroll(false);
            } else {
                toggleButton.classList.add('active');
                show();
                toggleDisablePageScroll(true);
            }
        });

        const itemsWithSubmenu = Array.from(megaMenu.querySelectorAll('.mega_menu__item.has_submenu'))
            .map(item => {
                return {
                    btn: item.querySelector('.mega_menu__item_submenu-trigger'),
                    submenu: item.querySelector('.mega_menu__item_submenu')
                }
            });
            
        itemsWithSubmenu.forEach(item => {
            item.btn.addEventListener('click', () => {
                item.btn.classList.toggle('active');
                slideToggle(item.submenu, 300);
            })
        })
    }
}
    {
    const spoilers = document.querySelectorAll('[data-spoiler]');
    if (spoilers.length) {
        spoilers.forEach(spoiler => {
            const swiper = spoiler.closest('[data-scroll-container]')?.swiper;
            let isOneActiveItem = spoiler.dataset.spoiler.trim() === 'one' ? true : false;
            let triggers = spoiler.querySelectorAll('[data-spoiler-trigger]');
            if (triggers.length) {
                triggers.forEach(trigger => {
                    let parent = trigger.parentElement;
                    let content = trigger.nextElementSibling;

                    // init
                    if (trigger.classList.contains('active')) {
                        content.style.display = 'block';
                        parent.classList.add('active');
                    }

                    trigger.addEventListener('click', (e) => {
                        e.preventDefault();
                        parent.classList.toggle('active');
                        trigger.classList.toggle('active');
                        content && slideToggle(content, 300);
                        swiper && setTimeout(() => swiper.update(), 300);

                        if (isOneActiveItem) {
                            triggers.forEach(i => {
                                if (i === trigger) return;

                                let parent = i.parentElement;
                                let content = i.nextElementSibling;

                                parent.classList.remove('active');
                                i.classList.remove('active');
                                content && slideUp(content, 300);
                                swiper && setTimeout(() => swiper.update(), 300);
                            })
                        }
                    })
                })
            }
        })
    }

    const radioSpoilers = document.querySelectorAll('[data-radio-spoiler]');
    radioSpoilers.forEach(radioSpoiler => {
        let triggers = Array.from(radioSpoiler.querySelectorAll('[data-radio-trigger]'))
            .map(el => {
                return {
                    wrapper: el,
                    input: el.querySelector('input[type="radio"]')
                }
            });
        
        triggers.forEach(trigger => trigger.input?.checked && trigger.wrapper.nextElementSibling.style.setProperty('display', 'block'));

        radioSpoiler.addEventListener('change', (e) => {
            const isEventFromTrigger = triggers.find(t => t.input === e.target);
            if(isEventFromTrigger) {
                triggers.forEach(trigger => {
                    if(trigger.input?.checked) {
                        slideDown(trigger.wrapper.nextElementSibling, 300);
                    } else {
                        slideUp(trigger.wrapper.nextElementSibling, 300);
                    }
                })
            }
        })
    })
}
    // ==== // sections =====================================================

    document.body.classList.add('page-loaded');
}); 
