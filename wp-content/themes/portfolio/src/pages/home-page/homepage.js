const homepage = (() => {
  const $homepage = $('.p-homepage');
  const $header = $homepage.find('.p-homepage__header');
  
  const handlerHeaderSlider = () => {
    var swiper = new Swiper('.p-homepage__header__slider',{
      loop: true,
        autoplay: {
          delay: 4000,
        },
    });
  }

  const handlerAvatarSlider = () => {
    var swiper = new Swiper('.avatar__slider',{
      loop: true,
      spaceBetween: 900,  
      direction: 'vertical',
      autoHeight: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 1000,
        speed: 1000,
        
      },
    });
  } 

  const adjustAvatarPosition = () => {
    const $avatar = $header.find('.avatar');
    $avatar.css({
      'top': ($header.height() - $avatar.height()) / 2,
      'left': ($header.width() - $avatar.width()) / 2
    });
  }

  const handlerTestimonialsSlider = () => {
    var swiper = new Swiper('.testimonials__slider',{
      loop: true,
      autoplay: {
        delay: 1000,
        speed: 1000,
        spaceBetween: 900
      },
      pagination: {
        loop: true,
        el: '.testimonials .swiper-pagination',
        clickable: true,
      },
    });
  }

  const handlerParallax = ()  => {
    $(window).on('scroll',parallax);

    function parallax(){
        //obtener el nivel de scroll
        var s = $(window).scrollTop();
        //efecto parallax para los fondos
        function parallaxBg(el,t){
          $(el).css({
              'background-attachment':'fixed',
              'background-position': 'center' + (s*t) + 
              'px' 
    
          })
        }
        //efecto parallax para los textos
        function parallaxFront(el,t){
            $(el).css({
                'position':'relative',
                'top': (s*t) + 'px'
            })
        }
        parallaxBg('.picture',.1); 
        parallaxFront('.picture',.8);   
        
    }
  }

  const wow = () => {
    const wow = new WOW({
      boxClass:     'wow',      
      animateClass: 'animated', 
      offset:       -100,          
      mobile:       true,       
      live:         true 
    })
    wow.init();
  }

  const init = () => {
    if ($homepage.length > 0) {
      handlerHeaderSlider();
      handlerAvatarSlider();
      adjustAvatarPosition();
      handlerTestimonialsSlider();
      handlerParallax();
      wow()
      

      $(window).on("resize", function() {
        adjustAvatarPosition();
      });        
    }
  }
  
  return {
    init: init
  };
  
})();