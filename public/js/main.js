/**
 * @file This is my cool script.
 * @copyright Jordan Davila 2018
 */

/**
 * Removes a class with a delay.
 * @param  {string} elementVar [description]
 * @param  {string} className  [description]
 * @param  {int} delay      [description]
 */
function removeClassDelay(elementVar, className, delay){
  $(elementVar).delay(delay).queue(function(next){
    $(this).removeClass(className);
  });
}

function removeClassDelayObj(obj, className, delay){
  obj.delay(delay).queue(function(next){
    $(this).removeClass(className);
  });
}

// Preloader
// Makes sure the whole site is loaded
$(window).on('load', function() {
    removeClassDelay('.preloader', 'with_opacity', 500);
    removeClassDelay('#website', 'no_site', 1000);
    removeClassDelay('.logo_full_wrap', 'no_opacity', 2000);
    removeClassDelay('.apply_btn', 'no_opacity', 2000);
    removeClassDelay('.login_wrap', 'no_opacity', 2000);
    removeClassDelay('.gallery_circles', 'no_opacity', 2000);
    removeClassDelay('#main_content', 'no_opacity', 3000);
})

// Check Document ready before proceding

$(document).ready(function() {

  /**
   * Smooth Scroll Effect: Add a smooth scroll effect with hash (#)
   * links. Use html class 'scrollable' to any scrollable elementßß
   */

  $('.scrollable').on('click', 'a[href^="#"]', function(e) {
    e.preventDefault();
    $('.scrollable').animate({
      scrollTop: $($.attr(this, 'href')).offset().top
    }, 1000);
  });


  /**
   * Smooth State Page Trasition Options
   * Options are stored in an object
   */

  $('#main').smoothState({
    anchors: 'a.content_page',
    prefetch: true,
    cacheLength: 2,
    onBefore: function($currentTarget, $container) {},
    onStart: {
      duration: 1000,
      render: function($container){
        console.log($container);
        $('#main_content').addClass('no_opacity');
        $('.logo_full_wrap').addClass('no_opacity');
        $('.apply_btn').addClass('no_opacity');
        $('.login_wrap').addClass('no_opacity');
        $('.circle:not(.selected)').css('opacity', '0');
        $('.gallery_circles').addClass("full_gallery");
        $('.selected').addClass("full_circle");
      }
    },
    onProgress: {
      // How long this animation takes
      duration: 0,
      // A function that dictates the animations that take place
      render: function ($container) {

      }
    },
    onReady: {
      duration: 0,
      // `$container` is a `jQuery Object` of the the current smoothState container
      // `$newContent` is a `jQuery Object` of the HTML that should replace the existing container's HTML.
      render: function ($container, $newContent) {
        // Update the HTML on the page
        $container.html($newContent);

      }
    },
    onAfter: function($container, $newContent) {
      removeClassDelayObj($newContent.find('.logo_full_wrap'), 'no_opacity', 500);
      removeClassDelayObj($newContent.find('.apply_btn'), 'no_opacity', 500);
      removeClassDelayObj($newContent.find('.login_wrap'), 'no_opacity', 500);
      removeClassDelayObj($newContent.find('#main_content'), 'no_opacity', 1000);
    }
  });


})
