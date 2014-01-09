jQuery(document).ready(function($) {
  micek.init($);
});  

micek = {
  init : function ($) {
     $('.home .more a').click(function(e){
      e.preventDefault();
      var $this = $(this);
      var $target = $this.parents('section').next();
      $target.addClass('projectsFull').next().addClass('projectsPartial').removeClass('projectsHidden');
      
      console.log('oi');
      
      $target.height($target.find('.content').height()+22);
      $this.addClass('toggled');
      
    });    
    //this.gallery.init($);  
  },
  gallery : {
    init : function ($) {
      if(!$('#gallery').length){
        return false;
      }
       var $gallery = $('#gallery');
       $gallery.addClass('gallery-active');
      $('#gallery ul').append('<span class="gal-page gal-prev"></span><span class="gal-page gal-next"></span>');
      
       
      $gallery.find('li').addClass('hidden');
      $gallery.find('li:first').removeClass('hidden').addClass('active');
      
      $gallery.delegate('.gal-next', 'click', function(){
        micek.gallery.next($, $gallery, $gallery.find('li.active')) 
      });
      
    },
    next : function ($, $gallery, $active) {
      var $next = $active.next('li');
      
      if($next.length === 0){
        $next = $gallery.find('li:first');
      }
      
      $next.addClass('transitioning');
      $gallery.find('ul').height($next.height());
      
      setTimeout(function(){
        $active.addClass('hidden').removeClass('active');
        $next.addClass('active').removeClass('hidden').removeClass('transitioning');
      }, 500);
    }
  }
}