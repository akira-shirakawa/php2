
$('.js-modal-target').click(function(){
    id = parseInt($(this).attr('class'));
    title =$(this).parent().siblings('.message-header').text().trim();
    text = $(this).siblings('.js-message-body-target').text().trim();
    console.log(text);
    $('.js-value-target').attr('value',id);
    $('#js-title-target').attr('value',title);
    $('#js-content-target').attr('value',text);

})