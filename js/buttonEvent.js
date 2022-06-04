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
        $dayLoreList = $('.selectedEmoji > .lore');
        
        if ($dayTextList.size() != $dayEmojiList.size())
            return;

        $mainEmoji = $dayEmojiList[0].innerHTML
        $textList = "";
        $emojiList = "";
        $loreList = "";

        for ($i = 0; $i < $dayTextList.size(); $i++) {
            if ($i) {
                $textList += "\\n";
                $emojiList += "\\n";
                $loreList += "\\n";
            }

            $textList += $dayTextList[$i].innerHTML;
            $emojiList += $dayEmojiList[$i].innerHTML;
            $loreList += $dayLoreList[$i].innerHTML;
        }

        $src = 'addDay.php?me=' + $mainEmoji + '&t=' + $textList + '&e=' + $emojiList + '&l=' + $loreList;

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
        $selector = $(this).parent();

        console.log($selector);

        for ($i=0; $i<$selector[0].children.length; $i++) 
            $selector[0].children[$i].className = 'options nonSelectedEmoji';

        $(this).addClass('selectedEmoji');
        $(this).removeClass('nonSelectedEmoji');
    });
});