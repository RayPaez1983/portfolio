(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    define(['buoy'], factory(root));
  } else if (typeof exports === 'object') {
    module.exports = factory(require('buoy'));
  } else {
    root.browserDetecter = factory(root, root.buoy);
  }
})(typeof global !== 'undefined' ? global : this.window || this.global, function (root) {

  'use strict';

  //
  // Variables
  //

  var browserDetecter = {}; // Object for public APIs
  //
  // Methods
  //

  /**
   * Add custom classes for <HTML> tag
   * @private
   */
  var addClass = function (browser) {

    var html = document.getElementsByTagName('html');

    if (typeof browser == 'undefined') {
      var browser = isBrowser();
    }

    html[0].classList.add(browser);

  }

  /**
   * Return current browser
   * @private
   */
  var isBrowser = function () {

    var specialBrowsers = [];
    // Opera 8.0+
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    specialBrowsers.push({is: 'isOpera', value: isOpera});

    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';
    specialBrowsers.push({is: 'isFirefox', value: isFirefox});

    // Safari 3.0+ "[object HTMLElementConstructor]"
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
    specialBrowsers.push({is: 'isSafari', value: isSafari});

    // Internet Explorer 6-11
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    if (isIE) {
      var version = getInternetExplorerVersion();
      specialBrowsers.push({is: 'isIE' + String(version), value: isIE});
    }

    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;
    specialBrowsers.push({is: 'isEdge', value: isEdge});

    // Chrome 1+
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    specialBrowsers.push({is: 'isChrome', value: isChrome});

    // Blink engine detection
    var isBlink = (isChrome || isOpera) && !!window.CSS;
    specialBrowsers.push({is: 'isBlink', value: isBlink});

    var browser = {};
    for (var i = 0; i < specialBrowsers.length; i++) {
      if (specialBrowsers[i].value) {
        return browser = specialBrowsers[i].is;
      }
    }

  }

  /**
   * Return version of IE
   * @private
   */
  var getInternetExplorerVersion = function () {
    var rv = -1;
    if (navigator.appName == 'Microsoft Internet Explorer') {
      var ua = navigator.userAgent;
      var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");

      if (re.exec(ua) != null) {
        rv = parseFloat( RegExp.$1 );
      }
    } else if (navigator.appName == 'Netscape') {
      var ua = navigator.userAgent;
      var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
      if (re.exec(ua) != null)
        rv = parseFloat( RegExp.$1 );
    }

    return rv;
  }

  /**
   * Initialize Plugin
   * @public
   */
  browserDetecter.init = function () {

    addClass();

  }

  /**
   * Get browser
   * @public
   */
  browserDetecter.is = function () {

    return isBrowser();

  }

  return browserDetecter;

})
