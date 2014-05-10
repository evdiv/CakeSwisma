$(document).ready(function(){
    $(".hide_comment").click(function(e){
      e.preventDefault();
      $(this).siblings(".comment_block").slideUp();
      $(this).hide();
      $(this).siblings('.show_comment').show();   
    });

    $(".show_comment").click(function(e){
      e.preventDefault();  
      $(this).hide();
      $(this).siblings('.hide_comment').show();  
      $(this).siblings(".comment_block").slideDown();
    });
    
    $('#ratingform').stars({
    split:2,
    cancelShow:false,
    callback: function(ui, type, value) {
        ui.$form.submit();
    }
});

});

