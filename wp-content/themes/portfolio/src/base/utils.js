const utils = (() => {
    const $ = jQuery;
    let currentScroll = 0;

    const blockScrollPage = () => {
      currentScroll = $(window).scrollTop();
      $('body').css('top', -(document.documentElement.scrollTop) + 'px').addClass('no-scroll');
    }

    const unBlockScrollPage = () => {
      $('body').removeClass('no-scroll');
      $(window).scrollTop(currentScroll);
    }

    const shuffleArray = (array) => {
      var currentIndex = array.length, temporaryValue, randomIndex;
    
      // While there remain elements to shuffle...
      while (0 !== currentIndex) {
    
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
    
        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
      }
    
      return array;
    }

    return {
      blockScrollPage: blockScrollPage,
      unBlockScrollPage: unBlockScrollPage,
      shuffleArray: shuffleArray
    };
})();
  