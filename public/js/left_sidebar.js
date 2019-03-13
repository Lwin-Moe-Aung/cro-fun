jQuery(function($) {
 var path = window.location.href; 
 $('.vertical-menu a').each(function() {
  if (this.href === path) {
   $(this).addClass('active');
  }
 });
});