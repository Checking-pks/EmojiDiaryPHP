<!DOCTYPE html>
<html>
    <head>
        <title>Emoji Diary</title>
        
        <link rel="stylesheet" href="css/_reset.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/emojiField.css">
        <link rel="stylesheet" href="css/questionField.css">
        <link rel="stylesheet" href="css/button.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />

        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script src="js/buttonEvent.js"></script>
    </head>
    <body>
        <?php 
            include_once("./_inc/dbconfig.php");

            $db_conn = getConnect();

            $logoCount = mysqli_num_rows(mysqli_query($db_conn, "SELECT * FROM emoji_list"));
            $randomLogo = mysqli_query($db_conn, "SELECT * FROM emoji_list where id=".rand(1, $logoCount));
            $randomLogoUnicode = str_replace("u", "\u", mysqli_fetch_assoc($randomLogo)["unicode"]);
            
            echo 
            "<header class='header'>
                <div class='headerItem logo'>
                    $randomLogoUnicode
                </div>
                <div class='headerItem title'>                
                    Everyone's Emoji Pad
                </div>
            </header>";
            
            echo
            "
            <div class='emojiField'>    
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                        <div class='mainEmoji'>😀</div>
                        <div class='date'>2022-05-21</div>
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                        <div class='e'>😀</div>
                        <div class='e'>☀️</div>
                        <div class='e'>🍳</div>
                        <div class='e'>🍕</div>
                        <div class='e'>🍲</div>
                        <div class='e'>🍺</div>
                        <div class='e'>😀</div>
                        <div class='e'>😀</div>
                        <div class='e'>😀</div>
                        <div class='e'>😀</div>
                    </div>
                </div>
            </div>";

            echo
            "<div class='questionField'>    
                <div class='questionPad'>
                    <div class='headQuestionField'>
                        <div class='textField'>어떤 하루였나요?</div>
                    </div>
                    <div class='bodyQuestionField'>
                        <button class='options'>
                            <div class='emoji'>😀</div>
                            <div class='lore'></div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>🙂</div>
                            <div class='lore'></div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>😐</div>
                            <div class='lore'></div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>🙁</div>
                            <div class='lore'></div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>😟</div>
                            <div class='lore'></div>
                        </button>
                    </div>
                </div>
                <div class='questionPad'>
                    <div class='headQuestionField'>
                        <div class='textField'>날씨</div>
                        <button class='deleteQuestionButton'></button>
                    </div>
                    <div class='bodyQuestionField'>
                        <button class='options'>
                            <div class='emoji'>☀️</div>
                            <div class='lore'>맑음</div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>⛅</div>
                            <div class='lore'>흐림</div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>🌩️</div>
                            <div class='lore'>천둥</div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>☔</div>
                            <div class='lore'>비</div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>⛄</div>
                            <div class='lore'>눈</div>
                        </button>
                    </div>
                </div>
                <div class='questionPad'>
                    <div class='headQuestionField'>
                        <div class='textField'>식사</div>
                        <button class='deleteQuestionButton'></button>
                    </div>
                    <div class='bodyQuestionField'>
                        <button class='options'>
                            <div class='emoji'>🍳</div>
                            <div class='lore'>아침</div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>🍕</div>
                            <div class='lore'>점심</div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>🍲</div>
                            <div class='lore'>저녁</div>
                        </button>
                        <button class='options'>
                            <div class='emoji'>🍺</div>
                            <div class='lore'>야식</div>
                        </button>
                    </div>
                </div>
                <div class='questionPad'>
                    <div class='headQuestionField'>
                        <input class='addQuestionField' maxlength='10' placeholder='기록 추가'></input>
                        <button class='addQuestionButton'></button>
                    </div>
                    <div class='bodyQuestionField'>
                        <div>
                            <input class='addEmoji' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' maxlength='4' placeholder='설명'></input>
                        </div>
                    </div>
                </div>
            </div>";

            echo "
            <div class='buttonField'>
                <button class='plusButton'>
                </button>
            </div>
            <div class='buttonField'>
                <button class='closeButton'>
                </button>
            </div>
            <div class='buttonField'>
                <button class='doneButton'>
                </button>
            </div>";

        ?> 
    </body>
</html>