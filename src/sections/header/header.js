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