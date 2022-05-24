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

    $('button.addQuestionButton').click(function () {
        var emojiString = "";
        var loreString = "";

        if ($('.addEmoji').text()[0])
            emojiString += $('.addEmoji').text()[0];
        else return;

        for (var i=1; i<5; i++) {
            if ($('.addEmoji').text()[i])
                emojiString += "\n" + $('.addEmoji').text()[i];
            else break;
        }

        loreString += $('.addLore').text()[0];

        for (var i=1; i<5; i++) 
            loreString += "\n" + $('.addLore').text()[i];

        console.log(emojiString);
        console.log(loreString);
    });
});