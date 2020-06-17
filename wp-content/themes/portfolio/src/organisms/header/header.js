const header = (() => {
  const $header = $('.o-header');

  const handlerShowHeaderBar = () => {
    if (window.scrollY >= (window.innerHeight - 150)) {
      if (!$header.hasClass('is-shown')) {
        $header.addClass('is-shown');
      }
    } else {
      if ($header.hasClass('is-shown')) {
        $header.removeClass('is-shown');
      }
    }
  }

  const handlerMobileMenu = () => {
    const $menu = $('.o-header__navigation');
    const $actionMenu = $('.o-header__button-toggle .hamburger'); 
    $actionMenu.on('click', function() {
      $(this).toggleClass('is-active');  
      $menu.toggleClass('is-show');         
    }) 
  }    
  

  const init = () => {
    if ($header.length > 0) {
      handlerShowHeaderBar();
      handlerMobileMenu()
      $(window).on('scroll', function () {
        console.log('scroll');
        handlerShowHeaderBar();
      });
    }
  }
    return {
    init: init
  };
})();