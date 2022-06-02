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

    $('button.doneButton').click(function () {
        $dayTextList = $('.textField');
        $dayEmojiList = $('.selectedEmoji > .emoji');
        
        if ($dayTextList.size() != $dayEmojiList.size())
            return;

        $mainEmoji = $dayEmojiList[0].innerHTML
        $textList = "";
        $emojiList = "";

        for ($i = 0; $i < $dayTextList.size(); $i++) {
            if ($i) {
                $textList += "\n";
                $emojiList += "\n";
            }

            $textList += $dayTextList[$i].innerHTML
            $emojiList += $dayEmojiList[$i].innerHTML
        }

        $src = 'addDay.php?me=' + $mainEmoji + '&t=' + $textList + '&e=' + $emojiList;

        $('iframe').attr('src', $src);

        $('div.questionField').css('visibility', 'hidden');
        $('button.closeButton').css('visibility', 'hidden');
        $('button.doneButton').css('visibility', 'hidden');
        
        $('body').removeClass('blur');
        $('header.header').removeClass('blur');
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

    $('button.options').click(function () {
        $idxLine = $('button.options').index(this);
        var optionsArray = $('button[class=options]');

        while ($idxLine % 5)
            $idxLine -= 1;

        $idxLine = $idxLine / 5 + 1

        $('div.questionField > div:nth-child(' + $idxLine + ') > div.bodyQuestionField > button.selectedEmoji').addClass('nonSelectedEmoji');
        $('div.questionField > div:nth-child(' + $idxLine + ') > div.bodyQuestionField > button.selectedEmoji').removeClass('selectedEmoji');

        $(this).addClass('selectedEmoji');
        $(this).removeClass('nonSelectedEmoji');
    });
});