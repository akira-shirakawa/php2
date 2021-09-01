$('.js-logout-target').click(function(){
    $('.hidden-form').submit();
});
$(".js-modal-target,.modal-background").click(function() {
    
    $('.modal').toggle('is-active');
  });
$('.tabs>ul>li').click(function(){
   $('li').removeClass('is-active');
   $(this).addClass('is-active');
   text = $(this).text();
   if(text == '投稿一覧'){
       $('.js-hidden-target').addClass('is-hidden');
       $('.message').removeClass('is-hidden');
   }else{
       $('.js-hidden-target').removeClass('is-hidden');
       $('.message').addClass('is-hidden');
   }
})