//version: 1.0
jQuery(function($) {

  $(document).ready(function(){

    //add our new header to the phantom menu
    $headerCustomForm = $('#header-custom-form').clone(true);
    $phWrap = $('.ph-wrap').parent();
    $headerCustomForm.prependTo($phWrap);
    //ie fix
    var header_row_img = $('.homepage-video-row a.rollover.rollover-zoom.dt-pswp-item.pswp-image.pspw-wrap-ready.this-ready img');
    if(header_row_img.length > 0){
      // Detect objectFit support
      if('objectFit' in document.documentElement.style === false) {
        console.log("Need ObjectFit Fix");
        console.log(header_row_img);
        // assign HTMLCollection with parents of images with objectFit to variable
        var et_pb_image = $('.homepage-video-row a.rollover.rollover-zoom.dt-pswp-item.pswp-image.pspw-wrap-ready.this-ready img');
        et_pb_image.each(function() {
          $(this).css('height', 'auto');
        });

      } else {
        console.log("Browser supports ObjectFit");
      }
    }



    if('objectFit' in document.documentElement.style === false) {
      console.log("Need ObjectFit Fix");
      // assign HTMLCollection with parents of images with objectFit to variable
      var et_pb_image = $('.et_pb_posts .et_pb_post a img');
      et_pb_image.each(function() {
        $(this).css('height', 'auto');
      });

    } else {
      console.log("Browser supports ObjectFit");
    }

    // Remove phantom header bloom bar
    $('#phantom #header-custom-form').remove();
  }); // end document ready
});
