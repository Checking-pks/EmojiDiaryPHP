$('.closeButton').click(function(){
    console.log('abc');
    $('.questionField').css('visibility', 'hidden');
    $('body::before').css('visibility', 'hidden');
    $('.header::before').css('visibility', 'hidden');
});

$(document).ready(function () {
    $('button.closeButton').click(function () {
        $('div.questionField').css('visibility', 'hidden');
        $('button.closeButton').css('visibility', 'hidden');
        $('button.doneButton').css('visibility', 'hidden');
        
        $('body').removeClass('blur');
        $('header.header').removeClass('blur');
    });

    $('button.plusButton').click(function () {
        $('div.questionField').css('visibility', 'visible');
        $('button.closeButton').css('visibility', 'visible');
        $('button.doneButton').css('visibility', 'visible');
        
        $('body').addClass('blur');
        $('header.header').addClass('blur');
    });
});